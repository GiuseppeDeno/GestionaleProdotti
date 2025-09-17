<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark mb-0">
                Gestione Prodotti
            </h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                Nuovo Prodotto
            </a>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    @if($products->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Prezzo</th>
                                        <th>Stock</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="fw-medium">{{ $product->name }}</div>
                                            @if($product->description)
                                                <small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                            @endif
                                        </td>
                                        <td class="fw-bold text-success">
                                            €{{ number_format($product->price, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $product->stock > 10 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-info">Visualizza</a>
                                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning">Modifica</a>
                                                <form method="POST" action="{{ route('products.destroy', $product) }}" 
                                                      class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare questo prodotto?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Elimina</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <h5 class="text-muted">Nessun prodotto trovato.</h5>
                            <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">
                                Crea il tuo primo prodotto
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>