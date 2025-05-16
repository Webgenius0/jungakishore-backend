<?php

namespace Database\Seeders;

use App\Models\BiomassObservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiomassObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiomassObservation::factory(10)->create();
    }
}
