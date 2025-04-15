<x-layout title="Filmes">
    @if(count($movies) > 0)
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"  class="card-img-top" alt="{{ $movie['title'] }}"/>
                        <div class="card-body">
                            <h1 class="card-title">{{ $movie['title'] }}</h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Não há filmes disponíveis no momento!</p>
    @endif

</x-layout>
