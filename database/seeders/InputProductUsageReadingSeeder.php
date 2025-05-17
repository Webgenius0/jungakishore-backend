<?php

namespace Database\Seeders;

use App\Models\InputProductUsageReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputProductUsageReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputProductUsageReading::factory()->count(20)->create();
    }
}
