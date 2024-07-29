<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->fsq_id,
            'name' => $this->name,
            'categories' => $this->categories,
            'location' => $this->location,
            'geocodes' => $this->geocodes,
            'timezone' => $this->timezone,
            'photos' => [],
            'forcast' => null,
        ];
    }
}
