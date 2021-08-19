<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id')->unsigned();
            $table->string('name', 80);
            $table->string('last_name', 120);
            $table->string('phone', 9);
            $table->string('doc_type', 11);                         // DNI - EXTRANJERIA
            $table->string('doc_number', 11)->unique();             // 8 11
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status', 11);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });

        // admin
        DB::table('users')->insert(array('id'=>'1', 'role_id'=>'1','name'=>'admin', 'last_name'=>'admin', 'phone' => '999993333', 'doc_type'=>'dni', 'doc_number'=>'00000001', 'email'=>'admin@admin.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'2', 'role_id'=>'1','name'=>'admin2', 'last_name'=>'admin2', 'phone' => '999991111', 'doc_type'=>'dni', 'doc_number'=>'00000002', 'email'=>'admin2@admin.com', 'password'=>'12', 'status'=>'desactivado'));
        DB::table('users')->insert(array('id'=>'3', 'role_id'=>'1','name'=>'admin3', 'last_name'=>'admin3', 'phone' => '999992222', 'doc_type'=>'dni', 'doc_number'=>'00000003', 'email'=>'admin3@admin.com', 'password'=>'12', 'status'=>'desactivado'));
        // inte 'phonen => '999999999', 
        
        //INTERNOS - funcionarios publicos - realizan y derivan tramites
        DB::table('users')->insert(array('id'=>'4', 'role_id'=>'2','name'=>'Roaldo Martin', 'last_name'=>'Laurente Pucuhuayla', 'phone' => '919999999', 'doc_type'=>'dni', 'doc_number'=>'19999991', 'email'=>'rlaurente@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'5', 'role_id'=>'2','name'=>'Soraya Guadalupe', 'last_name'=>'Cajacuri León', 'phone' => '929999998', 'doc_type'=>'dni', 'doc_number'=>'29999992', 'email'=>'scajacuri@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'6', 'role_id'=>'2','name'=>'Maria Lisset', 'last_name'=>'Machuca Flores', 'phone' => '939999997', 'doc_type'=>'dni', 'doc_number'=>'39999993', 'email'=>'mmachuca@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'7', 'role_id'=>'2','name'=>'Esperanza Rosario', 'last_name'=>'Adama Taipe', 'phone' => '949999994', 'doc_type'=>'dni', 'doc_number'=>'45999998', 'email'=>'edama@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'8', 'role_id'=>'2','name'=>'José Carlos', 'last_name'=>'Aguilar Bernardillo', 'phone' => '959999993', 'doc_type'=>'dni', 'doc_number'=>'59991996', 'email'=>'jaguilar@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'9', 'role_id'=>'2','name'=>'Leidy Rosario', 'last_name'=>'Caparachin Raimundo', 'phone' => '969979992', 'doc_type'=>'dni', 'doc_number'=>'69991996', 'email'=>'lcaparachin@mda.com', 'password'=>'12', 'status'=>'activado'));
      
        //INTERNOS - trabajadores municipales y funcionarios que realizan tramite
            //  Funcionario que realiza tramite      

        DB::table('users')->insert(array('id'=>'10', 'role_id'=>'2','name'=>'Francisca Haydeé', 'last_name'=>'Huamán Perez', 'phone' => '979999996', 'doc_type'=>'dni', 'doc_number'=>'79999994', 'email'=>'fhuaman@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'11', 'role_id'=>'2','name'=>'Isaac Godofredo ', 'last_name'=>'Sancho Durand', 'phone' => '989999995', 'doc_type'=>'dni', 'doc_number'=>'89999492', 'email'=>'isancho@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'12', 'role_id'=>'2','name'=>'Marlene Ana', 'last_name'=>'Navarro Hilario', 'phone' => '991999994', 'doc_type'=>'dni', 'doc_number'=>'99999995', 'email'=>'mnavarro@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'13', 'role_id'=>'2','name'=>'Gabriela ', 'last_name'=>'Cabrera Rafael', 'phone' => '992999995', 'doc_type'=>'dni', 'doc_number'=>'19999492', 'email'=>'gcabrera@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'14', 'role_id'=>'2','name'=>'Marilia Russ', 'last_name'=>'Huamán Cabrera', 'phone' => '993999993', 'doc_type'=>'dni', 'doc_number'=>'19999994', 'email'=>'mhuaman@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'15', 'role_id'=>'2','name'=>'Kico Carlos', 'last_name'=>'Flores Meza', 'phone' => '994999992', 'doc_type'=>'dni', 'doc_number'=>'29999994', 'email'=>'kflores@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'16', 'role_id'=>'2','name'=>'Nilton Gabriel', 'last_name'=>'Guerrero Ramón', 'phone' => '995999991', 'doc_type'=>'dni', 'doc_number'=>'29999994', 'email'=>'nguerrero@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'17', 'role_id'=>'2','name'=>'Pablo Sigfredo', 'last_name'=>'Fernández Rodriguez', 'phone' => '996999990', 'doc_type'=>'dni', 'doc_number'=>'39999996', 'email'=>'pfernandez@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'18', 'role_id'=>'2','name'=>'Raul Carlos', 'last_name'=>'Ezeta Angeles', 'phone' => '999199993', 'doc_type'=>'dni', 'doc_number'=>'49999995', 'email'=>'rezeta@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'19', 'role_id'=>'2','name'=>'Chistian Paul', 'last_name'=>'Segura Ruiz', 'phone' => '999399995', 'doc_type'=>'dni', 'doc_number'=>'59999996', 'email'=>'csegura@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'20', 'role_id'=>'2','name'=>'José Manuel', 'last_name'=>'Aquino Lara', 'phone' => '999929994', 'doc_type'=>'dni', 'doc_number'=>'11999996', 'email'=>'jaquino@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'21', 'role_id'=>'2','name'=>'George Hans Anthony', 'last_name'=>'Amaro Solano', 'phone' => '999939995', 'doc_type'=>'dni', 'doc_number'=>'11999995', 'email'=>'gamaro@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'22', 'role_id'=>'2','name'=>'Henry Max', 'last_name'=>'Puchuc Alania', 'phone' => '999909992', 'doc_type'=>'dni', 'doc_number'=>'77994997', 'email'=>'hpuchuc@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'23', 'role_id'=>'2','name'=>'Pedro Hernan', 'last_name'=>'Astete Palacios', 'phone' => '999991993', 'doc_type'=>'dni', 'doc_number'=>'88994997', 'email'=>'pastete@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'24', 'role_id'=>'2','name'=>'Patricia Beatriz', 'last_name'=>'Cayetano Aguirre', 'phone' => '999992994', 'doc_type'=>'dni', 'doc_number'=>'99199996', 'email'=>'pcayetano@mda.com', 'password'=>'12', 'status'=>'activado'));
        
        //TRABAJADORES MUNICIPALES
        DB::table('users')->insert(array('id'=>'25', 'role_id'=>'2','name'=>'Ines Victoria ', 'last_name'=>'Yapias Yauri', 'phone' => '997999991', 'doc_type'=>'dni', 'doc_number'=>'39999492', 'email'=>'iyapias@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'26', 'role_id'=>'2','name'=>'Victoria Celina', 'last_name'=>'Mayta Izquierdo', 'phone' => '998999992', 'doc_type'=>'dni', 'doc_number'=>'49994997', 'email'=>'vmayta@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'27', 'role_id'=>'2','name'=>'Fidencio', 'last_name'=>'Montalvo Bravo', 'phone' => '999299994', 'doc_type'=>'dni', 'doc_number'=>'59994997', 'email'=>'fmontalvo@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'28', 'role_id'=>'2','name'=>'Alkendi Dilan', 'last_name'=>'Vicuña Aquino', 'phone' => '999499996', 'doc_type'=>'dni', 'doc_number'=>'69999995', 'email'=>'avicuña@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'29', 'role_id'=>'2','name'=>'Luis Amilcar', 'last_name'=>'Hurtado Reyes', 'phone' => '999599997', 'doc_type'=>'dni', 'doc_number'=>'69994997', 'email'=>'lhurtado@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'30', 'role_id'=>'2','name'=>'Jaime Edgar', 'last_name'=>'Huaynates Rivas', 'phone' => '999699998', 'doc_type'=>'dni', 'doc_number'=>'79991996', 'email'=>'jhuaynates@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'31', 'role_id'=>'2','name'=>'Oswaldo Daniel', 'last_name'=>'Terrel Coronel', 'phone' => '99979999', 'doc_type'=>'dni', 'doc_number'=>'79939996', 'email'=>'oterrel@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'32', 'role_id'=>'2','name'=>'Evens Ruben', 'last_name'=>'Anglas Valverde', 'phone' => '999899990', 'doc_type'=>'dni', 'doc_number'=>'89999995', 'email'=>'eanglas@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'33', 'role_id'=>'2','name'=>'Castro Bonifacio', 'last_name'=>'Gabriel Quispe', 'phone' => '999999991', 'doc_type'=>'dni', 'doc_number'=>'89994997', 'email'=>'cgabriel@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'34', 'role_id'=>'2','name'=>'Zenaida Julia', 'last_name'=>'Calderon Díaz', 'phone' => '999099992', 'doc_type'=>'dni', 'doc_number'=>'99989996', 'email'=>'zcalderon@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'35', 'role_id'=>'2','name'=>'Fernando Amancio', 'last_name'=>'Medina Loja', 'phone' => '999919993', 'doc_type'=>'dni', 'doc_number'=>'99993995', 'email'=>'fmedina@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'36', 'role_id'=>'2','name'=>'Christian Jhefferson', 'last_name'=>'Castañeda Leonardo', 'phone' => '999949996', 'doc_type'=>'dni', 'doc_number'=>'22994997', 'email'=>'ccastañeda@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'37', 'role_id'=>'2','name'=>'Gabriel Alejandro', 'last_name'=>'Calzado Rojas', 'phone' => '999959997', 'doc_type'=>'dni', 'doc_number'=>'22999996', 'email'=>'gcalzado@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'38', 'role_id'=>'2','name'=>'Alan Juan', 'last_name'=>'Suere Cortez', 'phone' => '999969998', 'doc_type'=>'dni', 'doc_number'=>'33994997', 'email'=>'asuere@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'39', 'role_id'=>'2','name'=>'Irma Angélica', 'last_name'=>'Alegría Hilario', 'phone' => '999979999', 'doc_type'=>'dni', 'doc_number'=>'44999996', 'email'=>'ialegria@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'40', 'role_id'=>'2','name'=>'Hilda Luz', 'last_name'=>'Chamorro Montes', 'phone' => '999989990', 'doc_type'=>'dni', 'doc_number'=>'55994997', 'email'=>'hchamorro@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'41', 'role_id'=>'2','name'=>'Jherry Andy', 'last_name'=>'Carhuancho Chamorro', 'phone' => '999999991', 'doc_type'=>'dni', 'doc_number'=>'66999996', 'email'=>'jcarhuancho@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'42', 'role_id'=>'2','name'=>'Edgar Abel', 'last_name'=>'Rojas Condori', 'phone' => '999993995', 'doc_type'=>'dni', 'doc_number'=>'99299996', 'email'=>'erojas@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'43', 'role_id'=>'2','name'=>'Beatriz Enma', 'last_name'=>'Ponce Verastegui', 'phone' => '999994996', 'doc_type'=>'dni', 'doc_number'=>'11199996', 'email'=>'bponce@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'44', 'role_id'=>'2','name'=>'Mirtha Luciana', 'last_name'=>'Quincho Marcelo', 'phone' => '999995997', 'doc_type'=>'dni', 'doc_number'=>'22299996', 'email'=>'mquincho@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'45', 'role_id'=>'2','name'=>'Walter', 'last_name'=>'Mayorca Medina', 'phone' => '999996998', 'doc_type'=>'dni', 'doc_number'=>'33399996', 'email'=>'wmayorca@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'46', 'role_id'=>'2','name'=>'Gabriel Omar', 'last_name'=>'Guerrero Perez', 'phone' => '999997999', 'doc_type'=>'dni', 'doc_number'=>'44499996', 'email'=>'gguerrero@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'47', 'role_id'=>'2','name'=>'Luis Alberto', 'last_name'=>'Cancho Aparicio', 'phone' => '999998990', 'doc_type'=>'dni', 'doc_number'=>'55599996', 'email'=>'lcancho@mda.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'48', 'role_id'=>'2','name'=>'Julio Cesar', 'last_name'=>'Estrella Susanibar', 'phone' => '999999991', 'doc_type'=>'dni', 'doc_number'=>'66699996', 'email'=>'jestrella@mda.com', 'password'=>'12', 'status'=>'activado'));

        // externo
        DB::table('users')->insert(array('id'=>'49', 'role_id'=>'3','name'=>'Piero', 'last_name'=>'Barzola Parra', 'phone' => '999990912', 'doc_type'=>'dni', 'doc_number'=>'77777778', 'email'=>'gatopbp123@gmail.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'50', 'role_id'=>'3','name'=>'Alexander', 'last_name'=>'Barzola Parra', 'phone' => '955999293', 'doc_type'=>'dni', 'doc_number'=>'77777779', 'email'=>'alex.barpa10@gmail.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'51', 'role_id'=>'3','name'=>'Marlene', 'last_name'=>'Parra Ñaupari', 'phone' => '944999494', 'doc_type'=>'dni', 'doc_number'=>'77777749', 'email'=>'mparranaupari@gmail.com', 'password'=>'12', 'status'=>'activado'));
  
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}


