<?php

namespace Database\Seeders;

use App\Models\BiomassStocks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiomassStocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiomassStocks::factory()->count(4)->create();
    }
}
