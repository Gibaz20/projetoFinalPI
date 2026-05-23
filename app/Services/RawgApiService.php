<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RawgApiService
{
    public function buscarJogosDestaque()
{
    $response = Http::timeout(5)->get('https://api.rawg.io/api/games', [
        'key' => env('RAWG_API_KEY', "53d8dc542f93443caf8445a5414b4841"),
        'page_size' => 8,
        // Traz apenas jogos lançados entre o início do ano passado e o final deste ano
        'dates' => '2025-01-01,2026-12-31', 
        // Filtra por gêneros específicos (ex: rpg e ação)
        'genres' => 'role-playing-games,action,', 
        // Ordena pelos mais populares/adicionados pelos usuários recentemente
        'ordering' => '-added' 
    ]);

    return $response->json()['results'] ?? [];
}
}