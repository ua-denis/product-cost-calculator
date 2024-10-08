<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\MarkupsDiscount;
use Illuminate\Database\Seeder;

class MarkupsDiscountsSeeder extends Seeder
{
    public function run(): void
    {
        $markupsDiscounts = [
            // Category-based
            ['type' => 'category', 'name' => 'Electronics', 'percentage' => 5.00],
            ['type' => 'category', 'name' => 'Furniture', 'percentage' => -10.00],
            ['type' => 'category', 'name' => 'Clothing', 'percentage' => 0.00],
            // Location-based
            ['type' => 'location', 'name' => 'Kyiv', 'percentage' => 2.00],
            ['type' => 'location', 'name' => 'Lviv', 'percentage' => -3.00],
            // Volume-based
            ['type' => 'volume', 'name' => 'over_10', 'percentage' => -5.00],
            // Seller-based
            ['type' => 'seller', 'name' => 'personal_discount', 'percentage' => -2.00],
        ];

        foreach ($markupsDiscounts as $md) {
            MarkupsDiscount::create($md);
        }
    }
}
