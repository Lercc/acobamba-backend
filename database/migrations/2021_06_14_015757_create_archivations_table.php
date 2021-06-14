<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('observations','200');

            $table->string('status','10');                         // archivado
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('expedient_id')->references('id')->on('expedients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivations');
    }
}
