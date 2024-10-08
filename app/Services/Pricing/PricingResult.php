<?php

declare(strict_types=1);

namespace App\Services\Pricing;

class PricingResult
{
    public float $finalPrice;
    public float $finalCost;
    public array $details;

    public function __construct(float $finalCost, float $finalPrice, array $details)
    {
        $this->finalPrice = $finalPrice;
        $this->finalCost = $finalCost;
        $this->details = $details;
    }
}
