<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class CategoryAndSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Bluewight' => ['Minerals', 'Herbals', 'Probiotics', 'Vitamins'],
            'Vitwin' => ['Enzymes', 'Feed Additives', 'Growth Promoters'],
            'Other' => ['Immunity Boosters', 'Herbals_zp', 'Probiotics_zp'],
        ];

        foreach ($data as $company => $products) {
            $category = Category::create([
                'enter_prise_id' => null,
                'title' => $company,
                'slug' => Str::slug($company),
                'created_by' => null,
                'status' => 'active',
            ]);

            foreach ($products as $product) {
                SubCategory::create([
                    'category_id' => $category->id,
                    'title' => $product,
                    'slug' => Str::slug($product),
                    'created_by' => null,
                    'status' => 'active',
                ]);
            }
        }
    }
}
