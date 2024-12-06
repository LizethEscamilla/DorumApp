<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\SearchController;

// Ruta de bienvenida (accesible sin iniciar sesión)
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Redirigir a /donors en lugar del dashboard
    Route::get('/dashboard', function () {
        return redirect('/donors');
    })->name('dashboard');

    // Ruta del home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas de DonorController
    Route::resource('/donors', DonorController::class);

    Route::get('delete/{id}', [DonorController::class,'destroy']);
    Route::put('/donors/{id}', [DonorController::class, 'update']);
    Route::get('generate-pdf', [DonorController::class, 'generatePDF'])->name('generate-pdf');
    Route::get('create', [DonorController::class, 'create'])->name('create');

    // Rutas del controlador de búsqueda
    Route::get('api/search', [SearchController::class, 'search']);
    Route::get('/donors', [SearchController::class, 'search'])->name('donors.search');
});

// Descomenta si usas autenticación básica de Laravel (opcional)
// Auth::routes();
