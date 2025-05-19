<?php

namespace Database\Seeders;

use App\Models\AreaFarmingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class AreaFarmingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['title' => 'Shrimp', 'short_name' => 'shrimp'],
            ['title' => 'Fish', 'short_name' => 'fish'],
            ['title' => 'Polyculture', 'short_name' => 'polyculture'],
            ['title' => 'Animal', 'short_name' => 'animal'],
        ];

        foreach ($types as $type) {
            AreaFarmingType::updateOrCreate(
                ['slug' => Str::slug($type['title'])],
                [
                    'title' => $type['title'],
                    'short_name' => $type['short_name'],
                    'slug' => Str::slug($type['title']),
                    'status' => 'active',
                ]
            );
        }
    }
}
