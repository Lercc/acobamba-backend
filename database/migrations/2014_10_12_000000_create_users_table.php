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
        DB::table('users')->insert(array('id'=>'1', 'role_id'=>'1','name'=>'admin', 'last_name'=>'admin', 'phone' => '999999999', 'doc_type'=>'dni', 'doc_number'=>'00000001', 'email'=>'admin@admin.com', 'password'=>'password', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'2', 'role_id'=>'1','name'=>'admin2', 'last_name'=>'admin2', 'phone' => '999999999', 'doc_type'=>'dni', 'doc_number'=>'00000002', 'email'=>'admin2@admin.com', 'password'=>'password', 'status'=>'desactivado'));
        DB::table('users')->insert(array('id'=>'3', 'role_id'=>'1','name'=>'admin3', 'last_name'=>'admin3', 'phone' => '999999999', 'doc_type'=>'dni', 'doc_number'=>'00000003', 'email'=>'admin3@admin.com', 'password'=>'password', 'status'=>'desactivado'));
        // inte 'phonen => '999999999', o
        DB::table('users')->insert(array('id'=>'4', 'role_id'=>'2','name'=>'Roaldo Martin', 'last_name'=>'Laurente Pucuhuayla', 'phone' => '999999999', 'doc_type'=>'dni', 'doc_number'=>'99999991', 'email'=>'martin@martin.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'5', 'role_id'=>'2','name'=>'Soraya Guadalupe', 'last_name'=>'Cajacuri León', 'phone' => '999999998', 'doc_type'=>'dni', 'doc_number'=>'99999992', 'email'=>'guadalupe@guadalupe.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'6', 'role_id'=>'2','name'=>'Maria Lisset', 'last_name'=>'Machuca Flores', 'phone' => '999999997', 'doc_type'=>'dni', 'doc_number'=>'99999993', 'email'=>'maria@maria.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'7', 'role_id'=>'2','name'=>'Nilton Gabriel', 'last_name'=>'Guerrero Ramón', 'phone' => '999999996', 'doc_type'=>'dni', 'doc_number'=>'99999994', 'email'=>'nilton@nilton.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'8', 'role_id'=>'2','name'=>'Gabriela ', 'last_name'=>'Cabrera Rafael', 'phone' => '999999995', 'doc_type'=>'dni', 'doc_number'=>'99999992', 'email'=>'gabriela@gabriela.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'9', 'role_id'=>'2','name'=>'Georg Hans Anthony', 'last_name'=>'Amaro Solano', 'phone' => '999999994', 'doc_type'=>'dni', 'doc_number'=>'99999995', 'email'=>'george@george.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'10', 'role_id'=>'2','name'=>'Esperanza Rosario', 'last_name'=>'Adama Taipe', 'phone' => '999999994', 'doc_type'=>'dni', 'doc_number'=>'95999998', 'email'=>'esperanza@esperanza.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'12', 'role_id'=>'2','name'=>'Pedro Hernan', 'last_name'=>'Astete Palacios', 'phone' => '999999994', 'doc_type'=>'dni', 'doc_number'=>'99994997', 'email'=>'hernan@hernan.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'13', 'role_id'=>'2','name'=>'José Manuel', 'last_name'=>'Aquino Lara', 'phone' => '999999993', 'doc_type'=>'dni', 'doc_number'=>'99999996', 'email'=>'manuel@manuel.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'14', 'role_id'=>'2','name'=>'José Carlos', 'last_name'=>'Aguilar Bernardillo', 'phone' => '949999993', 'doc_type'=>'dni', 'doc_number'=>'99991996', 'email'=>'jose@jose.com', 'password'=>'12', 'status'=>'activado'));

        // externo
        DB::table('users')->insert(array('id'=>'15', 'role_id'=>'3','name'=>'luis manuel', 'last_name'=>'ramirez', 'phone' => '999999919', 'doc_type'=>'dni', 'doc_number'=>'77777778', 'email'=>'externo1@externo1.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'16', 'role_id'=>'3','name'=>'pedro sora', 'last_name'=>'pantoja', 'phone' => '999999299', 'doc_type'=>'dni', 'doc_number'=>'77777779', 'email'=>'externo2@externo2.com', 'password'=>'12', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'17', 'role_id'=>'3','name'=>'piero juanes', 'last_name'=>'martinez', 'phone' => '999999499', 'doc_type'=>'dni', 'doc_number'=>'77777749', 'email'=>'externo3@externo3.com', 'password'=>'12', 'status'=>'activado'));
  
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

