<?php

namespace Database\Seeders;

use App\Models\FishReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FishReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FishReading::factory()->count(50)->create();
    }
}
