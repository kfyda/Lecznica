<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/galeria', function () {
    return view('gallery');
})->name('gallery');

Route::get('/kontakt', function () {
    return view('contact');
})->name('contact');

Route::prefix('uslugi')->group(function () {
    Route::get('/szczepienie', function () {
        return view('services.vaccination');
    })->name('uslugi.szczepienie');

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
