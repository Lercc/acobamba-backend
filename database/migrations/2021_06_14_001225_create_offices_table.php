<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
 
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name', '200');
            $table->string('status', '11');               // activado desactivado
            $table->timestamps();
        });
        
        DB::table('offices')->insert(array('id'=>'1', 'name'=>'Alcaldía', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'2', 'name'=>'Gerencia Municipal', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'3', 'name'=>'Gerencia de Administración y Rentas', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'4', 'name'=>'Gerencia de Desarrollo Urbano y Obras', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'5', 'name'=>'Gerencia de Desarrollo Social y Económico', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'6', 'name'=>'Procuraduría Pública Municipal', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'7', 'name'=>'Control institucional', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'8', 'name'=>'Oficina de Secretaria General', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'9', 'name'=>'Oficina de Imagen Institucional', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'10', 'name'=>'Oficina de trámite Documentario', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'11', 'name'=>'Oficina de Planeamiento, Presupuesto y Racionalización', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'12', 'name'=>'Oficina de Asesoría Jurídica', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'13', 'name'=>'Concejo de Coordinación Local Distrital', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'14', 'name'=>'Comité Distrital de Defensa Civil', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'15', 'name'=>'Comité Participación Vecinal', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'16', 'name'=>'Comité Distrital de Seguridad Ciudadana', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'17', 'name'=>'Comité de Administración Programa Vaso de Leche', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'18', 'name'=>'EMSAP', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'19', 'name'=>'Cajera-Coordinadora OMAPED', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'20', 'name'=>'Unidad Local de Empadronamiento', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'21', 'name'=>'Jefe de Almacén, Patrimonio e Informática', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'22', 'name'=>'Conserje Local Municipal', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'23', 'name'=>'Liquidaciones', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'24', 'name'=>'Unidad de Planeamiento', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'25', 'name'=>'Unidad de Matadero Municipal', 'status'=>'activado'));
        DB::table('offices')->insert(array('id'=>'26', 'name'=>'Trabajadores Municipales', 'status'=>'activado'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
