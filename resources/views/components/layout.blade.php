<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - Laraflix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="container-fluid d-flex justify-content-between navbar-text text">
        <a>Home</a>
        <a href="{{ route('login.logout') }}">Logout</a>
    </nav>

    <main class="container d-flex justify-content-center align-items-center vh-100 ">
        {{$slot}}
    </main>
</body>
</html>
