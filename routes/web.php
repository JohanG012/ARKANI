<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicaRegistroController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::middleware('guest')->group(function () {
    Route::get('/registrar-clinica', [ClinicaRegistroController::class, 'create'])->name('clinica.register');
    Route::post('/registrar-clinica', [ClinicaRegistroController::class, 'store']);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/prueba123', function () {
    return 'Esto es una prueba';
});
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['es', 'en'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('clientes', \App\Http\Controllers\ClienteController::class)
    ->middleware('admin.omega');
    Route::resource('mascotas', \App\Http\Controllers\MascotaController::class);
    Route::resource('veterinarios', \App\Http\Controllers\VeterinarioController::class);
    Route::resource('citas', \App\Http\Controllers\CitaController::class)->except(['edit', 'update', 'show']);
    Route::patch('/citas/{cita}/estado', [\App\Http\Controllers\CitaController::class, 'updateEstado'])->name('citas.estado');
    Route::get('/omega/clinicas', [\App\Http\Controllers\OmegaClinicaController::class, 'index'])->name('omega.clinicas.index');
    Route::patch('/omega/clinicas/{clinica}/estado', [\App\Http\Controllers\OmegaClinicaController::class, 'toggleEstado'])->name('omega.clinicas.toggleEstado');
    });
    
require __DIR__.'/auth.php';