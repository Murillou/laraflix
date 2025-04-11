<x-layout title="Editar perfil">
    <form method="POST" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card p-4 shadow" style="width: 100%; max-width: 600px ">
            <div class="form-group d-flex flex-column">
                <label for="name" class="form-label">Nome do perfil:</label>
                <input type="text" id="name" name="name" value="{{ $profile->name }}" />
            </div>

            <div class="form-group d-flex flex-column mt-3">
                <label for="image_url" class="form-label">Imagem do perfil:</label>
                <input type="file" id="image_url" name="image_url" class="form-control" accept="image/png, image/jpeg, image/jpg"/>
            </div>

            @if ($profile->image_url)
                <div class="mt-3">Imagem atual:
                    <img src="{{ asset('storage/' . $profile->image_url) }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;" />
                </div>
            @endif

            <button type="submit" class="btn btn-primary w-100 mt-3">Salvar</button>
        </div>
    </form>

</x-layout>
