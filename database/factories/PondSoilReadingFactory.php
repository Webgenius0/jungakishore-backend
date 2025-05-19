<?php

namespace Database\Factories;

use App\Models\Parameter;
use App\Models\PondSoil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PondSoilReading>
 */
class PondSoilReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pond_soil_id' => PondSoil::inRandomOrder()->value('id'),
            'parameter_id' => Parameter::where('type', 'soil')->inRandomOrder()->value('id'),
            'value' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
