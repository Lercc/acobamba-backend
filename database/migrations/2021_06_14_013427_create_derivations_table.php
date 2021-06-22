<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDerivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('derivations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('expedient_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->string('status','10');                         // nuevo en proceso derivado

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
        Schema::dropIfExists('derivations');
    }
}
