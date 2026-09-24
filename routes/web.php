<?php

use App\Models\Vacature;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vacatures', VacatureController::class);

Route::resource('vacatures', VacatureController::class)
    ->only(['index', 'show']);;

Route::middleware('auth')->group(function () {
    Route::resource('vacatures', VacatureController::class)
        ->except(['index', 'show']);
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
