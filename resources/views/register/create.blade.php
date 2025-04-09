<x-layout title="Registrar">
    <form method="POST" action="{{ route('register.store') }}">
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px">
            <div class="form-group">
                <label for="" class="label-control" style="cursor: pointer">Nome do usuário: </label>
                <input type="text" name="" id="" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="email" class="label-control" style="cursor: pointer">E-mail: </label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="password" class="label-control" style="cursor: pointer">Nome do usuário: </label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </div>
    </form>
</x-layout>
