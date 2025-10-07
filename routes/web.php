<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtsController;

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
    } elseif ($user->role === 'uts') {
        return redirect()->route('uts.dashboard');
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

    // route lama lo
    Route::get('/produk', [ProductController::class, 'produkk'])->name('produk');

    // tambahin ini buat parameter angka
    Route::get('/produk/{angka}', [ProductController::class, 'produk'])->name('produk.angka');
});


Route::middleware(['auth', 'role:uts'])->group(function () {

    // Dashboard utama UTS
    Route::get('/uts/dashboard', [UtsController::class, 'index'])->name('uts.dashboard');

    // Menu Pemrograman Web
    Route::get('/uts/pemrograman', function () {
        return view('uts.pemrograman');
    })->name('uts.pemrograman');

    // Menu Database
    Route::get('/uts/database', function () {
        return view('uts.database');
    })->name('uts.database');
});


// Auth routes bawaan Breeze
require __DIR__.'/auth.php';
