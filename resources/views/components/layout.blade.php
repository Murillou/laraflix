<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - Laraflix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @auth
        <nav class="container-fluid d-flex justify-content-between navbar-text text">
            <a>Home</a>
            <form method="POST" action="{{ route('login.logout') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Logout</button>
            </form>
        </nav>
    @endauth

    <main class="container flex-column d-flex justify-content-center align-items-center vh-100 ">
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
