<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubofficesTable extends Migration
{
    public function up()
    {
        Schema::create('suboffices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('office_id')->unsigned();
            $table->string('name', '200');
            $table->string('status', '11');               // activado desactivado
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });

        // Gerencia de Administración y Rentas
        DB::table('suboffices')->insert(array('id'=>'1', 'office_id'=> '3' ,'name'=>'Sub-Gerencia de Personal y RR.HH', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'2', 'office_id'=> '3' ,'name'=>'Sub-Gerencia de Contabilidad ', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'3', 'office_id'=> '3' ,'name'=>'Sub-Gerencia de Abastecimiento', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'4', 'office_id'=> '3' ,'name'=>'Sub-Gerencia de Tesorería ', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'5', 'office_id'=> '3' ,'name'=>'Sub-Gerencia de Rentas ', 'status'=>'activado'));
        
        // Gerencia de Desarrollo Urbano y Obras
        DB::table('suboffices')->insert(array('id'=>'6', 'office_id'=> '4' ,'name'=>'Sub-Gerencia de Catastro, Planeamiento, Control Urbano y Área Técnica Municipal ', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'7', 'office_id'=> '4' ,'name'=>'Sub-Gerencia de Maquinaria, Transporte, Transito y Circulación Vial ', 'status'=>'activado'));

         // Gerencia de Desarrollo Social y Económico
        DB::table('suboffices')->insert(array('id'=>'8', 'office_id'=> '5' ,'name'=>'Sub-Gerencia de DEMUNA y OMAPED', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'9', 'office_id'=> '5' ,'name'=>'Sub-Gerencia de PVL y Programas Sociales', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'10', 'office_id'=> '5' ,'name'=>'Sub-Gerencia de Cultura, Deporte y Turismo', 'status'=>'activado'));
        DB::table('suboffices')->insert(array('id'=>'11', 'office_id'=> '5' ,'name'=>'Sub-Gerencia de Desarrollo Agropecuario', 'status'=>'activado'));
        
       
     
    }

  
    public function down()
    {
        Schema::dropIfExists('suboffices');
    }
}
