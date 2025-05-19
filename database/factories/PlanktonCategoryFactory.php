<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanktonCategory>
 */
class PlanktonCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word();
        return [
            'enterprise_id' => null,
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => $this->faker->randomElement(['useful', 'harmful']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
