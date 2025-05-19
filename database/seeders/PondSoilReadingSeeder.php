<?php

namespace Database\Seeders;

use App\Models\PondSoilReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondSoilReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       PondSoilReading::factory()->count(10)->create();
        
    }
}
