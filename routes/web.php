<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Models\Product;

//senza usare HomeController
Route::get('/', function () {
    $products = Product::latest()->take(6)->get(); 
    $productsCount = Product::count();
    return view('welcome', compact('products', 'productsCount'));
});

// Rotta dashboard protetta
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Profile route (non serve)
/* Route::get('/profile', function () {
    return view('profile.show');
})->middleware('auth')->name('profile.show'); */


// Rotte protette per i prodotti

Route::middleware('auth')->group(function () {
  
    // CRUD 
    Route::resource('products', ProductController::class);
});
/* 
GET	  /products	                  index	    products.index
GET	  /products/create	          create	products.create
POST  /products	                   store	products.store
GET	  /products/{product}	       show	    products.show
GET	  /products/{product}/edit	  edit	    products.edit
PUT/PATCH	/products/{product}	  update	products.update
DELETE	/products/{product}	      destroy	products.destroy */