<x-guest-layout>
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Accedi</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                           class="form-control @error('email') is-invalid @enderror" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" 
                           class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label class="form-check-label" for="remember">Ricordami</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="text-decoration-none">Non hai un account? Registrati</a>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center mt-2">
                    <a href="{{ route('password.request') }}" class="text-decoration-none small">
                        Password dimenticata?
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>