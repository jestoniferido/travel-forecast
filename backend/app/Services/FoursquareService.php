<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FoursquareService
{
    protected $baseUrl;

    protected $authorization;

    protected $client;

    public function __construct()
    {
        $this->baseUrl = config('services.foursquare.base_url');
        $this->authorization = config('services.foursquare.authorization');

        $this->client = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => $this->authorization,
        ]);
    }

    public function searchPlace($location, $limit = 10, $openNow = 'true', $sort = 'POPULARITY')
    {
        $response = $this->client->get($this->baseUrl.'/places/search', [
            'near' => $location,
            'open_now' => $openNow,
            'sort' => $sort,
            'limit' => $limit,
        ]);

        if ($response->successful()) {
            return $response->object()->results;
        }

        return [];
    }

    public function getPlaceDetails($id)
    {
        $response = $this->client->get($this->baseUrl.'/places/'.$id);

        if ($response->successful()) {
            return $response->object();
        }

        return [];
    }

    public function getPlacePhotos($id, $limit = 10, $sort = 'POPULAR')
    {
        $response = $this->client->get($this->baseUrl.'/places/'.$id.'/photos', [
            'sort' => $sort,
            'limit' => $limit,
        ]);

        if ($response->successful()) {
            return $response->object();
        }

        return [];
    }
}
