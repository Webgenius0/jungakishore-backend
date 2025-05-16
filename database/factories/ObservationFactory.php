<?php

namespace Database\Factories;

use App\Models\Pond;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Observation>
 */
class ObservationFactory extends Factory
{
    protected $model = Observation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'pond_id' => Pond::factory(),
            'unique_id' => $this->faker->uuid,
            'obzrve_by' => $this->faker->name,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
