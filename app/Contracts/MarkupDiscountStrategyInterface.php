<?php

declare(strict_types=1);

namespace App\Contracts;

interface MarkupDiscountStrategyInterface
{
    public function apply(float $price): float;

    public function getDescription(): string;

    public function getPercentage(): string;
}
