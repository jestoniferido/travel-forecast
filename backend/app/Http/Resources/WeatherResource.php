<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'cod' => $this->cod,
            'coord' => $this->coord,
            'dt' => $this->dt,
            'main' => $this->main,
            'sys' => $this->sys,
            'timezone' => $this->timezone,
            'visibility' => $this->visibility,
            'weather' => $this->weather,
            'wind' => $this->wind,
        ];
    }
}
