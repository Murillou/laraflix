<x-layout title="Favoritos">
    <div>
        @foreach($favorites as $movie)
            <div>
                {{ $movie->name }}
            </div>
        @endforeach
    </div>
</x-layout>
