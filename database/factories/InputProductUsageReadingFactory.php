<?php

namespace Database\Factories;

use App\Models\InputRemarksAndRx;
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
            'input_remarks_and_rx_id' => InputRemarksAndRx::factory(),
            'product_id' => Product::inRandomOrder()->value('id'),
            'product_name' => $this->faker->word,
            'quantity' => $this->faker->randomFloat(2, 1, 100),
            'unit' => $this->faker->randomElement(['g/kg', 'L/acre']),
            'applied_or_not' => $this->faker->boolean(),
            'type' => $this->faker->randomElement(['commercial', 'trial']),
            'time' => $this->faker->randomElement(['1hr', '2hr', '1day', '2day']),
        ];
    }
}
