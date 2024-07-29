<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceResource;
use App\Services\FoursquareService;
use Illuminate\Http\Request;

class SearchPlaceController extends Controller
{
    public function __invoke(Request $request, FoursquareService $foursquareService)
    {
        try {
            $places = $foursquareService->searchPlace($request->location);

            return PlaceResource::collection($places);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to fetch places'], 500);
        }
    }
}
