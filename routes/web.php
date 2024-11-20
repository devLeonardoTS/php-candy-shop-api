<?php

use function Pest\Laravel\json;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandyController;

Route::get('/', function () {
    return response()->json(["message" => "Hello world!"]);
});
