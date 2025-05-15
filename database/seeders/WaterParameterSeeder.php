<?php

namespace Database\Seeders;

use App\Models\Parameter;
use App\Models\WaterParameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaterParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parameters = [
            // 🌊 Water Parameters
            ['type' => 'water', 'name' => 'Water Depth', 'short_name' => 'WD', 'unit' => 'feet', 'short_code' => 'ft'],
            ['type' => 'water', 'name' => 'pH', 'short_name' => 'pH', 'unit' => 'pH', 'short_code' => 'pH'],
            ['type' => 'water', 'name' => 'DO', 'short_name' => 'DO', 'unit' => 'mg/L', 'short_code' => 'mg/L'],
            ['type' => 'water', 'name' => 'Salinity', 'short_name' => 'SAL', 'unit' => 'ppm', 'short_code' => 'ppm'],
            ['type' => 'water', 'name' => 'TAN', 'short_name' => 'TAN', 'unit' => 'mg/L', 'short_code' => 'mg/L'],
            ['type' => 'water', 'name' => 'NO2', 'short_name' => 'NO2', 'unit' => 'ppm', 'short_code' => 'ppm'],
            ['type' => 'water', 'name' => 'H2S', 'short_name' => 'H2S', 'unit' => 'ppm', 'short_code' => 'ppm'],

            // 🌱 Soil Parameters
            ['type' => 'soil', 'name' => 'Soil pH', 'short_name' => 'SpH', 'unit' => 'pH', 'short_code' => 'pH'],
            ['type' => 'soil', 'name' => 'Organic Matter', 'short_name' => 'OM', 'unit' => '%', 'short_code' => '%'],
            ['type' => 'soil', 'name' => 'Soil Moisture', 'short_name' => 'SM', 'unit' => '%', 'short_code' => '%'],
            ['type' => 'soil', 'name' => 'Electrical Conductivity', 'short_name' => 'EC', 'unit' => 'dS/m', 'short_code' => 'dS/m'],
            ['type' => 'soil', 'name' => 'Nitrogen', 'short_name' => 'N', 'unit' => 'ppm', 'short_code' => 'ppm'],
            ['type' => 'soil', 'name' => 'Phosphorus', 'short_name' => 'P', 'unit' => 'ppm', 'short_code' => 'ppm'],
            ['type' => 'soil', 'name' => 'Potassium', 'short_name' => 'K', 'unit' => 'ppm', 'short_code' => 'ppm'],

            // 🧫 Microbe Parameters
            ['type' => 'microbe', 'name' => 'Total Bacteria Count', 'short_name' => 'TBC', 'unit' => 'CFU/mL', 'short_code' => 'CFU'],
            ['type' => 'microbe', 'name' => 'Vibrio Count', 'short_name' => 'VC', 'unit' => 'CFU/mL', 'short_code' => 'CFU'],
            ['type' => 'microbe', 'name' => 'Fungal Count', 'short_name' => 'FC', 'unit' => 'CFU/g', 'short_code' => 'CFU'],
            ['type' => 'microbe', 'name' => 'Actinomycetes Count', 'short_name' => 'AC', 'unit' => 'CFU/g', 'short_code' => 'CFU'],
            ['type' => 'microbe', 'name' => 'Lactic Acid Bacteria', 'short_name' => 'LAB', 'unit' => 'CFU/mL', 'short_code' => 'CFU'],
        ];

        foreach ($parameters as $param) {
            Parameter::updateOrCreate(
                ['type' => $param['type'], 'name' => $param['name']],
                $param
            );
        }
    }
}
