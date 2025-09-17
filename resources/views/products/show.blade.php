<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark mb-0">
                {{ $product->name }}
            </h2>
            <div>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning me-2">
                    Modifica
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Torna alla Lista
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-12">
                                    <h5 class="card-title">Nome Prodotto</h5>
                                    <p class="card-text text-muted">{{ $product->name }}</p>
                                </div>

                                @if($product->description)
                                <div class="col-12">
                                    <h5 class="card-title">Descrizione</h5>
                                    <p class="card-text text-muted">{{ $product->description }}</p>
                                </div>
                                @endif

                                <div class="col-md-6">
                                    <h5 class="card-title">Prezzo</h5>
                                    <p class="fs-4 fw-bold text-success mb-0">
                                        €{{ number_format($product->price, 2, ',', '.') }}
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="card-title">Stock Disponibile</h5>
                                    <p class="mb-0">
                                        <span class="badge fs-6 {{ $product->stock > 10 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->stock }} pezzi
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <small class="text-muted">
                                        <strong>Creato:</strong><br>
                                        {{ $product->created_at->format('d/m/Y H:i') }}
                                    </small>
                                </div>

                                <div class="col-md-6">
                                    <small class="text-muted">
                                        <strong>Ultima modifica:</strong><br>
                                        {{ $product->updated_at->format('d/m/Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>