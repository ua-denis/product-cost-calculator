<?php

declare(strict_types=1);

namespace App\Services\MarkupsDiscounts;

use App\Contracts\MarkupDiscountStrategyInterface;
use App\Models\MarkupsDiscount;

class CategoryMarkupDiscountStrategy implements MarkupDiscountStrategyInterface
{
    private MarkupsDiscount $markupDiscount;

    public function __construct(MarkupsDiscount $markupDiscount)
    {
        $this->markupDiscount = $markupDiscount;
    }

    public function apply(float $price): float
    {
        return $price * (1 + ($this->markupDiscount->percentage / 100));
    }

    public function getDescription(): string
    {
        $type = $this->markupDiscount->percentage >= 0 ? 'Markup' : 'Discount';
        return "{$type} ({$this->markupDiscount->name}): {$this->markupDiscount->percentage}%";
    }

    public function getPercentage(): string
    {
        return (string)$this->markupDiscount->percentage;
    }
}
