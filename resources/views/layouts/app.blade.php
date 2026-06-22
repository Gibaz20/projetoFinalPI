<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- token CSRF usado pelo AJAX dos favoritos --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo', 'PixelScore')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased min-h-screen flex flex-col">

    {{-- navbar reaproveitada em todas as páginas que usam este layout --}}
    <x-navbar />

    <main class="flex-grow">
        {{-- cada página injeta o conteúdo dela aqui --}}
        @yield('conteudo')
    </main>

</body>
</html>