<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('candies', [CandyController::class, 'index']);
Route::post('candies', [CandyController::class, 'store']);
Route::put('candies/{id}', [CandyController::class, 'update']);
Route::delete('candies/{id}', [CandyController::class, 'destroy']);
Route::post('candies/{id}/sell', [CandyController::class, 'sell']);

Route::get('stats', [CandyController::class, 'stats']);
