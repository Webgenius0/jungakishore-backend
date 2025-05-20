<?php

namespace Database\Seeders;

use App\Models\BiomassTransfer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiomassTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiomassTransfer::factory()->count(3)->create();
    }
}
