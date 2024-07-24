<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProsesCheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "web". Buatlah sesuatu yang hebat!
|
*/


Route::get('/', function () {
    return view('home');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');
Route::get('/products/search', [ProductController::class, 'search_product'])->name('search_products');
Route::get('/product{product}', [ProductController::class, 'show_product'])->name('show_product'); // Tampilkan detail produk

Route::middleware(['admin'])->group(function () {
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product'); // Halaman pembuatan produk baru
    Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product'); // Proses pembuatan produk baru
    Route::get('/product{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product'); // Halaman edit produk
    Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product'); // Proses update produk
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product'); // Proses hapus produk
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/product{product}', [ProductController::class, 'show_product'])->name('show_product'); // Tampilkan detail produk
    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart'); // Tambahkan produk ke cart
    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart'); // Tampilkan cart
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart'); // Update cart
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart'); // Hapus item dari cart

    Route::post('/prosescheckout', [OrderController::class, 'prosescheckout'])->name('prosescheckout'); // Proses checkout
    Route::get('/order/nota{order}', [OrderController::class, 'NotaTransaksi'])->name('nota'); // menampilkan nota
    Route::get('/order', [OrderController::class, 'index_order'])->name('index_order'); // Tampilkan semua pesanan
    Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order'); // Tampilkan detail pesanan
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt'); // Submit bukti pembayaran
    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment'); // Konfirmasi pembayaran pesanan

    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile'); // Tampilkan profil pengguna
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile'); // Edit profil pengguna
});



Auth::routes();
Route::get('/product{product}', [ProductController::class, 'show_product'])->name('show_product'); // Tampilkan detail produk


