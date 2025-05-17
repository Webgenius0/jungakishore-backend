<?php

namespace Database\Factories;

use App\Models\InputFeeding;
use App\Models\InputObservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputFeeding>
 */
class InputFeedingFactory extends Factory
{
    protected $model = InputFeeding::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'input_observation_id' => InputObservation::factory(),
            'no_of_feed_bags' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->sentence,
            'images' => [$this->faker->imageUrl()],
            'created_by' => User::factory(),
            'status' => 'active',
        ];
    }
}
