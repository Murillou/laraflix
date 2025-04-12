<x-layout title="Perfis">
    <div>
        <div class="d-flex gap-2 flex-wrap justify-content-center">
            @foreach($profiles as $profile)
                <div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ $profile->image_url ? asset('storage/' . $profile->image_url) : asset('images/default-profile.jpeg') }}"
                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;"/>
                        <span>{{ $profile->name  }}</span>
                    </div>

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

        <a href="{{ route('profiles.create') }}" type="button" class="btn btn-primary d-flex justify-content-center align-items-center gap-2 mt-3 mx-auto"
           style="width: 100%; max-width: 300px">
           <span>+</span>
           <span>Novo perfil</span>
       </a>
    </div>
</x-layout>
