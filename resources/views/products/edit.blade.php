<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark mb-0">
            Modifica Prodotto: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('products.update', $product) }}">
                                @csrf
                                @method('PUT')
                                
                                <!-- Nome -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome Prodotto *</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" 
                                           class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Descrizione -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Descrizione</label>
                                    <textarea name="description" id="description" rows="3"
                                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Prezzo -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">Prezzo (€) *</label>
                                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" 
                                           step="0.01" min="0"
                                           class="form-control @error('price') is-invalid @enderror" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Stock -->
                                <div class="mb-4">
                                    <label for="stock" class="form-label">Quantità in Stock *</label>
                                    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" 
                                           min="0"
                                           class="form-control @error('stock') is-invalid @enderror" required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pulsanti -->
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                        Annulla
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        Aggiorna Prodotto
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>