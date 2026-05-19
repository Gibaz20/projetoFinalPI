<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelScore - O seu catálogo de jogos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen flex flex-col">

    <nav class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex flex-wrap items-center justify-between gap-4">
            
            <a href="/" class="flex items-center gap-2 group">
                <div class="bg-indigo-600 text-white p-2 rounded-lg group-hover:bg-indigo-500 transition">
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
                    <span class="hidden sm:inline">Favoritos</span>
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
                <a href="#" class="text-indigo-400 hover:text-indigo-300 font-medium text-sm flex items-center gap-1">
                    Ver todos <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <article class="bg-slate-800 rounded-2xl overflow-hidden shadow-lg border border-slate-700 hover:border-indigo-500 transition group cursor-pointer">
                    <div class="h-64 bg-slate-700 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center text-slate-500 group-hover:scale-105 transition duration-500">
                            Capa do Jogo
                        </div>
                        <div class="absolute top-3 right-3 bg-emerald-500 text-white font-black text-sm px-3 py-1 rounded-lg shadow-md">
                            9.5
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-indigo-400 text-xs font-bold uppercase tracking-wider mb-1">Ação / RPG</p>
                        <h3 class="text-xl font-bold text-white mb-2 line-clamp-1">The Witcher 3: Wild Hunt</h3>
                        <p class="text-slate-400 text-sm mb-4">CD Projekt Red • 2015</p>
                        <button class="w-full bg-slate-700 hover:bg-indigo-600 text-white font-medium py-2 rounded-xl transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Adicionar à Lista
                        </button>
                    </div>
                </article>

                </div>
        </section>

        <section>
            <h2 class="text-3xl font-black border-l-4 border-emerald-500 pl-4 text-white mb-8">Estúdios em Alta</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                
                <a href="#" class="bg-slate-800 hover:bg-slate-700 border border-slate-700 hover:border-emerald-500 p-6 rounded-2xl text-center transition group">
                    <div class="w-20 h-20 mx-auto bg-slate-900 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition shadow-inner">
                        <span class="text-slate-500 font-bold text-xs">LOGO</span>
                    </div>
                    <h3 class="font-bold text-white mb-1">Naughty Dog</h3>
                    <p class="text-xs text-slate-400">12 Jogos Catalogados</p>
                </a>

                 </div>
        </section>

    </main>

</body>
</html>