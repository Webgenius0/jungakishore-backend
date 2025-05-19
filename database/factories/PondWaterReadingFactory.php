<?php

namespace Database\Factories;

use App\Models\Parameter;
use App\Models\PondWater;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PondWaterReading>
 */
class PondWaterReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pond_water_id' => PondWater::inRandomOrder()->value('id'),
            'parameter_id' => Parameter::where('type', 'water')->inRandomOrder()->value('id'),
            'value' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
