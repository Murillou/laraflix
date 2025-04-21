<x-layout title="{{ $movie['title']}}">
    @if ($movie)
        <div class="movie-detail">
            <h1>{{ $movie['title'] }}</h1>
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" />
            <p>{{ $movie['overview'] }}</p>
            <p><strong>Lançamento:</strong> {{ \Carbon\Carbon::parse($movie['release_date'])->format('d/m/Y') }}</p>
            <p><strong>Avaliação:</strong> {{ $movie['vote_average'] }}</p>
        </div>
    @else
        <h1> Filme não encontrado! </h1>
    @endif

</x-layout>
