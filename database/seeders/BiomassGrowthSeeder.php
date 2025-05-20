<?php

namespace Database\Seeders;

use App\Models\BiomassGrowth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiomassGrowthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiomassGrowth::factory()->count(5)->create();
    }
}
