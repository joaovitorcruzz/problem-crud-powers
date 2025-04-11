<?php

use App\Http\Controllers\MagicItemsController;
use App\Http\Controllers\PersonagensController;
use App\Http\Controllers\RxMagicItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('personagens', PersonagensController::class);

Route::resource('magic-items', MagicItemsController::class);

Route::get('service-item-persona/{personagem_id}', [RxMagicItemController::class, 'service_item_persona']);
Route::post('service-item-persona/{personagem_id}/to-add/{magic_item_id}', [RxMagicItemController::class, 'service_item_persona_to_add']);
Route::delete('service-item-persona/{personagem_id}/to-remove/{magic_item_id}', [RxMagicItemController::class, 'service_item_persona_to_remove']);
Route::get('service-item-persona-amuleto/{personagem_id}', [RxMagicItemController::class, 'service_item_persona_amuleto']);
