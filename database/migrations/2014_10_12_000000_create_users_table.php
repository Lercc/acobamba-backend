<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id')->unsigned();
            $table->string('name', 80);
            $table->string('last_name', 120);
            $table->string('doc_type', 11);                         // DNI - EXTRANJERIA
            $table->string('doc_number', 11)->unique();             // 8 11
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status', 11);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });

        // admin
        DB::table('users')->insert(array('id'=>'1', 'role_id'=>'1','name'=>'admin', 'last_name'=>'admin', 'doc_type'=>'dni', 'doc_number'=>'00000001', 'email'=>'admin@admin.com', 'password'=>'password', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'2', 'role_id'=>'1','name'=>'admin2', 'last_name'=>'admin2', 'doc_type'=>'dni', 'doc_number'=>'00000002', 'email'=>'admin2@admin.com', 'password'=>'password', 'status'=>'desactivado'));
        DB::table('users')->insert(array('id'=>'3', 'role_id'=>'1','name'=>'admin3', 'last_name'=>'admin3', 'doc_type'=>'dni', 'doc_number'=>'00000003', 'email'=>'admin3@admin.com', 'password'=>'password', 'status'=>'desactivado'));
        // interno
        DB::table('users')->insert(array('id'=>'4', 'role_id'=>'2','name'=>'pepito gerente', 'last_name'=>'aliaga', 'doc_type'=>'dni', 'doc_number'=>'99999999', 'email'=>'pepito@pepito.com', 'password'=>'password', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'5', 'role_id'=>'2','name'=>'rosa secretaria', 'last_name'=>'rodriguez', 'doc_type'=>'dni', 'doc_number'=>'99999991', 'email'=>'rosa@rosa.com', 'password'=>'password', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'6', 'role_id'=>'2','name'=>'juanito subgerente', 'last_name'=>'romero', 'doc_type'=>'dni', 'doc_number'=>'99999993', 'email'=>'juanito@juanito.com', 'password'=>'password', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'7', 'role_id'=>'2','name'=>'sandro trabajador', 'last_name'=>'ramirez', 'doc_type'=>'dni', 'doc_number'=>'99999994', 'email'=>'sandro@sandro.com', 'password'=>'password', 'status'=>'activado'));
        // externo
        DB::table('users')->insert(array('id'=>'8', 'role_id'=>'3','name'=>'luis ext', 'last_name'=>'roque', 'doc_type'=>'dni', 'doc_number'=>'77777777', 'email'=>'luis@luis.com', 'password'=>'password', 'status'=>'activado'));
        DB::table('users')->insert(array('id'=>'9', 'role_id'=>'3','name'=>'piero ext', 'last_name'=>'parra', 'doc_type'=>'dni', 'doc_number'=>'77777779', 'email'=>'piero@piero.com', 'password'=>'password', 'status'=>'activado'));
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
