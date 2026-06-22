<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Auth;

class AvaliacaoController extends Controller
{
    public function store(Request $request)
    {
        // Validação básica
        $request->validate([
            'jogo_id' => 'required',
            'nome_do_jogo' => 'required',
            'nota' => 'required|numeric|min:1|max:5',
            'comentario' => 'required'
        ]);

        // Tenta achar o jogo no nosso banco de dados
        $jogo = Jogo::where('api_id', $request->jogo_id)->first();

        //  Se o jogo for nulo (não existe no banco), cria ele agora
        if ($jogo == null) {
            $jogo = Jogo::create([
                'api_id' => $request->jogo_id,
                'nome' => $request->nome_do_jogo,
                'imagem_capa' => $request->capa_do_jogo
            ]);
        }

        // Salva a avaliação ligando ao usuário logado e ao jogo
        Avaliacao::create([
            'user_id' => Auth::id(),
            'jogo_id' => $jogo->id,
            'nota' => $request->nota,
            'comentario' => $request->comentario
        ]);

        //  Manda o usuário de volta para a tela inicial (Home) com mensagem
        return redirect()->route('site.home')->with('sucesso', 'Sua avaliação foi salva com sucesso!');
    }
}