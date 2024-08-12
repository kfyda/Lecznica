<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Przekierowywanie do galerii
Route::get('/galeria', [GalleryController::class, 'index'])->name('gallery.index');

Route::prefix('ogloszenia')
    ->controller(NewsController::class)
    ->name('news.')
    ->group(function (){
        Route::get('/', 'index')->name('index');

        Route::get('/{news:slug}', 'show')->name('show');
});


// Przekierowywanie do kontaktów
Route::get('/kontakt', function () {
    return view('contact.index');
})->name('contact.index');

// Grupa komponentów usług
Route::prefix('uslugi')
    ->controller(ServiceController::class)
    ->name('services.')
    ->group(function () {
        Route::get('/{service:slug}', 'show')->name('show');
});

Route::prefix('sklep')
    ->controller(ShopController::class)
    ->name('shop.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{item:slug}', 'show')->name('show');
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
