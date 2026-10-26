<?php

use App\Http\Controllers\Api\ClinicaApiController;
use App\Http\Controllers\Api\MascotaApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;


// Clínicas públicas
Route::get('/clinicas', [ClinicaApiController::class, 'index']);
Route::get('/clinicas/{clinica}', [ClinicaApiController::class, 'show']);
// Autenticación API
Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->post(
    '/logout',
    [AuthApiController::class, 'logout']
);

// Mascotas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/mascotas', [MascotaApiController::class, 'index']);
    Route::get('/mascotas/{mascota}', [MascotaApiController::class, 'show']);
});