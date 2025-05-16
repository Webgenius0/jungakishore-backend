<?php

namespace Database\Seeders;

use App\Models\PondObservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondObservation::factory(10)->create();
    }
}
