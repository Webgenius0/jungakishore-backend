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
                    ['name' => 'Mineral Max', 'short_name' => 'MM', 'price' => 120.50],
                    ['name' => 'Ocean Mineral', 'short_name' => 'OM', 'price' => 95.00],
                ],
                'Probiotics' => [
                    ['name' => 'Aqua Pro', 'short_name' => 'AP', 'price' => 150.00],
                ],
            ],
            'Vitwin' => [
                'Enzymes' => [
                    ['name' => 'Vitazyme', 'short_name' => 'VZ', 'price' => 130.00],
                ],
                'Growth Promoters' => [
                    ['name' => 'GroFast', 'short_name' => 'GF', 'price' => 145.75],
                ],
            ],
            'Other' => [
                'Herbals' => [
                    ['name' => 'HerboLiv', 'short_name' => 'HL', 'price' => 100.00],
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
                        'created_by' => null,
                        'status' => 'active',
                    ]);
                }
            }
        }
    }
}
