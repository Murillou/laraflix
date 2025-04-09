<x-layout title="Login">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h1 class="card-title text-center">Laraflix</h1>
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label class="form-label" style="cursor: pointer" for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>

            <div class="form-group mt-3">
                <label class="form-label" style="cursor: pointer" for="password">Senha:</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="" class="btn btn-secondary">Registrar</a>
            </div>
        </form>
    </div>
</x-layout>
