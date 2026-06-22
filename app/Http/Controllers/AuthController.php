<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //  Apenas mostra a página HTML com o formulário
    public function create()
    {
        return view('login');
    }

    // Função 2: Recebe os dados do formulário e tenta logar o usuário
    public function store(Request $request)
    {
        // Valida se o usuário preencheu os campos 
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // O Auth::attempt vai no banco de dados sozinho e confere se o email e a senha batem
        if (Auth::attempt($credenciais)) {
            // Se der certo, recria a sessão por segurança e manda para a Home
            $request->session()->regenerate();
            return redirect()->route('site.home');
        }

        // Se a senha estiver errada, devolve para a tela de login com erro
        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ]);
    }
}