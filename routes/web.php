<?php
//Néstor Naranjo Rodriguez
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});


Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/store', function () {
    return redirect()->route('product.create');
});

Route::get('/product/create', function () {
    return view('product');
})->name('product.create');

Route::get('/product/home', function () {
    return view('home');
})->name('product.home');