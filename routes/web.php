<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;


Route::get('/', [BeritaController::class, 'welcome']); // Menggunakan method welcome dari BeritaController

Route::get('/dashboard', function () {
    $berita = \App\Models\Berita::all();
    return view('dashboard', compact('berita'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('auth')->resource('berita', BeritaController::class);
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('berita', BeritaController::class);


require __DIR__.'/auth.php';
