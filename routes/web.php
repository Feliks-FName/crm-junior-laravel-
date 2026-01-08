<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/crm', [DealController::class, 'index'])->name('dashboard');
});


Route::middleware('auth')->group(function () {

    Route::controller(DealController::class)->prefix('deals')->as('deals.')->group(function () {
        Route::get('/crm', 'index')->name('dashboard');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{deal}', 'show')->name('show');
        Route::get('/{deal}/edit', 'edit')->name('edit');
        Route::put('/{deal}', 'update')->name('update');
    });

    Route::controller(ClientController::class)->prefix('clients')->as('clients.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{client}', 'show')->name('show');
        Route::get('/{client}/edit', 'edit')->name('edit');
        Route::put('/{client}', 'update')->name('update');
    });

    Route::controller(UserController::class)->prefix('users')->as('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}', 'show')->name('show');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::put('/{user}', 'update')->name('update');
    });




});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
