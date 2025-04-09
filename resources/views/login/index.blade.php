<x-layout title="Login">
    <form method="post" class="d-flex flex-column justify-content-center">
        @csrf
        <div class="form-group">
            <label class="form-label" for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email" />
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Senha:</label>
            <input type="password" class="form-control" name="password" id="password" />
        </div>

        <button class="btn btn-primary mt-3">Login</button>
    </form>
</x-layout>
