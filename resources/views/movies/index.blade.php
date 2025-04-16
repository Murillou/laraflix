<x-layout title="Filmes">
    @if(count($movies) > 0)
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card mb-4">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                             class="card-img-top movie-card-img"
                             alt="{{ $movie['title'] }}"
                             loading="lazy"/>

                        <div class="card-body movie-card-body">
                            <h2 class="card-title movie-card-title"> {{ $movie['title'] }} </h2>
                            <p class="card-text movie-card-text"> Lançamento: {{ \Carbon\Carbon::parse($movie['release_date'])->format('d/m/Y') }} </p>
                            <p class="card-text movie-card-text"> Avaliação: {{ $movie['vote_average'] }} </p>
                            <p class="card-text movie-card-overview"> {{ Str::limit($movie['overview'], 100) }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $movies->links() }}
            </div>
        </div>
    @else
        <p>Não há filmes disponíveis no momento!</p>
    @endif
</x-layout>
