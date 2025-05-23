<?php

namespace Database\Factories;

use App\Models\InputObservation;
use App\Models\InputProductUsage;
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
            'comment' => $this->faker->paragraph,
            'images' => [$this->faker->imageUrl()],
            'created_by' => User::factory(),
            'status' => 'active',
        ];
    }
}
