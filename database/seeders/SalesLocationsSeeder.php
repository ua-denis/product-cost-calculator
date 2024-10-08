<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SalesLocation;
use Illuminate\Database\Seeder;

class SalesLocationsSeeder extends Seeder
{
    public function run(): void
    {
        $cities = ['Kyiv', 'Lviv', 'Odessa'];

        foreach ($cities as $city) {
            SalesLocation::create(['city' => $city]);
        }
    }
}
