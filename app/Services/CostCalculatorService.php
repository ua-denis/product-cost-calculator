<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\CostEstimateRequestData;
use App\Data\CostEstimateResponseData;
use App\Repositories\MarkupsDiscountRepository;
use App\Services\MarkupsDiscounts\MarkupDiscountFactory;
use App\Services\Pricing\PricingCalculator;

class CostCalculatorService
{
    private MarkupDiscountFactory $factory;
    private MarkupsDiscountRepository $repository;
    private PricingCalculator $pricingCalculator;

    public function __construct(
        MarkupDiscountFactory $factory,
        MarkupsDiscountRepository $repository,
        PricingCalculator $pricingCalculator
    ) {
        $this->factory = $factory;
        $this->repository = $repository;
        $this->pricingCalculator = $pricingCalculator;
    }

    public function calculate(CostEstimateRequestData $data): CostEstimateResponseData
    {
        $basePrice = $data->base_price;
        $quantity = $data->quantity;

        $markups = $this->fetchApplicableMarkups($data, $quantity);

        $strategies = $markups->map(fn($md) => $this->factory->create($md));

        $pricingResult = $this->pricingCalculator->calculate($basePrice, $quantity, $strategies);

        return new CostEstimateResponseData(
            final_price: $pricingResult->finalPrice,
            final_cost: $pricingResult->finalCost,
            quantity: $quantity,
            details: $pricingResult->details
        );
    }

    private function fetchApplicableMarkups(CostEstimateRequestData $data, int $quantity)
    {
        $markups = $this->repository->getMarkupsForCategory($data->category)
            ->concat($this->repository->getMarkupsForLocation($data->location));

        if ($quantity > 10) {
            $markups = $markups->concat($this->repository->getVolumeMarkups('over_10'));
        }

        return $markups->concat($this->repository->getSellerDiscount('personal_discount'));
    }
}
