<?php

namespace Database\Seeders;

use App\Models\PondPlanktonReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondPlanktonReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondPlanktonReading::factory(10)->create();
    }
}
