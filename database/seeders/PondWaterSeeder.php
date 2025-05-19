<?php

namespace Database\Seeders;

use App\Models\PondWater;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondWaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondWater::factory()->count(10)->create();
    }
}
