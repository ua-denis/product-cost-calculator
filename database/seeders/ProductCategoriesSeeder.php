<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Electronics', 'Furniture', 'Clothing'];

        foreach ($categories as $category) {
            ProductCategory::create(['name' => $category]);
        }
    }
}
