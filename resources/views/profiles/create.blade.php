<x-layout title="Novo perfil">
    <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card p-4 shadow form-profile-create-card">
            <div class="form-group d-flex flex-column">
                <label for="name" class="form-label label-input">Nome do perfil:</label>
                <input type="text" id="name" name="name"  class="form-control @error('name') is-invalid @enderror"/>
                @error('name')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group d-flex flex-column mt-3">
                <label for="image_url" class="form-label label-input">Imagem do perfil:</label>
                <input type="file" id="image_url" name="image_url" class="form-control" accept="image/png, image/jpeg, image/jpg"/>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Salvar</button>
        </div>
    </form>
</x-layout>
