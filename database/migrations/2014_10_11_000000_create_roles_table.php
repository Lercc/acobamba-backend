<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migratiopns.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', '7');                  // admin interno externo
            $table->string('status', '11');
            $table->timestamps();
        });
        DB::table('roles')->insert(array('id'=>'1', 'name'=>'Admin', 'status'=>'activado'));
        DB::table('roles')->insert(array('id'=>'2', 'name'=>'Interno', 'status'=>'activado'));
        DB::table('roles')->insert(array('id'=>'3', 'name'=>'Externo', 'status'=>'activado'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
