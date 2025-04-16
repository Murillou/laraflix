<x-layout title="Perfis">
    <div>
        <div class="d-flex gap-2 flex-wrap justify-content-center">
            @foreach($profiles as $profile)
                <div>
                    <a href="{{ route('movies.index', $profile->id) }}" class="d-flex flex-column justify-content-center align-items-center">
                        <img class="profile-image"
                             alt=""
                             src="{{ $profile->image_url ? asset('storage/' . $profile->image_url) : asset('images/default-profile.jpeg') }}"/>
                        <span>{{ $profile->name  }}</span>
                    </a>

                    <div class="d-flex gap-2 mt-2 justify-content-center">
                        <form method="POST" action="{{ route('profiles.destroy', $profile->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger d-flex align-items-center gap-1">
                                🗑️
                            </button>
                        </form>

                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-outline-primary d-flex align-items-center gap-1">
                            🖌️
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('profiles.create') }}" type="button" class="btn btn-primary d-flex justify-content-center align-items-center gap-2 mt-3 mx-auto new-profile-button">
           <span>+</span>
           <span>Novo perfil</span>
       </a>
    </div>
</x-layout>
