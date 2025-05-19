<?php

namespace Database\Factories;

use App\Models\PlanktonCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanktonSubcategory>
 */
class PlanktonSubcategoryFactory extends Factory
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
            'plankton_category_id' => PlanktonCategory::inRandomOrder()->value('id'),
            'name' => $name,
            'slug' => Str::slug($name),
            'short_name' => strtoupper(Str::limit($name, 3, '')),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
