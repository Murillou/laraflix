<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - Laraflix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
    @auth
        @if(Route::is('profiles.select'))
            <nav class="container-fluid d-flex justify-content-between navbar-text text">
                <a href="{{ route('profiles.select') }}" class="btn font-monospace text-warning">Perfis</a>
                <form method="POST" action="{{ route('login.logout') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn link-danger">Sair</button>
                </form>
            </nav>
        @elseif(Route::is('movies.show'))
            <nav class="container-fluid d-flex justify-content-between navbar-text text">
                <a href="{{ route('profiles.select') }}" class="btn font-monospace text-warning">Perfis</a>
                <div>
                    <a href="{{ url()->previous() }}" class="btn">Ver filmes</a>
                </div>
            </nav>
        @endif
    @endauth

    <main class="container flex-column d-flex justify-content-center align-items-center flex-grow-1 pt-4 ">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{$slot}}
    </main>
</body>
</html>
