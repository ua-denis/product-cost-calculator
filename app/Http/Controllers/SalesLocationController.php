<?php

namespace App\Http\Controllers;

use App\Data\SalesLocationData;
use App\Models\SalesLocation;
use Illuminate\Http\JsonResponse;

class SalesLocationController extends Controller
{
    public function index(): JsonResponse
    {
        $locations = SalesLocation::all();

        return response()->json(
            SalesLocationData::collect($locations)
        );
    }
}
