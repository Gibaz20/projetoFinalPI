<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoritoController;

Route::get('/', [SiteController::class, 'index'])->name('site.home');

// Rota protegida: Apenas usuários logados podem enviar avaliações
Route::post('/avaliar', [AvaliacaoController::class, 'store'])
    ->name('avaliacao.store')
    ->middleware('auth');

// Rotas de Autenticação
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.post');

// rota de logout (POST + protegida por login)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/jogo/{id}', [SiteController::class, 'detalhes'])->name('site.detalhes');

// Usada pelo JavaScript para salvar sem recarregar a página
Route::post('/api/favoritos/adicionar', [FavoritoController::class, 'store']);

// Usada pelo usuário para abrir a página de jogos salvos (protegida por login)
Route::get('/meus-favoritos', [FavoritoController::class, 'index'])
    ->name('favoritos.index')
    ->middleware('auth');

// Remove um jogo da lista (O 'Delete' do CRUD)
Route::delete('/meus-favoritos/{id}', [FavoritoController::class, 'destroy'])
    ->name('favoritos.destroy')
    ->middleware('auth');