<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Przekierowywanie do galerii
Route::get('/galeria', function () {
    return view('gallery');
})->name('gallery');

Route::get('/ogloszenia', function () {
    return view('news');
})->name('news');

// Przekierowywanie do kontaktów
Route::get('/kontakt', function () {
    return view('contact');
})->name('contact');

// Grupa komponentów usług
Route::prefix('uslugi')->group(function () {

    // Przekierowywanie do szczepień
    Route::get('/szczepienie', function () {
        return view('services.vaccination');
    })->name('uslugi.szczepienie');

    // Przekierowywanie do rehabilitacji
    Route::get('/rehabilitacja', function () {
        return view('services.rehabilitation');
    })->name('uslugi.rehabilitacja');
});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
