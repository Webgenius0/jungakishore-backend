<?php

namespace Database\Factories;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FishReading>
 */
class FishReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['stock', 'growth', 'harvest', 'transfer', 'mortality'];
        $type = $this->faker->randomElement($types);

        return [
            'type' => $type,
            'related_id' => 1, // Replace with a valid ID or dynamically relate
            'parameter_id' => Parameter::where('type', 'fish')->inRandomOrder()->value('id'),
            'quantity' => $this->faker->numberBetween(10, 100),
            'average_weight_g' => $this->faker->randomFloat(2, 0.5, 5.0),
            'total_weight_kg' => $this->faker->randomFloat(2, 1, 50),
        ];
    }
}
