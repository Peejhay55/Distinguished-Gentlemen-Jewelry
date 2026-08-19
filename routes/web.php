<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

// Actividad 1: vista inicial.
Route::view('/', 'home')->name('home');

Route::resource('clients', ClientController::class)
    ->only(['index', 'create', 'store', 'show', 'destroy']);
