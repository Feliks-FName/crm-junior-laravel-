<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/crm', [\App\Http\Controllers\DealController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/deal/create', [\App\Http\Controllers\DealController::class, 'create'])->name('deal.create');
    Route::post('/deal/store', [\App\Http\Controllers\DealController::class, 'store'])->name('deal.store');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
