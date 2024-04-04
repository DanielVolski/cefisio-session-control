<?php

use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SessionController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/apprentice/create', [ApprenticeController::class, 'create']);
    Route::delete('/apprentice/delete/{id}', [ApprenticeController::class, 'delete']);
    Route::put('/apprentice/update/{id}', [ApprenticeController::class, 'update']);
    Route::get('/apprenctice/getAll', [ApprenticeController::class, 'getAll']);
    Route::get('/apprentice/get/{id}', [ApprenticeController::class, 'get']);
})->name('apprentice');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/patient/create', [PatientController::class, 'create']);
    Route::delete('/patient/delete/{id}', [PatientController::class, 'delete']);
    Route::put('/patient/update/{id}', [PatientController::class, 'update']);
    Route::get('/patient/getAll', [PatientController::class, 'getAll']);
    Route::get('/patient/get/{id}', [PatientController::class, 'get']);
})->name('patient');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/session/create', [SessionController::class, 'create']);
    Route::get('/session/getAll', [SessionController::class, 'getAll']);
    Route::get('/session/get/{id}', [SessionController::class, 'get']);
    Route::get('/session/getByApprenticeID', [SessionController::class, 'getByApprenticeID']);
});