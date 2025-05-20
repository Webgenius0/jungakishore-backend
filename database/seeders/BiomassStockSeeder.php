<?php

namespace Database\Seeders;

use App\Models\BiomassStock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiomassStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiomassStock::factory()->count(4)->create();
    }
}
