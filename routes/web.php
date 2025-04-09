<?php

use App\Http\Controllers\PersonagensController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', [PersonagensController::class, 'index']);