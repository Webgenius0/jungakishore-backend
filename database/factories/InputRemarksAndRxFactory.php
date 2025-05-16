<?php

namespace Database\Factories;

use App\Models\InputObservation;
use App\Models\InputRemarksAndRx;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputRemarksAndRx>
 */
class InputRemarksAndRxFactory extends Factory
{
    protected $model = InputRemarksAndRx::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'input_observation_id' => InputObservation::factory(),
            'product_id' => Product::factory(),
            'type' => $this->faker->randomElement(['commercial', 'trial']),
            'comment' => $this->faker->paragraph,
            'images' => [$this->faker->imageUrl()],
            'created_by' => User::factory(),
            'status' => 'active',
        ];
    }
}
