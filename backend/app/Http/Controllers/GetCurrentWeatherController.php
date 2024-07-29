<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherResource;
use App\Services\OpenWeatherMapService;
use Illuminate\Http\Request;

class GetCurrentWeatherController extends Controller
{
    public function __invoke(Request $request, OpenWeatherMapService $openWeatherMapService)
    {
        try {
            $currentWeather = $openWeatherMapService->getCurrentWeather($request->lat, $request->lon, $request->units);

            return WeatherResource::make($currentWeather);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to fetch current weather'], 500);
        }
    }
}
