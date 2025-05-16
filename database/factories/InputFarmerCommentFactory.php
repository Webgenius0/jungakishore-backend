<?php

namespace Database\Factories;

use App\Models\InputObservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputFarmerComment>
 */
class InputFarmerCommentFactory extends Factory
{
    protected $model = InputFarmerComment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'input_observation_id' => InputObservation::factory(),
            'pond_positive' => $this->faker->sentence,
            'pond_negative' => $this->faker->sentence,
            'comment' => $this->faker->paragraph,
            'images' => [$this->faker->imageUrl()],
            'created_by' => User::factory(),
            'status' => 'active',
        ];
    }
}
