<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('user')->unsigned();
            $table->string('area','200');
            $table->string('exp_status','9');                     // derivado archivado
            $table->string('status','8');                         // visto     no visto
            $table->timestamps();

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
        Schema::dropIfExists('notifications');
    }
}
