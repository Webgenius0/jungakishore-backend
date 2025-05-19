<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PondPlanktonReading>
 */
class PondPlanktonReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pond_plankton_id' => \App\Models\PondPlankton::inRandomOrder()->value('id'),
            'plankton_subcategory_id' => \App\Models\PlanktonSubcategory::inRandomOrder()->value('id'),
            'value' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
