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

        DB::table('employees')->insert(array('id'=>'1', 'user_id'=>'4','office_id'=>'2', 'employee_type'=>'gerente'));
        DB::table('employees')->insert(array('id'=>'2', 'user_id'=>'5','office_id'=>'10', 'employee_type'=>'secretaria'));
        DB::table('employees')->insert(array('id'=>'3', 'user_id'=>'6','suboffice_id'=>'1', 'employee_type'=>'subgerente'));
        DB::table('employees')->insert(array('id'=>'4', 'user_id'=>'7','office_id'=>'8', 'employee_type'=>'secretaria'));
        DB::table('employees')->insert(array('id'=>'5', 'user_id'=>'8','office_id'=>'1', 'employee_type'=>'gerente'));

        DB::table('employees')->insert(array('id'=>'6', 'user_id'=>'9','office_id'=>'4', 'employee_type'=>'secretaria'));
        DB::table('employees')->insert(array('id'=>'7', 'user_id'=>'10','suboffice_id'=>'5', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'8', 'user_id'=>'11','suboffice_id'=>'4', 'employee_type'=>'trabajador'));

        DB::table('employees')->insert(array('id'=>'9', 'user_id'=>'12','office_id'=>'19', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'10', 'user_id'=>'13','suboffice_id'=>'9', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'11', 'user_id'=>'14','office_id'=>'20', 'employee_type'=>'trabajador'));

        DB::table('employees')->insert(array('id'=>'12', 'user_id'=>'15','suboffice_id'=>'7', 'employee_type'=>'subgerente'));
        DB::table('employees')->insert(array('id'=>'13', 'user_id'=>'16','office_id'=>'9', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'14', 'user_id'=>'17','office_id'=>'21', 'employee_type'=>'trabajador'));

        DB::table('employees')->insert(array('id'=>'15', 'user_id'=>'18','office_id'=>'22', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'16', 'user_id'=>'19','office_id'=>'11', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'17', 'user_id'=>'20','suboffice_id'=>'3', 'employee_type'=>'trabajador'));

        DB::table('employees')->insert(array('id'=>'18', 'user_id'=>'21','office_id'=>'23', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'20', 'user_id'=>'22','suboffice_id'=>'6', 'employee_type'=>'subgerente'));
        DB::table('employees')->insert(array('id'=>'21', 'user_id'=>'23','suboffice_id'=>'6', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'22', 'user_id'=>'24','office_id'=>'24', 'employee_type'=>'trabajador'));
        
        DB::table('employees')->insert(array('id'=>'23', 'user_id'=>'25','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'24', 'user_id'=>'26','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'25', 'user_id'=>'27','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'26', 'user_id'=>'28','office_id'=>'25', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'27', 'user_id'=>'29','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'28', 'user_id'=>'30','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'29', 'user_id'=>'31','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'30', 'user_id'=>'32','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'31', 'user_id'=>'33','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'32', 'user_id'=>'34','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'33', 'user_id'=>'35','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'34', 'user_id'=>'36','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'35', 'user_id'=>'37','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'36', 'user_id'=>'38','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'37', 'user_id'=>'39','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'38', 'user_id'=>'40','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'39', 'user_id'=>'41','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'40', 'user_id'=>'42','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'41', 'user_id'=>'43','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'42', 'user_id'=>'44','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'43', 'user_id'=>'45','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'44', 'user_id'=>'46','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'45', 'user_id'=>'47','office_id'=>'26', 'employee_type'=>'trabajador'));
        DB::table('employees')->insert(array('id'=>'46', 'user_id'=>'48','office_id'=>'26', 'employee_type'=>'trabajador'));
    

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
