<?php

use App\Http\Controllers\CostEstimateController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SalesLocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::get('/categories', [ProductCategoryController::class, 'index']);
    Route::get('/locations', [SalesLocationController::class, 'index']);
    Route::post('/calculate', [CostEstimateController::class, 'calculate']);
});
