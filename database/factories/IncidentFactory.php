<?php

namespace Database\Factories;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incident::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reporter' => $this->faker->name,
            'pno' => $this->faker->randomNumber(3, true),
            'telephone'=>$this->faker->phoneNumber,
            'time' => $this->faker->time(),
            'date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'reporter_email' => $this->faker->email,
            'narration' => $this->faker->sentence(30),
            'immediate_corrective_action' => $this->faker->sentence(20),
            'operational_impact' => $this->faker->words(3, true),
            'location' => $this->faker->words(2, true),
            'flight' => $this->faker->randomElement(['EK', 'BA', 'AI', 'SV']) . '0' . $this->faker->randomNumber(2, true),
            'department_id' => $this->faker->numberBetween(1,5),
            'incident_type' => $this->faker->randomElement(['Property damage incident', 'Vehicle incident', 'Employee Injury', 'Fire Incident']),
            'assigned_to_email' => $this->faker->randomElement(['dwanyoike@codedcell.com', null, null, null]),
        ];
    }
}
