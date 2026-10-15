<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use Illuminate\Http\Request;

class OmegaClinicaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isOmega()) {
                abort(403, 'Solo el propietario de ARKANI puede acceder a esta sección.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $clinicas = Clinica::withCount([
            'usuarios as administradores_count' => function ($q) {
                $q->where('role', 'administrador');
            },
            'usuarios as veterinarios_count' => function ($q) {
                $q->where('role', 'veterinario');
            },
            'citas',
        ])->latest()->paginate(10);

        return view('omega.clinicas.index', compact('clinicas'));
    }

    public function toggleEstado(Clinica $clinica)
    {
        $clinica->estado = $clinica->estado === 'activa' ? 'inactiva' : 'activa';
        $clinica->save();

        return back()->with('success', 'Estado de la clínica actualizado.');
    }
}
