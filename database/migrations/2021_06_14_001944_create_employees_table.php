<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('office_id')->unsigned()->nullable();
            $table->bigInteger('suboffice_id')->unsigned()->nullable();
            $table->string('employee_type', '10');                          // gerente subgerente trabajador secretaria
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('suboffice_id')->references('id')->on('suboffices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
