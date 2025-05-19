<?php

namespace Database\Seeders;

use App\Models\InputFarmerComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InputFarmerCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InputFarmerComment::factory(10)->create();
    }
}
