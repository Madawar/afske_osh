<?php

namespace Database\Seeders;

use App\Models\Checklist;
use App\Models\ChecklistItem;
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
        \App\Models\User::factory(1)->state([
            'email' => 'dwanyoike@codedcell.com',
        ])->create();
        //     \App\Models\Department::factory(20)->create();
        $departments = array('Operations', 'OSH', 'Security', 'Finance', 'ICT', 'Passenger', 'Ramp');
        foreach ($departments as $department) {
            Department::create(array(
                'name' => $department,
                'manager_id' => rand(1, 10)
            ));
        }
        \App\Models\Incident::factory(20)->create();

        $users = Checklist::factory()
            ->has(ChecklistItem::factory()->state([
                'subcategory' => 'Section 1',
            ])->count(5))
            ->has(ChecklistItem::factory()->state([
                'subcategory' => 'Section 2',
            ])->count(5))
            ->has(ChecklistItem::factory()->state([
                'subcategory' => 'Section 3',
            ])->count(5))
            ->count(5)->create();
    }
}
