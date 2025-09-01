<?php

use Illuminate\Support\Facades\Route;

// Halaman beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Profil mahasiswa
Route::get('/profil', function () {
    return view('profile');
})->name('profile');

// Grouping aktivitas
Route::prefix('aktivitas')->name('aktivitas.')->group(function () {

    // Daftar aktivitas
    Route::get('/', function () {
        $activities = ['Belajar', 'Olahraga', 'Organisasi'];
        return view('activities.index', compact('activities'));
    })->name('index');

    // Detail aktivitas (pakai parameter)
    Route::get('/{nama}', function ($nama) {
        return view('activities.show', ['nama' => $nama]);
    })->name('show');
});
// Route::get('/about', function () {
//     return view('about');
// })->name('about.page');

// Route::get('/contact', function () {
//     return view('contact');
// }) ->name('contact');

// Route::get('/pengguna/{id}', function ($id) {
//     return "halaman pengguna dengan id : " . $id;
// })->name('pengguna.page');


// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

//     Route::get('/profile', function () {
//         return view('admin.profile');
//     })->name('admin.profile');

//     Route::get('/settings', function () {
//         return view('admin.settings');
//     })->name('admin.settings');
// });