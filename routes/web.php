<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarroController;
use App\Http\Middleware\ChecaSeEAdmin;
use App\Http\Middleware\RestringeUsuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth:sanctum')->group(function () {
    // Área administrativa
    Route::middleware(ChecaSeEAdmin::class)->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('list-users');
                Route::post('/', [UserController::class, 'store'])->name('store-user');
                Route::get('/create', [UserController::class, 'create'])->name('create-user');
                Route::prefix('{user}')->group(function () {
                    Route::delete('/', [UserController::class, 'destroy'])->name('destroy-user');
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

    // Área do cliente
    Route::prefix('users/{user}')->middleware(RestringeUsuario::class)->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('show-user');
        Route::put('/', [UserController::class, 'update'])->name('update-user');
        Route::get('/edit', [UserController::class, 'edit'])->name('edit-user');
    });
});