
<nav class="bg-slate-800 border-b border-slate-700 sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex flex-wrap items-center justify-between gap-4">

        <a href="{{ route('site.home') }}" class="flex items-center gap-2 group">
            <div class="bg-indigo-600 text-white p-2 rounded-lg group-hover:bg-indigo-500 transition shadow-lg shadow-indigo-500/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
            </div>
            <span class="text-2xl font-black tracking-wider uppercase text-white">Pixel<span class="text-indigo-500">Score</span></span>
        </a>

        <div class="flex items-center gap-6">

            <a href="{{ route('favoritos.index') }}" class="flex items-center gap-2 text-slate-300 hover:text-rose-500 transition font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                <span class="hidden sm:inline">Quero Jogar</span>
            </a>

            @guest
                <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-6 rounded-full transition shadow-lg shadow-indigo-500/30">
                    Entrar
                </a>
            @endguest

            @auth
                <div class="flex items-center gap-4">
                    <span class="text-emerald-400 font-bold hidden sm:inline">Olá, {{ Auth::user()->name }}</span>

                   
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-400 hover:text-rose-500 text-sm font-medium transition">
                            Sair
                        </button>
                    </form>
                </div>
            @endauth

        </div>
    </div>
</nav>