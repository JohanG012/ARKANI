<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ClinicaRegistroController extends Controller
{
    public function create()
    {
        return view('auth.registrar-clinica');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'clinica_nombre' => 'required|string|max:255',
            'clinica_direccion' => 'nullable|string|max:255',
            'clinica_telefono' => 'nullable|string|max:20',
            'clinica_email' => 'nullable|email|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 1. Crear la clínica primero
        $clinica = Clinica::create([
            'nombre' => $validated['clinica_nombre'],
            'direccion' => $validated['clinica_direccion'] ?? null,
            'telefono' => $validated['clinica_telefono'] ?? null,
            'email' => $validated['clinica_email'] ?? null,
            'estado' => 'activa',
        ]);

        // 2. Crear el usuario administrador YA CONECTADO a esa clínica
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'administrador',
            'clinica_id' => $clinica->id,
        ]);

        // 3. Iniciar sesión automáticamente
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', '¡Tu clínica fue registrada correctamente! Ya puedes empezar a agregar veterinarios y gestionar tu negocio.');
    }
}