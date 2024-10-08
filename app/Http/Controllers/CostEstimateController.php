<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostEstimateRequest;
use App\Services\CostCalculatorService;
use Illuminate\Http\JsonResponse;

class CostEstimateController extends Controller
{
    private CostCalculatorService $calculator;

    public function __construct(CostCalculatorService $calculator)
    {
        $this->calculator = $calculator;
    }

    public function calculate(CostEstimateRequest $request): JsonResponse
    {
        $response = $this->calculator->calculate($request->getDto());

        return response()->json($response);
    }
}
