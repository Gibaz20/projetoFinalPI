<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar {{ $jogo['name'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen">

    <nav class="bg-slate-800 border-b border-slate-700 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('site.home') }}" class="text-2xl font-black text-white">Pixel<span class="text-indigo-500">Score</span></a>
            
            <div class="flex items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="text-indigo-400 font-bold">Fazer Login</a>
                @endguest
                @auth
                    <span class="text-emerald-400 font-bold">Olá, {{ Auth::user()->name }}</span>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-10 max-w-2xl">
        
        <a href="{{ route('site.home') }}" class="text-slate-400 hover:text-indigo-400 mb-6 inline-block">
            ← Voltar para a vitrine
        </a>

        <div class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 mb-8">
            <div class="h-64 overflow-hidden bg-slate-700">
                <img src="{{ $jogo['background_image'] ?? '' }}" alt="Capa" class="w-full h-full object-cover">
            </div>
            <div class="p-6">
                <h1 class="text-3xl font-black text-white mb-2">{{ $jogo['name'] ?? 'Nome do Jogo' }}</h1>
                <p class="text-slate-400 text-sm">Lançado em: {{ !empty($jogo['released']) ? \Carbon\Carbon::parse($jogo['released'])->format('d/m/Y') : 'N/A' }}</p>
            </div>
        </div>

        <div class="bg-slate-800 p-6 rounded-2xl border border-slate-700">
            <h2 class="text-2xl font-bold text-white mb-6">Sua Avaliação</h2>

            @auth
                <form action="{{ route('avaliacao.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <input type="hidden" name="jogo_id" value="{{ $jogo['id'] }}">
                    <input type="hidden" name="nome_do_jogo" value="{{ $jogo['name'] }}">
                    <input type="hidden" name="capa_do_jogo" value="{{ $jogo['background_image'] ?? '' }}">

                    <div>
                        <label class="block font-bold mb-2">Nota (1 a 5):</label>
                        <select name="nota" class="w-full bg-slate-900 border border-slate-700 rounded-xl p-3 text-white" required>
                            <option value="">Selecione uma nota...</option>
                            <option value="5">5 - Excelente</option>
                            <option value="4">4 - Muito Bom</option>
                            <option value="3">3 - Bom</option>
                            <option value="2">2 - Ruim</option>
                            <option value="1">1 - Péssimo</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold mb-2">Comentário:</label>
                        <textarea name="comentario" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-xl p-3 text-white resize-none" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl mt-4">
                        Salvar Avaliação
                    </button>
                </form>
            @endauth

            @guest
                <div class="text-center py-6">
                    <p class="text-slate-400 mb-4">Apenas usuários logados podem avaliar.</p>
                    <a href="{{ route('login') }}" class="bg-indigo-600 px-6 py-2 rounded-xl text-white font-bold">Fazer Login agora</a>
                </div>
            @endguest
        </div>

    </main>
</body>
</html>