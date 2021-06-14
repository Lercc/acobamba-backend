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
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->string('exp_status','9');                         // derivado archivado
            $table->string('status','8');                         // visto     no visto
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('expedient_id')->references('id')->on('expedients');
            $table->foreign('employee_id')->references('id')->on('employees');
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
