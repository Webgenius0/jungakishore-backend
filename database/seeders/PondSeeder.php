<?php

namespace Database\Seeders;

use App\Models\Pond;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class PondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $ponds = [
        //     ['name' => 'Main Pond', 'size' => '1 acre', 'location' => 'North Area'],
        //     ['name' => 'Experimental Pond', 'size' => '0.5 acre', 'location' => 'South Zone'],
        //     ['name' => 'Shrimp Pond', 'size' => '3000 sqft', 'location' => 'East Side'],
        //     ['name' => 'Training Pond', 'size' => '4000 sqft', 'location' => 'West Field'],
        // ];

        // foreach ($ponds as $pond) {
        //     Pond::create([
        //         'enter_prise_id' => null,
        //         'name' => $pond['name'],
        //         'slug' => Str::slug($pond['name']),
        //         'size' => $pond['size'],
        //         'images' => [
        //             'uploads/ponds/sample1.jpg',
        //             'uploads/ponds/sample2.jpg',
        //         ],
        //         'location' => $pond['location'],
        //         'latitude' => 23.8103,
        //         'longitude' => 90.4125,
        //         'created_by' => null,
        //         'status' => 'active',
        //     ]);
        // }

        Pond::factory()->count(100)->create();
    }
}
