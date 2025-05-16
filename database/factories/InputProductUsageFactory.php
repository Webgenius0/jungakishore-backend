<?php

namespace Database\Factories;

use App\Models\InputObservation;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputProductUsage>
 */
class InputProductUsageFactory extends Factory
{
    protected $model = InputProductUsage::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'input_observation_id' => InputObservation::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->randomFloat(2, 1, 100),
            'perameter_id' => null,
            'unit_perameter' => $this->faker->randomElement(['g/kg', 'L/acre']),
            'comment' => $this->faker->paragraph,
            'images' => [$this->faker->imageUrl()],
            'created_by' => User::factory(),
            'status' => 'active',
        ];
    }
}
