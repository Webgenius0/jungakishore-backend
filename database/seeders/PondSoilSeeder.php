<?php

namespace Database\Seeders;

use App\Models\PondSoil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondSoilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondSoil::factory()->count(10)->create();
    }
}
