<?php

namespace Database\Seeders;

use App\Models\PondMicrobe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondMicrobeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondMicrobe::factory()->count(10)->create();
    }
}
