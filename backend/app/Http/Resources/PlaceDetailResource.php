<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->fsq_id,
            'categories' => $this->categories,
            'geocodes' => $this->geocodes,
            'location' => $this->location,
            'related_places' => $this->related_places,
            'name' => $this->name,
            'related_places' => property_exists($this->related_places, 'parent')
                ? ['parent' => collect($this->related_places->parent)->take(10)]
                : (property_exists($this->related_places, 'children') ? ['children' => collect($this->related_places->children)->take(10)] : []),
            'timezone' => $this->timezone,
        ];
    }
}
