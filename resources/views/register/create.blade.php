<x-layout title="Registrar">
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="card p-4 shadow" style="width: 100%; max-width: 400px">
            <div class="form-group">
                <label for="name" class="label-control" style="cursor: pointer">Nome do usuário: </label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="email" class="label-control" style="cursor: pointer">E-mail: </label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="password" class="label-control" style="cursor: pointer">Senha: </label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label" style="cursor: pointer;">Confirmar senha: </label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </div>
    </form>
</x-layout>
