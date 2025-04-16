<?php

namespace App\Services;


use Illuminate\Support\Facades\Http;

class TmdbService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
        $this->baseUrl = env('TMDB_BASE_URL');
    }

    public function searchMovies($query)
    {

    }

    public function getMovies($page = 1)
    {
        $response = Http::get("{$this->baseUrl}movie/popular", [
            'api_key' => $this->apiKey,
            'language' => 'pt-BR',
            'page' => $page,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
