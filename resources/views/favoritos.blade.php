<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Lista - PixelScore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen">

    <nav class="bg-slate-800 border-b border-slate-700 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('site.home') }}" class="text-2xl font-black text-white">Pixel<span class="text-indigo-500">Score</span></a>
            <span class="text-emerald-400 font-bold">Olá, {{ Auth::user()->name }}</span>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-10">
        
        <div class="mb-6">
            <a href="{{ route('site.home') }}" class="text-slate-400 hover:text-indigo-400 transition inline-block">
                ← Voltar para a vitrine
            </a>
        </div>

        <h1 class="text-4xl font-black text-white mb-8 border-l-4 border-indigo-500 pl-3">Minha Lista (Quero Jogar)</h1>

        @if(session('sucesso'))
            <div class="bg-emerald-900/50 border border-emerald-500 text-emerald-200 p-4 rounded-xl mb-8 font-medium">
                {{ session('sucesso') }}
            </div>
        @endif

        @if($meusFavoritos->isEmpty())
            <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700 text-center">
                <p class="text-slate-400 text-lg">Você ainda não adicionou nenhum jogo à sua lista.</p>
                <a href="{{ route('site.home') }}" class="text-indigo-400 hover:underline mt-2 inline-block">Explorar jogos agora</a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($meusFavoritos as $item)
                    <div class="bg-slate-800 rounded-2xl overflow-hidden border border-slate-700 flex flex-col shadow-lg">
                        
                        <div class="h-48 bg-slate-700 overflow-hidden">
                            <img src="{{ $item->jogo->imagem_capa }}" alt="Capa" class="w-full h-full object-cover">
                        </div>

                        <div class="p-5 flex-grow flex flex-col justify-between">
                            <h3 class="text-lg font-bold text-white mb-4">{{ $item->jogo->nome }}</h3>
                            
                            <div class="flex gap-2 mt-auto">
                                <a href="{{ route('site.detalhes', $item->jogo->api_id) }}" class="flex-grow bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 rounded-xl text-center text-sm transition">
                                    Avaliar
                                </a>

                                <form action="{{ route('favoritos.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="bg-slate-700 hover:bg-rose-600 text-white font-bold py-2 px-4 rounded-xl text-sm transition flex items-center justify-center" title="Remover da Lista">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </main>