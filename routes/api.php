<?php

use App\Http\Controllers\MagicItemsController;
use App\Http\Controllers\PersonagensController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('personagens', PersonagensController::class);

Route::resource('magic-items', MagicItemsController::class);

// Route::get('/personagens', [\App\Http\Controllers\PersonagensController::class, 'index']);
// Route::post('/personagens/create', [\App\Http\Controllers\PersonagensController::class, 'store']);
// Route::get('/personagens/{id}', [\App\Http\Controllers\PersonagensController::class, 'show']);
// Route::put('/personagens/{id}', [\App\Http\Controllers\PersonagensController::class, 'update']);
// Route::delete('/personagens/{id}', [\App\Http\Controllers\PersonagensController::class, 'destroy']);