<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // Importar el controlador
use App\Http\Controllers\JocController; // Importar el controlador



Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}/jocs', [CategoryController::class, 'showJocs'])->name('categories.jocs');


Route::middleware(['auth'])->get('/jocs', [JocController::class, 'index'])->name('jocs.index');
// web.php
Route::post('/jocs/{id}/rate', [JocController::class, 'rate'])->name('jocs.rate');

Route::get('/jocs', [JocController::class, 'index'])->name('jocs.index');

Route::get('/logout', [ProfileController::class, 'logoutAndRedirect'])->name('logout');



Route::middleware('auth')->group(function () {
    // Ruta para mostrar la lista de juegos
    Route::get('/juegos', [JocController::class, 'index'])->name('jocs.index');
    
    // Ruta para guardar la puntuación de un juego
    Route::post('/juegos/{joc}/rate', [JocController::class, 'rate'])->name('jocs.rate');
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
