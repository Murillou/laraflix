<x-layout title="{{ $movie['title'] }}">
    @if ($movie)
        <div class="movie-detail" style="display: flex; align-items: flex-start; gap: 2rem; padding: 2rem;">

            <div style="flex: 1; max-width: 400px;">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" style="width: 100%; border-radius: 10px;" />
            </div>

            <div style="flex: 2;">
                <h1 style="margin-bottom: 1rem;">{{ $movie['title'] }}</h1>
                <p style="margin-bottom: 1rem;">{{ $movie['overview'] }}</p>
                <p style="margin-bottom: 0.5rem;"><strong>Lançamento:</strong> {{ \Carbon\Carbon::parse($movie['release_date'])->format('d/m/Y') }}</p>
                <p style="margin-bottom: 1.5rem;"><strong>Avaliação:</strong> {{ $movie['vote_average'] }}</p>

                <form method="POST">
                    @csrf
                    <button type="submit" style="background-color: #ff6347; color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 5px; font-size: 1rem; cursor: pointer;">
                        Adicionar aos Favoritos
                    </button>
                </form>
            </div>

        </div>
    @else
        <h1>Filme não encontrado!</h1>
    @endif
</x-layout>
