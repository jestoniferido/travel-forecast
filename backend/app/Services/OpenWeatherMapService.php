<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenWeatherMapService
{
    protected $baseUrl;

    protected $appid;

    protected $client;

    public function __construct()
    {
        $this->baseUrl = config('services.openweathermap.base_url');
        $this->appid = config('services.openweathermap.appid');

        $this->client = Http::withHeaders([
            'Accept' => 'application/json',
        ]);
    }

    public function getCurrentWeather($lat, $lon, $units)
    {
        $response = $this->client->get($this->baseUrl.'/weather', [
            'appid' => $this->appid,
            'lat' => $lat,
            'lon' => $lon,
            'units' => $units,
        ]);

        if ($response->successful()) {
            return $response->object();
        }

        return [];
    }

    public function getWeatherForecast($lat, $lon, $units)
    {
        $response = $this->client->get($this->baseUrl.'/forecast', [
            'appid' => $this->appid,
            'lat' => $lat,
            'lon' => $lon,
            'units' => $units,
        ]);

        if ($response->successful()) {
            return $response->object()->list;
        }

        return [];
    }
}
