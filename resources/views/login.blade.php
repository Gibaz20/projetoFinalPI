<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar - PixelScore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-slate-800 p-8 rounded-3xl border border-slate-700 shadow-2xl">
        
        <div class="flex justify-center mb-8">
            <a href="{{ route('site.home') }}" class="flex items-center gap-2 group">
                <div class="bg-indigo-600 text-white p-2 rounded-lg shadow-lg shadow-indigo-500/30">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                </div>
                <span class="text-3xl font-black tracking-wider uppercase text-white">Pixel<span class="text-indigo-500">Score</span></span>
            </a>
        </div>

        <h2 class="text-2xl font-bold text-center text-white mb-6">Acesse sua conta</h2>

        @if ($errors->any())
            <div class="bg-rose-900/50 border border-rose-500 text-rose-200 text-sm p-4 rounded-xl mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-bold text-slate-300 mb-2">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full bg-slate-900 border border-slate-700 text-slate-200 rounded-xl p-3 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-inner">
            </div>

            <div>
                <label for="password" class="block text-sm font-bold text-slate-300 mb-2">Senha</label>
                <input type="password" id="password" name="password" required
                       class="w-full bg-slate-900 border border-slate-700 text-slate-200 rounded-xl p-3 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-inner">
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-indigo-500/30 mt-2">
                Entrar
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('site.home') }}" class="text-slate-400 hover:text-indigo-400 transition text-sm">
                ← Voltar para a página inicial
            </a>
        </div>

    </div>

</body>
</html>