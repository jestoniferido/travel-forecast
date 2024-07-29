<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use App\Services\FoursquareService;
use Illuminate\Http\Request;

class GetPlacePhotosController extends Controller
{
    public function __invoke(Request $request, FoursquareService $foursquareService)
    {
        try {
            $photos = $foursquareService->getPlacePhotos($request->id, $request->limit);

            return PhotoResource::collection($photos);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to fetch place photos'], 500);
        }
    }
}
