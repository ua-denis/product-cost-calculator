<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class CostDetail extends Data
{
    public function __construct(
        public string $description,
        public float $percentage,
        public float $amount
    ) {
    }
}
