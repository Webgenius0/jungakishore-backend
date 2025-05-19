<?php

namespace Database\Factories;

use App\Models\Observation;
use App\Models\PondObservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PondObservation>
 */
class PondObservationFactory extends Factory
{
    protected $model = PondObservation::class;

    public function definition()
    {
        return [
            'observation_id' => Observation::factory(),
            'created_by' => User::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
