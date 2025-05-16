<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
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

                // 🐟 Fish Names
            ['type' => 'fish', 'name' => 'Catla', 'short_name' => 'Catla', 'unit' => null, 'short_code' => 'CAT'],
            ['type' => 'fish', 'name' => 'Tilapia', 'short_name' => 'Tilapia', 'unit' => null, 'short_code' => 'TIL'],
            ['type' => 'fish', 'name' => 'Rohu', 'short_name' => 'Rohu', 'unit' => null, 'short_code' => 'ROH'],
            ['type' => 'fish', 'name' => 'Mrigal', 'short_name' => 'Mrigal', 'unit' => null, 'short_code' => 'MRI'],
            ['type' => 'fish', 'name' => 'Vannamei', 'short_name' => 'Vannamei', 'unit' => null, 'short_code' => 'VAN'],
            ['type' => 'fish', 'name' => 'Tiger', 'short_name' => 'Tiger', 'unit' => null, 'short_code' => 'TIG'],
            ['type' => 'fish', 'name' => 'Rupchanda', 'short_name' => 'Rupchanda', 'unit' => null, 'short_code' => 'RUP'],
            ['type' => 'fish', 'name' => 'Pangasius', 'short_name' => 'Pangasius', 'unit' => null, 'short_code' => 'PAN'],

        ];

        foreach ($parameters as $param) {
            Parameter::updateOrCreate(
                ['name' => $param['name'], 'type' => $param['type']],
                [
                    'short_name' => $param['short_name'],
                    'unit' => $param['unit'],
                    'short_code' => $param['short_code'],
                    'is_default' => true
                ]
            );
        }
    }
}
