<?php

namespace Database\Seeders;

use App\Models\IncidentFactor;
use Illuminate\Database\Seeder;

class FactorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factors = array(
            'Work Area/Environment' => array(
                'Traffic Congestion',
                'Ramp Markings',
                'Visual Reference',
                'Lighting',
            ),
            'Equipment Tools' => array(
                'Equipment Malfunction',
                'Equipment Difficult to use',
                'Not Familiar with Equipment',
                'Other',
            ),
            'Communication' => array(
                'Shift Debriefing',
                'Hand Signals',
            ),
            'Ergonomics' => array(
                'Repetitive/Monotonous',
                'Kneeling/Bending/Stooping',
            ),


        );

        foreach ($factors as $key => $factor) {
            foreach($factor as $item){
                IncidentFactor::create(array(
                    'category' => $key,
                    'factor' => $item
                ));
            }

        }
    }
}
