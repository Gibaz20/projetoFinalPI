<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Apenas mostra a página HTML com o formulário
    public function create()
    {
        return view('login');
    }

    // Recebe os dados do formulário e tenta logar o usuário
    public function store(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->route('site.home');
        }

        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ]);
    }

    // NOVO: faz o logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();                         // desconecta o usuário
        $request->session()->invalidate();      // apaga os dados da sessão atual
        $request->session()->regenerateToken(); // gera um novo token CSRF (segurança)

        return redirect()->route('site.home');  // volta para a home como visitante
    }
}