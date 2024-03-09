<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/health', function () {
    return response('Up and running!', 200)
    ->header('Content-Type', 'text/plain');
});

Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/supervisor/create', [SupervisorController::class, 'create']);
    Route::delete('/supervisor/delete/{id}', [SupervisorController::class, 'delete']);
    Route::put('/supervisor/update/{id}', [SupervisorController::class, 'update']);
    Route::get('/supervisor/getAll', [SupervisorController::class, 'getAll']);
    Route::get('/supervisor/get/{id}', [SupervisorController::class, 'get']);
})->name('supervisor');

