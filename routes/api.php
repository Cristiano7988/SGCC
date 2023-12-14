<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarroController;
use App\Http\Middleware\ChecaSeEAdmin;
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
Route::post('/login', [LoginController::class, 'loginViaApi']);

Route::middleware('auth:sanctum')->group(function () {
    // Área administrativa
    Route::middleware(ChecaSeEAdmin::class)->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'index']);
                Route::post('/', [UserController::class, 'store']);
                Route::prefix('{user}')->group(function () {
                    Route::get('/', [UserController::class, 'show']);
                    Route::put('/', [UserController::class, 'update']);
                    Route::delete('/', [UserController::class, 'destroy']);
                });
            });
    
            Route::prefix('carros')->group(function () {
                Route::post('/', [CarroController::class, 'store']);
                Route::prefix('{carro}')->group(function () {
                    Route::put('/', [CarroController::class, 'update']);
                    Route::delete('/', [CarroController::class, 'destroy']);
                });
            });
        });
    });
});

// Rotas públicas
Route::prefix('carros')->group(function () {
    Route::get('/', [CarroController::class, 'index']);
    Route::get('/{carro}', [CarroController::class, 'show']);
});
