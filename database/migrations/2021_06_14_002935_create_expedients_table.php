<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedients', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('processor_id')->unsigned()->nullable();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->string('code','30'); 
            $table->string('document_type','200');
            $table->string('header','220');                    //  document_type + date
            $table->string('subject','200');
            $table->string('folios','3');
            $table->string('file');
            $table->string('status', '11');                    // activado desactivado
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('processor_id')->references('id')->on('processors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedients');
    }
}
