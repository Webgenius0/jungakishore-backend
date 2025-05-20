<?php

namespace Database\Factories;

use App\Models\BiomassObservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BiomassHarvest>
 */
class BiomassHarvestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'biomass_observation_id' => BiomassObservation::inRandomOrder()->value('id'),
            'comment' => $this->faker->sentence,
            'images' => [$this->faker->imageUrl(), $this->faker->imageUrl()],
            'created_by' => User::inRandomOrder()->value('id'),
            'status' => 'active',
        ];
    }
}
