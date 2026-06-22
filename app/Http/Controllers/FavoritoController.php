<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    // Salva o favorito nos bastidores via AJAX
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['erro' => 'Não autorizado'], 401);
        }

        $jogo = Jogo::where('api_id', $request->api_id)->first();
        
        if ($jogo == null) {
            $jogo = Jogo::create([
                'api_id' => $request->api_id,
                'nome' => $request->nome,
                'imagem_capa' => $request->imagem_capa
            ]);
        }

        $jaFavoritou = Favorito::where('user_id', Auth::id())
                               ->where('jogo_id', $jogo->id)
                               ->first();

        if ($jaFavoritou == null) {
            Favorito::create([
                'user_id' => Auth::id(),
                'jogo_id' => $jogo->id
            ]);
        }

        return response()->json(['sucesso' => true], 200);
    }

    // Puxa os favoritos do banco e abre a página visual da lista
    public function index()
    {
        // Pega apenas as linhas da tabela onde o user_id é o ID do usuário logado
        $meusFavoritos = Favorito::where('user_id', Auth::id())->get();

        // Envia a lista para a nova tela que vamos criar
        return view('favoritos', compact('meusFavoritos'));
    }

    // Remove o jogo da lista
    public function destroy($id)
    {
        // Busca a linha exata do banco garantindo que o favorito é do usuário logado
        $favorito = Favorito::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->first();

        // Se encontrou, deleta
        if ($favorito != null) {
            $favorito->delete();
        }

        // Devolve para a mesma página com um aviso de sucesso
        return back()->with('sucesso', 'Jogo removido da sua lista!');
    }
}