<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class CostEstimateResponseData extends Data
{
    /** @var CostDetail[] */
    public array $details;

    public function __construct(
        public float $final_price,
        public float $final_cost,
        public int $quantity,
        array $details
    ) {
        $this->details = $details;
    }
}
