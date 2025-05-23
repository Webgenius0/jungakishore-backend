<?php

namespace Database\Factories;

use App\Models\PondObservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PondMicrobe>
 */
class PondMicrobeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pond_observation_id' => PondObservation::inRandomOrder()->value('id'),
            'comment' => $this->faker->sentence(),
            'images' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
            'created_by' => User::inRandomOrder()->value('id'),
            'status' => 'active',
        ];
    }
}
