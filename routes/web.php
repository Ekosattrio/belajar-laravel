<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


// Setelah login, arahkan sesuai role
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'owner') {
        return redirect()->route('owner.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth')->name('dashboard');

// Dashboard masing-masing role
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', function () {
    $user = auth()->user(); 
    return view('user.dashboard', compact('user')); 
})->name('user.dashboard');

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    $user = auth()->user();
    return view('admin.dashboard', compact('user'));
})->name('admin.dashboard');

Route::middleware(['auth', 'role:owner'])->get('/owner/dashboard', function () {
    $user = auth()->user();
    return view('owner.dashboard', compact('user'));
})->name('owner.dashboard');

// Route Products hanya untuk admin & owner
Route::middleware(['auth', 'role:admin,owner'])->group(function () {
    Route::get('/products', [ProductController::class, 'form'])->name('products.form');
    Route::post('/products/process', [ProductController::class, 'process'])->name('products.process');
});
Route::middleware(['auth', 'role:admin,owner'])->group(function () {
    Route::get('/products', [ProductController::class, 'form'])->name('products.form');
    Route::post('/products/process', [ProductController::class, 'process'])->name('products.process');
    Route::get('/barang', [ProductController::class, 'barang'])->name('barang');
    Route::get('/produk', [ProductController::class, 'produkk'])->name('produk');

});

// Auth routes bawaan Breeze
require __DIR__.'/auth.php';
