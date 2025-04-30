<x-layout title="{{ $movie['title'] }}">
    @if ($movie)
        <div class="d-flex flex-column flex-md-row movie-detail gap-md-5">
            <div>
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-auto rounded"/>
            </div>

            <div class="d-flex flex-column gap-md-2 text-center text-md-start mt-3">
                <h1>{{ $movie['title'] }}</h1>
                <p>{{ $movie['overview'] }}</p>
                <p><strong>Lançamento:</strong> {{ \Carbon\Carbon::parse($movie['release_date'])->format('d/m/Y') }}</p>
                <p><strong>Avaliação:</strong> {{ $movie['vote_average'] }}</p>

                <form method="POST" action="{{ route('movies.favorites', ['profile' => $profile->id, 'movieId' => $movie['id']]) }}">
                    @csrf
                    <button type="submit" class="btn btn-success p-2">
                        Adicionar aos Favoritos
                    </button>
                </form>
            </div>
        </div>

    @else
        <h1>Filme não encontrado!</h1>
    @endif
</x-layout>
