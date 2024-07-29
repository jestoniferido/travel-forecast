<?php

use App\Http\Controllers\GetCurrentWeatherController;
use App\Http\Controllers\GetPlaceDetailController;
use App\Http\Controllers\GetPlacePhotosController;
use App\Http\Controllers\GetWeatherForecastController;
use App\Http\Controllers\SearchPlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/search/places', SearchPlaceController::class);
Route::get('/places/details/{id}', GetPlaceDetailController::class);
Route::get('/places/photos', GetPlacePhotosController::class);

Route::get('/current/weather', GetCurrentWeatherController::class);
Route::get('/weather/forecast', GetWeatherForecastController::class);
