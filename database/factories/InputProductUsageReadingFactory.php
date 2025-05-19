<?php

namespace Database\Factories;

use App\Models\InputProductUsage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputProductUsageReading>
 */
class InputProductUsageReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'input_product_usage_id' => InputProductUsage::factory(),
            'product_id' => Product::inRandomOrder()->value('id'),
            'quantity' => $this->faker->randomFloat(2, 1, 100),
            'unit' => $this->faker->randomElement(['g/kg', 'L/acre']),
        ];
    }
}
