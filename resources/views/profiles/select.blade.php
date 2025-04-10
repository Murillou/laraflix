<x-layout title="Perfis">
    <ul>
        @foreach($profiles as $profile)
            <li>{{ $profile->name  }}</li>
        @endforeach
    </ul>
    <div>
        <a href="{{ route('profiles.create') }}" type="button" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
           <span>+</span>
           <span>Novo perfil</span>
       </a>
    </div>
</x-layout>
