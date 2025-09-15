<?php

// Route::get('/', function () {
//     return redirect()->route('login');
// });

// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/mahasiswa', function () {
//     return "Dashboard Mahasiswa";
// });

// Route::get('/dosen', function () {
//     return "Dashboard Dosen";
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('dashboard', compact('user'));
})->middleware('auth')->name('dashboard');


// Hapus ini kalau nggak pakai Breeze/Fortify
// require __DIR__.'/auth.php';
