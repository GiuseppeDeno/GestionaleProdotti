<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark mb-0">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row g-4">
                        <!-- Card Prodotti -->
                        <div class="col-md-4">
                            <div class="card bg-primary bg-opacity-10 border-primary">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Gestione Prodotti</h5>
                                    <p class="card-text text-primary-emphasis">Crea, modifica e gestisci il tuo inventario</p>
                                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                                        Vai ai Prodotti
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Statistiche -->
                        <div class="col-md-4">
                            <div class="card bg-success bg-opacity-10 border-success">
                                <div class="card-body">
                                    <h5 class="card-title text-success">Statistiche</h5>
                                    <p class="card-text text-success-emphasis">Visualizza le statistiche del tuo inventario</p>
                                    <p class="display-6 fw-bold text-success mb-0">
                                        {{ \App\Models\Product::count() }} Prodotti
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Azioni rapide -->
                        <div class="col-md-4">
                            <div class="card bg-warning bg-opacity-10 border-warning">
                                <div class="card-body">
                                    <h5 class="card-title text-warning-emphasis">Azioni Rapide</h5>
                                    <p class="card-text text-warning-emphasis">Accedi rapidamente alle funzioni principali</p>
                                    <a href="{{ route('products.create') }}" class="btn btn-warning">
                                        Nuovo Prodotto
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>