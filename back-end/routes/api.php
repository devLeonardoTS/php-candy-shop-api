<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Candies
Route::get('candies', [CandyController::class, 'index']);
Route::get('candies/inactive', [CandyController::class, 'getInactive']);
Route::post('candies', [CandyController::class, 'store']);
Route::put('candies/{id}', [CandyController::class, 'update']);
Route::delete('candies/{id}', [CandyController::class, 'destroy']);
Route::post('candies/{id}/deactivate', [CandyController::class, 'deactivate']);
Route::post('candies/{id}/restore', [CandyController::class, 'restore']);
Route::post('candies/{id}/sell', [CandyController::class, 'sell']);

// Sales
Route::get('sales', [CandyController::class, 'salesHistory']);

// Stats
Route::get('stats', [CandyController::class, 'stats']);