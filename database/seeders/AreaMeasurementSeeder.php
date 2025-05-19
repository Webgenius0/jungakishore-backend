<?php

namespace Database\Seeders;

use App\Models\AreaMeasurement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['title' => 'Acre', 'slug' => 'acre', 'short_name' => 'ac', 'value' => 1],
            ['title' => 'Hectare', 'slug' => 'hectare', 'short_name' => 'ha', 'value' => 0.405],
            ['title' => 'Square Meter', 'slug' => 'square-meter', 'short_name' => 'm²', 'value' => 4047],
            ['title' => 'Bigha', 'slug' => 'bigha', 'short_name' => 'bigha', 'value' => 3], // regional average
        ];

        foreach ($units as $unit) {
            AreaMeasurement::updateOrCreate(['slug' => $unit['slug']], $unit);
        }
    }
}
