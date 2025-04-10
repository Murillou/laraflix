<x-layout title="Novo perfil">
    <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card p-4 shadow" style="width: 100%; max-width: 600px ">
            <div class="form-group d-flex flex-column">
                <label for="name" class="form-label">Nome do perfil:</label>
                <input type="text" id="name" name="name" />
            </div>

            <div class="form-group d-flex flex-column mt-3">
                <label for="image_url" class="form-label">Imagem do perfil:</label>
                <input type="file" id="image_url" name="image_url" class="form-control" accept="image/png, image/jpeg, image/jpg"/>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Salvar</button>
        </div>
    </form>
</x-layout>
