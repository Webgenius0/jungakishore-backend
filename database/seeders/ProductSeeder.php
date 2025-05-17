<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'Bluewight' => [
                'Minerals' => [
                    ['name' => 'Mineral Max', 'short_name' => 'MM', 'price' => 120.50, 'unit_parameter' => 'g/kg'],
                    ['name' => 'Mineral Pro', 'short_name' => 'MP', 'price' => 110.00, 'unit_parameter' => 'g/kg'],
                    ['name' => 'Ocean Mineral', 'short_name' => 'OM', 'price' => 95.00, 'unit_parameter' => 'g/kg'],
                ],
                'Probiotics' => [
                    ['name' => 'Aqua Pro', 'short_name' => 'AP', 'price' => 150.00, 'unit_parameter' => 'g/kg'],
                ],
            ],
            'Vitwin' => [
                'Enzymes' => [
                    ['name' => 'Vitazyme', 'short_name' => 'VZ', 'price' => 130.00, 'unit_parameter' => 'g/kg'],
                ],
                'Growth Promoters' => [
                    ['name' => 'GroFast', 'short_name' => 'GF', 'price' => 145.75, 'unit_parameter' => 'g/kg'],
                ],
            ],
            'Other' => [
                'Herbals' => [
                    ['name' => 'HerboLiv', 'short_name' => 'HL', 'price' => 100.00, 'unit_parameter' => 'g/kg'],
                ],
            ],
        ];

        foreach ($products as $company => $productGroups) {
            $category = \App\Models\Category::where('title', $company)->first();
            if (!$category)
                continue;

            foreach ($productGroups as $subCat => $items) {
                $subCategory = \App\Models\SubCategory::where('title', $subCat)
                    ->where('category_id', $category->id)
                    ->first();

                if (!$subCategory)
                    continue;

                foreach ($items as $item) {
                    Product::create([
                        'enter_prise_id' => null,
                        'category_id' => $category->id,
                        'sub_category_id' => $subCategory->id,
                        'name' => $item['name'],
                        'slug' => Str::slug($item['name']),
                        'short_name' => $item['short_name'],
                        'price_per_unit' => $item['price'],
                        'unit_parameter' => $item['unit_parameter'],
                        'created_by' => null,
                        'status' => 'active',
                    ]);
                }
            }
        }
    }
}
