<?php

use App\Http\Controllers\DealController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/crm', [DealController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/deal/create', [DealController::class, 'create'])->name('deal.create');
    Route::post('/deal/store', [DealController::class, 'store'])->name('deal.store');
    Route::get('/deal/{deal}', [DealController::class, 'show'])->name('deal.show');
    Route::get('/deal/{deal}/edit', [DealController::class, 'edit'])->name('deal.edit');
    Route::put('/deal/{deal}', [DealController::class, 'update'])->name('deal.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
