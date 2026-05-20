<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RawgApiService; 

class SiteController extends Controller
{
    protected $rawgApi;

    // Injetando o serviço no Controller
    public function __construct(RawgApiService $rawgApi)
    {
        $this->rawgApi = $rawgApi;
    }

    public function index()
    {
        // Pede os dados processados para o Service
        $jogos = $this->rawgApi->buscarJogosDestaque();

        // Entrega os dados prontos para a View renderizar o HTML
        return view('home', compact('jogos'));
    }
}