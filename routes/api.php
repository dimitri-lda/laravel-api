<?php

use App\Http\Controllers\ApiExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/example', [ApiExampleController::class, 'index']);

Route::get('/test', function () {
    return response()->json(['message' => 'API работает!']);
});
