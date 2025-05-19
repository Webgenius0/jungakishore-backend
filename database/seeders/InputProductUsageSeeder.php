<?php

namespace Database\Seeders;

use App\Models\InputProductUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputProductUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputProductUsage::factory(10)->create();
    }
}
