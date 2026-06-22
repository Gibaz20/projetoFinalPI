@extends('layouts.app')

@section('titulo', 'PixelScore - O seu catálogo de jogos')

@section('conteudo')
<div class="container mx-auto px-4 py-10 space-y-16">

    <section>
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-black border-l-4 border-indigo-500 pl-4 text-white">Jogos em Destaque</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @if(!empty($jogos))
                @foreach($jogos as $jogo)
                <article class="bg-slate-800 rounded-2xl overflow-hidden shadow-lg border border-slate-700 hover:border-indigo-500 transition group flex flex-col justify-between">

                    <a href="{{ route('site.detalhes', $jogo['id']) }}" class="block flex-grow hover:opacity-80 transition">
                        <div class="h-64 relative overflow-hidden bg-slate-700">
                            <img src="{{ $jogo['background_image'] ?? '' }}" alt="Capa" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 pb-2">
                            <h3 class="text-xl font-bold text-white mb-2 line-clamp-2">{{ $jogo['name'] }}</h3>
                        </div>
                    </a>

                    <div class="p-5 pt-0 mt-auto">
                        <button onclick="adicionarAosFavoritos({{ $jogo['id'] }}, '{{ addslashes($jogo['name']) }}', '{{ $jogo['background_image'] ?? '' }}', this)" class="w-full bg-slate-700 hover:bg-indigo-600 text-white font-medium py-2 rounded-xl transition flex items-center justify-center gap-2">
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

</div>

<script>
function adicionarAosFavoritos(apiId, nome, imagem, botao) {
    let dados = JSON.stringify({
        api_id: apiId,
        nome: nome,
        imagem_capa: imagem
    });

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/favoritos/adicionar', true);

    // o token CSRF agora vem da <meta> que está no layout
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200 || xhr.status === 201) {
                botao.classList.remove('bg-slate-700');
                botao.classList.add('bg-rose-600');
                botao.querySelector('span').innerText = 'Na Lista!';
            } else if (xhr.status === 401) {
                alert("Você precisa fazer login para adicionar aos favoritos!");
            }
        }
    };

    xhr.send(dados);
}
</script>
@endsection