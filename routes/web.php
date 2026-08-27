<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacatureController;
use App\Models\Vacature;

Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

Route::get('/hallo', function () {
    return "Hallo Eyal";
})->name('welcome.hello');

/*Route::get('/vacatures', [VacatureController::class, 'index'])
->name('vacatures.index');

Route::get('vacatures/{id}', [VacatureController::class, 'show'])->whereNumber('id')->name('vacatures.show');

Route::get('vacatures/nieuw', function() {
    return "Nieuwe vacature";
})->name('vacatures.nieuw');*/

Route::resource('vacatures', VacatureController::class);