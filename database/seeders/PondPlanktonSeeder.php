<?php

namespace Database\Seeders;

use App\Models\PondPlankton;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondPlanktonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PondPlankton::factory()->count(10)->create();
    }
}
