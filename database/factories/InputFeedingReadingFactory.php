<?php

namespace Database\Factories;

use App\Models\InputFeeding;
use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InputFeedingReading>
 */
class InputFeedingReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'input_feeding_id' => InputFeeding::factory(),
            'parameter_id' => Parameter::where('type', 'feeding')->get()->random()->id,
            'value' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
