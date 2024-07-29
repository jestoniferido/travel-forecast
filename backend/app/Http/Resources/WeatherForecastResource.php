<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherForecastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date_time' => $this->dt_txt,
            'main' => $this->main,
            'weather' => $this->weather,
            'clouds' => $this->clouds,
            'wind' => $this->wind,
            'visibility' => $this->visibility,
        ];
    }
}
