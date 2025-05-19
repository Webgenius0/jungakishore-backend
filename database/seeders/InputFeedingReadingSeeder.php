<?php

namespace Database\Seeders;

use App\Models\InputFeedingReading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputFeedingReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputFeedingReading::factory()->count(4)->create();
    }
}
