<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class CostEstimateRequestData extends Data
{
    public function __construct(
        public float $base_price,
        public string $category,
        public string $location,
        public int $quantity
    ) {
    }
}
