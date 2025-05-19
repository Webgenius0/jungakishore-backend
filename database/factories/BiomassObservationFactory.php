<?php

namespace Database\Factories;

use App\Models\BiomassObservation;
use App\Models\Observation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BiomassObservation>
 */
class BiomassObservationFactory extends Factory
{
    protected $model = BiomassObservation::class;

    public function definition()
    {
        return [
            'observation_id' => Observation::factory(),
            'created_by' => User::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
