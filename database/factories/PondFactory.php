<?php

namespace Database\Factories;

use App\Models\Enterprise;
use App\Models\Pond;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pond>
 */
class PondFactory extends Factory
{
    protected $model = Pond::class;

    public function definition(): array
    {
        $name = $this->faker->word . ' Pond';
        return [
            'enter_prise_id' => Enterprise::inRandomOrder()->value('id'),
            'name' => $name, // ✅ You missed this line before
            'slug' => Str::slug($name . '-' . $this->faker->unique()->uuid),
            'size' => $this->faker->randomFloat(2, 0.5, 10) . ' acres',
            'images' => json_encode([$this->faker->imageUrl()]),
            'location' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'created_by' => null,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
