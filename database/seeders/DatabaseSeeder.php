<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Employee;
use App\Models\Expedient;
use App\Models\Processor;
use App\Models\Derivation;
use App\Models\Archivation;
use App\Models\Notification;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //     RoleSeeder::class,
        // ]);

        User::factory(90)->create();
        Processor::factory(60)->create();
        Employee::factory(60)->create();
        Expedient::factory(60)->create();
        Derivation::factory(60)->create();
        Archivation::factory(40)->create();
        Notification::factory(40)->create();

    }
}
