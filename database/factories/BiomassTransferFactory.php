<?php

namespace Database\Factories;

use App\Models\BiomassObservation;
use App\Models\Pond;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BiomassTransfer>
 */
class BiomassTransferFactory extends Factory
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
            'from_pond_id' => Pond::inRandomOrder()->value('id'),
            'to_pond_id' => Pond::inRandomOrder()->value('id'),
            'comment' => $this->faker->paragraph,
            'images' => [$this->faker->imageUrl()],
            'created_by' => User::inRandomOrder()->value('id'),
            'status' => 'active',
        ];
    }
}
