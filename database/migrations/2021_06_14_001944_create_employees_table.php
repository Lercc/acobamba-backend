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

        DB::table('employees')->insert(array('id'=>'1', 'user_id'=>'4','office_id'=>'3', 'employee_type'=>'gerente'));
        DB::table('employees')->insert(array('id'=>'2', 'user_id'=>'5','office_id'=>'3', 'employee_type'=>'secretaria'));
        DB::table('employees')->insert(array('id'=>'3', 'user_id'=>'6','suboffice_id'=>'1', 'employee_type'=>'subgerente'));
        DB::table('employees')->insert(array('id'=>'4', 'user_id'=>'7','suboffice_id'=>'1', 'employee_type'=>'trabajador'));
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
