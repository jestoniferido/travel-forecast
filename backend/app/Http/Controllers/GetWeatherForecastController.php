<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherForecastResource;
use App\Services\OpenWeatherMapService;
use Illuminate\Http\Request;

class GetWeatherForecastController extends Controller
{
    public function __invoke(Request $request, OpenWeatherMapService $openWeatherMapService)
    {
        try {
            $currentWeather = $openWeatherMapService->getWeatherForecast($request->lat, $request->lon, $request->units);

            return WeatherForecastResource::collection($currentWeather);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to fetch weather forecast'], 500);
        }
    }
}
