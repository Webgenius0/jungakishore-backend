<?php

namespace Database\Seeders;

use App\Models\InputRemarksAndRx;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputRemarksAndRxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputRemarksAndRx::factory(10)->create();
    }
}
