<?php

use App\Http\Controllers\CarroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('carros')->group(function() {
        Route::post('/', [CarroController::class, 'store']);
        Route::prefix('{carro}')->group(function () {
            Route::put('/', [CarroController::class, 'update']);
            Route::delete('/', [CarroController::class, 'destroy']);
        });
    });
});

// Rotas públicas
Route::prefix('carros')->group(function() {
    Route::get('/', [CarroController::class, 'index']);
    Route::get('/{carro}', [CarroController::class, 'show']);
});
