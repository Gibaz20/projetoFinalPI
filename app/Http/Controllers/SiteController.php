<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    
    // FUNÇÃO DA PÁGINA INICIAL (Melhores jogos de 2025 e 2026)
    
    public function index()
    {
        $response = Http::timeout(5)->get('https://api.rawg.io/api/games', [
            'key' => '53d8dc542f93443caf8445a5414b4841', 
            'page_size' => 8,
            'ordering' => '-rating', 
            'dates' => '2025-01-01,2026-12-31' 
        ]);

        $jogos = $response->json()['results'] ?? [];

        return view('home', compact('jogos'));
    }

    
    // 2. FUNÇÃO DE DETALHES (Abre a tela de avaliação)
    
    public function detalhes($id)
    {
        $response = Http::timeout(5)->get("https://api.rawg.io/api/games/{$id}", [
            'key' => '53d8dc542f93443caf8445a5414b4841' 
        ]);

        $jogo = $response->json() ?? [];

        // Proteção: Se a API der qualquer instabilidade, devolve pra Home
        if (!isset($jogo['name'])) {
            return redirect()->route('site.home');
        }

        return view('detalhes', compact('jogo'));
    }
}