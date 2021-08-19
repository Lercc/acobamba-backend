<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('dni_represent')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
        
        DB::table('processors')->insert(array('id'=>'1', 'user_id'=>'49'));
        DB::table('processors')->insert(array('id'=>'2', 'user_id'=>'50'));
        DB::table('processors')->insert(array('id'=>'2', 'user_id'=>'51'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processors');
    }
}
