<?php

namespace Database\Seeders;

use App\Models\PondWaterReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondWaterReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondWaterReading::factory()->count(10)->create();
    }
}
