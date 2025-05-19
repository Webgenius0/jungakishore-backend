<?php

namespace Database\Seeders;

use App\Models\PondMicrobeReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondMicrobeReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondMicrobeReading::factory(10)->create();
    }
}
