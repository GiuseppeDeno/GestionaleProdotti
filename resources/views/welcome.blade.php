<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark mb-0">
                Benvenuto su {{ config('app.name') }}
            </h2>

            <div>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Registrati</a>
                    @endif
                @endguest
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <!-- Numero prodotti -->
            <div class="mb-4">
                <h5 class="text-secondary">Totale Prodotti: <span class="fw-bold">{{ $productsCount }}</span></h5>
            </div>

            <!-- Lista prodotti in cards -->
            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                @if($product->description)
                                    <p class="card-text text-muted">{{ Str::limit($product->description, 80) }}</p>
                                @endif
                                <p class="fw-bold text-success">€{{ number_format($product->price, 2, ',', '.') }}</p>
                                <span class="badge {{ $product->stock > 10 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->stock }} disponibili
                                </span>
                            </div>
                            @auth
                            <div class="card-footer">
                                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-info">Visualizza</a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning">Modifica</a>
                            </div>
                            @endauth
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h5 class="text-muted">Non ci sono prodotti disponibili.</h5>
                        @auth
                            <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">Crea il tuo primo prodotto</a>
                        @endauth
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
