<?php

namespace App\Http\Controllers;

use App\Data\ProductCategoryData;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;

class ProductCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = ProductCategory::all();

        return response()->json(
            ProductCategoryData::collect($categories)
        );
    }
}
