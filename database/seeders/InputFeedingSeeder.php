<?php

namespace Database\Seeders;

use App\Models\InputFeeding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputFeedingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputFeeding::factory(10)->create();
    }
}
