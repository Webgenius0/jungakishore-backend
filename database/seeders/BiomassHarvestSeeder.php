<?php

namespace Database\Seeders;

use App\Models\BiomassHarvest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiomassHarvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiomassHarvest::factory()->count(5)->create();
    }
}
