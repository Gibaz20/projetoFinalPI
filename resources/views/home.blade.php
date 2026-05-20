<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelScore - O seu catálogo de jogos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen flex flex-col">

    <nav class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex flex-wrap items-center justify-between gap-4">
            
            <a href="{{ route('site.home') }}" class="flex items-center gap-2 group">
                <div class="bg-indigo-600 text-white p-2 rounded-lg group-hover:bg-indigo-500 transition shadow-lg shadow-indigo-500/30">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                </div>
                <span class="text-2xl font-black tracking-wider uppercase text-white">Pixel<span class="text-indigo-500">Score</span></span>
            </a>

            <div class="flex-1 w-full md:w-auto md:max-w-xl order-3 md:order-2">
                <div class="relative">
                    <input type="search" placeholder="Buscar jogos, estúdios ou gêneros..." 
                           class="w-full bg-slate-900 border border-slate-700 text-slate-200 rounded-full pl-5 pr-12 py-3 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-inner">
                    <button class="absolute right-3 top-3 text-slate-400 hover:text-indigo-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-6 order-2 md:order-3">
                <a href="#" class="flex items-center gap-2 text-slate-300 hover:text-rose-500 transition font-medium">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <span class="hidden sm:inline">Quero Jogar</span>
                </a>
                
                <a href="#" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-6 rounded-full transition shadow-lg shadow-indigo-500/30">
                    Entrar
                </a>
            </div>

        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-10 space-y-16">

        <section>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-black border-l-4 border-indigo-500 pl-4 text-white">Jogos em Destaque</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @if(!empty($jogos))
                    @foreach($jogos as $jogo)
                    <article class="bg-slate-800 rounded-2xl overflow-hidden shadow-lg border border-slate-700 hover:border-indigo-500 transition group flex flex-col justify-between">
                        
                        <div>
                            <div class="h-64 relative overflow-hidden bg-slate-700">
                                @if(!empty($jogo['background_image']))
                                    <img src="{{ $jogo['background_image'] }}" alt="Capa de {{ $jogo['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                @endif
                                
                                <div class="absolute top-3 right-3 bg-emerald-500 text-white font-black text-sm px-3 py-1 rounded-lg shadow-md">
                                    {{ $jogo['rating'] ?? 'N/A' }}
                                </div>
                            </div>
                            
                            <div class="p-5">
                                <p class="text-indigo-400 text-xs font-bold uppercase tracking-wider mb-1">
                                    Lançamento: {{ !empty($jogo['released']) ? \Carbon\Carbon::parse($jogo['released'])->format('Y') : 'Data Indisponível' }}
                                </p>
                                
                                <h3 class="text-xl font-bold text-white mb-2 line-clamp-2" title="{{ $jogo['name'] }}">
                                    {{ $jogo['name'] }}
                                </h3>
                            </div>
                        </div>

                        <div class="p-5 pt-0 mt-auto">
                            <button onclick="adicionarAosFavoritos({{ $jogo['id'] }}, this)" class="w-full bg-slate-700 hover:bg-indigo-600 text-white font-medium py-2 rounded-xl transition flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 icon-heart" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                <span>Quero Jogar</span>
                            </button>
                        </div>
                    </article>
                    @endforeach
                @else
                    <div class="col-span-full p-8 text-center bg-slate-800 rounded-2xl border border-slate-700 text-slate-400">
                        Nenhum jogo encontrado. Verifique sua chave da RAWG API ou a conexão com a internet.
                    </div>
                @endif
                
            </div>
        </section>

    </main>

    <script>
        function adicionarAosFavoritos(jogoId, botao) {
            // Criação do objeto AJAX conforme PDF [cite: 144, 149]
            let xhr = new XMLHttpRequest();
            
            // Simulação de URL - Atualizaremos quando o ApiController for construído 
            let url = '/api/favoritos/adicionar/' + jogoId;
            
            // Abrindo conexão (POST para envio de dados, assíncrono = true) [cite: 150, 163]
            xhr.open('POST', url, true);
            
            // Configurações de cabeçalho para Laravel e JSON
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Listener que aguarda a resposta do servidor [cite: 208, 209]
            xhr.onreadystatechange = function() {
                // Só verifica se o servidor terminou de enviar a resposta [cite: 262]
                if(xhr.readyState === 4) {
                    // Resposta bem sucedida [cite: 263, 282]
                    if(xhr.status === 200 || xhr.status === 201) {
                        // Feedback visual (atualiza o botão sem piscar a tela)
                        botao.classList.remove('bg-slate-700');
                        botao.classList.add('bg-rose-600', 'hover:bg-rose-500');
                        botao.querySelector('span').innerText = 'Na Lista!';
                        botao.querySelector('svg').setAttribute('fill', 'currentColor');
                    } else {
                        // Exibe alerta de erro, idêntico à documentação base [cite: 238, 291]
                        alert("ATENÇÃO, status=" + xhr.status);
                    }
                }
            };
            
            // Envia a requisição [cite: 199, 211, 242]
            xhr.send(JSON.stringify({ id: jogoId }));
        }
    </script>
</body>
</html>