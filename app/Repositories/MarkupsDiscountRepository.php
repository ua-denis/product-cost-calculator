<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\MarkupsDiscount;
use Illuminate\Database\Eloquent\Collection;

class MarkupsDiscountRepository
{
    public function getMarkupsForCategory(string $category): Collection
    {
        return MarkupsDiscount::query()
            ->where('type', 'category')
            ->where('name', $category)
            ->get();
    }

    public function getMarkupsForLocation(string $location): Collection
    {
        return MarkupsDiscount::query()
            ->where('type', 'location')
            ->where('name', $location)
            ->get();
    }

    public function getVolumeMarkups(string $volume): Collection
    {
        return MarkupsDiscount::query()
            ->where('type', 'volume')
            ->where('name', $volume)
            ->get();
    }

    public function getSellerDiscount(string $discount): Collection
    {
        return MarkupsDiscount::query()
            ->where('type', 'seller')
            ->where('name', $discount)
            ->get();
    }
}
