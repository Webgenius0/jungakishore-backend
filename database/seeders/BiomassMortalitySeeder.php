<?php

namespace Database\Seeders;

use App\Models\BiomassMortality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiomassMortalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiomassMortality::factory()->count(4)->create();
    }
}
