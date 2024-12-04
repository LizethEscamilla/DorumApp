<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\SearchController;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/donors', DonorController::class);
    
});

Auth::routes();

Route::get('delete/{id}', [DonorController::class,'destroy']);

Route::put('/donors/{id}', [DonorController::class, 'update']);

Route::get('generate-pdf', [DonorController::class, 'generatePDF'])->name('generate-pdf');



Route::get('api/search', [SearchController::class, 'search']);

Route::get('/donors', [SearchController::class, 'search'])->name('donors.search');

