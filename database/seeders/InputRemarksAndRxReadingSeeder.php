<?php

namespace Database\Seeders;

use App\Models\InputRemarksAndRxReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputRemarksAndRxReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputRemarksAndRxReading::factory()->count(10)->create();
    }
}
