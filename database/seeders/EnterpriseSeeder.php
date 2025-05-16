<?php

namespace Database\Seeders;

use App\Models\Enterprise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enterprises = [
            'Fish Farming',
            'Shrimp Farming',
            'Polyculture Farming',
            'Integrated Pond Management',
            'Pond Water Treatment',
            'Aquatic Plant Cultivation',
            'Pond Soil Management',
            'Pond Microbial Management',
            'Pond-Based Animal Rearing',
        ];

        foreach ($enterprises as $name) {
            Enterprise::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'created_by' => null, // or pass a user ID
                'status' => 'active',
            ]);
        }
    }
}
