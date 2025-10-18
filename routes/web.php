<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UtsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Setelah login
Route::get('/dashboard', function () {
    $user = auth()->user();

    return match ($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'owner' => redirect()->route('owner.dashboard'),
        'uts' => redirect()->route('uts.dashboard'),
        default => redirect()->route('user.dashboard'),
    };
})->middleware('auth')->name('dashboard');

// ===== Dashboard Role =====
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', fn() =>
    view('user.dashboard', ['user' => auth()->user()])
)->name('user.dashboard');

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', fn() =>
    view('admin.dashboard', ['user' => auth()->user()])
)->name('admin.dashboard');

Route::middleware(['auth', 'role:owner'])->get('/owner/dashboard', fn() =>
    view('owner.dashboard', ['user' => auth()->user()])
)->name('owner.dashboard');

// ===== Products (Admin & Owner) =====
Route::middleware(['auth', 'role:admin,owner'])->group(function () {
    // === Produk Umum ===
    Route::get('/products', [ProductController::class, 'form'])->name('products.form');
    Route::post('/products/process', [ProductController::class, 'process'])->name('products.process');

    Route::get('/barang', [ProductController::class, 'barang'])->name('barang');
    Route::get('/produk', [ProductController::class, 'produkk'])->name('produk');
    Route::get('/produk/{angka}', [ProductController::class, 'produk'])
        ->where('angka', '[0-9]+')
        ->name('produk.angka');

    // === Master Product ===
    Route::prefix('master/product')->name('master.product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });
});

// ===== UTS =====
Route::middleware(['auth', 'role:uts'])->group(function () {
    Route::get('/uts/dashboard', [UtsController::class, 'index'])->name('uts.dashboard');
    Route::get('/uts/pemrograman', fn() => view('uts.pemrograman'))->name('uts.pemrograman');
    Route::get('/uts/database', fn() => view('uts.database'))->name('uts.database');
});

// Auth routes bawaan Breeze
require __DIR__.'/auth.php';
