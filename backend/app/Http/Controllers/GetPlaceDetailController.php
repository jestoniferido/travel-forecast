<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceDetailResource;
use App\Services\FoursquareService;
use Illuminate\Http\Request;

class GetPlaceDetailController extends Controller
{
    public function __invoke(Request $request, $id, FoursquareService $foursquareService)
    {
        try {
            $details = $foursquareService->getPlaceDetails($id);

            return PlaceDetailResource::make($details);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to fetch place detail'], 500);
        }
    }
}
