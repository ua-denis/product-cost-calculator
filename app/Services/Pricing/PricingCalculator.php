<?php

declare(strict_types=1);

namespace App\Services\Pricing;

use App\Data\CostDetail;
use Illuminate\Support\Collection;

class PricingCalculator
{
    public function calculate(float $basePrice, int $quantity, Collection $strategies): PricingResult
    {
        $details = [];
        $currentPrice = $basePrice;

        foreach ($strategies as $strategy) {
            $newPrice = $strategy->apply($currentPrice);
            $percentageChange = (float)$strategy->getPercentage();

            $amountChange = round($currentPrice * ($percentageChange / 100), 2);

            $details[] = new CostDetail(
                description: $strategy->getDescription(),
                percentage: $percentageChange,
                amount: $amountChange
            );

            $currentPrice = $newPrice;
        }

        $finalUnitPrice = round($currentPrice, 2);
        $finalCost = round($finalUnitPrice * $quantity, 2);

        return new PricingResult($finalCost, $finalUnitPrice, $details);
    }
}
