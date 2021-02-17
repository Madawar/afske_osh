<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        //     \App\Models\Department::factory(20)->create();
        $departments = array('Operations', 'OSH', 'Security', 'Finance', 'ICT', 'Passenger', 'Ramp');
        foreach ($departments as $department) {
            Department::create(array(
                'name' => $department,
                'manager_id' => rand(1, 10)
            ));
        }
        \App\Models\Incident::factory(20)->create();
    }
}
