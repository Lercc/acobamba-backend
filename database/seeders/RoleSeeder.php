<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role();
        $role1->name = 'interno';
        $role1->status = 'activado';
        $role1->save();
    
        $role2 = new Role();
        $role2->name = 'externo';
        $role2->status = 'activado';
        $role2->save();
       
        $role3 = new Role();
        $role3->name = 'admin';
        $role3->status = 'activado';
        $role3->save();

    }
}
