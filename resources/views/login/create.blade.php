<x-layout title="Login">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h1 class="card-title text-center">Laraflix</h1>
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" style="cursor: pointer" for="email">E-mail:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror "  name="email" id="email" value="{{old('email')}}"
                       required autocomplete="email" />
                @error('email')
                    <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label class="form-label" style="cursor: pointer" for="password">Senha:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                       required autocomplete="current-password" />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('register.create') }}" class="btn btn-secondary">Registrar</a>
            </div>
        </form>
    </div>
</x-layout>
