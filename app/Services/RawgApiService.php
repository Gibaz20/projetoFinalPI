<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RawgApiService
{
    public function buscarJogosDestaque()
    {
        
        $response = Http::timeout(5)->get('https://api.rawg.io/api/games', [
            'key' => env('RAWG_API_KEY','53d8dc542f93443caf8445a5414b4841'),
            'page_size' => 8,
            'ordering' => '-rating'
        ]);

        return $response->json()['results'] ?? [];
    }
}