<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/', [CarController::class, 'index'])->name('home');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');


Route::middleware('auth')->group(function () {
    Route::get('/cars/create', [CarController::class, 'createStep1'])->name('cars.create.step1');
    Route::post('/cars/create', [CarController::class, 'postStep1'])->name('cars.create.step1.post');
    Route::get('/cars/create/details', [CarController::class, 'createStep2'])->name('cars.create.step2');
    Route::post('/cars/create/details', [CarController::class, 'postStep2'])->name('cars.create.step2.post');

    Route::get('/offers', [CarController::class, 'myCars'])->name('offers');

    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
});

require __DIR__.'/auth.php';
