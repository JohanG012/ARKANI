<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinica;

/**
 * API pública de solo lectura: directorio de clínicas activas.
 * Solo expone datos de contacto, nunca información de usuarios.
 */
class ClinicaApiController extends Controller
{
    /** Lista las clínicas activas (GET /api/clinicas). */
    public function index()
    {
        return response()->json(
            Clinica::where('estado', 'activa')
                ->get(['id', 'nombre', 'direccion', 'telefono', 'email'])
        );
    }

    /** Muestra una clínica activa (GET /api/clinicas/{id}). */
    public function show(Clinica $clinica)
    {
        // Una clínica inactiva se trata como si no existiera
        abort_if($clinica->estado !== 'activa', 404);

        return response()->json($clinica->only(['id', 'nombre', 'direccion', 'telefono', 'email']));
    }
}