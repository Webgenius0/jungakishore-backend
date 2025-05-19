<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PondMicrobeReading>
 */
class PondMicrobeReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pond_microbe_id' => \App\Models\PondMicrobe::inRandomOrder()->value('id'),
            'parameter_id' => \App\Models\Parameter::inRandomOrder()->value('id'),
            'value' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
