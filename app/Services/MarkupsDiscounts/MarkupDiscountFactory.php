<?php

declare(strict_types=1);

namespace App\Services\MarkupsDiscounts;

use App\Contracts\MarkupDiscountStrategyInterface;
use App\Models\MarkupsDiscount;
use InvalidArgumentException;

class MarkupDiscountFactory
{
    private array $strategies = [
        'category' => CategoryMarkupDiscountStrategy::class,
        'location' => LocationMarkupDiscountStrategy::class,
        'volume' => VolumeMarkupDiscountStrategy::class,
        'seller' => SellerMarkupDiscountStrategy::class,
    ];
    
    public function create(MarkupsDiscount $markupDiscount): MarkupDiscountStrategyInterface
    {
        $type = $markupDiscount->type;

        if (!isset($this->strategies[$type])) {
            throw new InvalidArgumentException("Unknown markup/discount type: {$markupDiscount->type}");
        }

        $strategyClass = $this->strategies[$type];

        return new $strategyClass($markupDiscount);
    }
}
