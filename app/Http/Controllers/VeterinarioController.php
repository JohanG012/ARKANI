<?php

namespace App\Http\Controllers;

use App\Models\Veterinario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VeterinarioController extends Controller
{
    private function usuarioAutenticado(): User
    {
        $user = auth()->user();

        if (! $user instanceof User) {
            abort(401, 'No autenticado.');
        }

        return $user;
    }

    private function autorizarAcceso(): void
    {
        $user = $this->usuarioAutenticado();

        if (! $user->isAdmin() && ! $user->isOmega()) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }
    }

    public function index()
    {
        $this->autorizarAcceso();

        $veterinarios = Veterinario::with('user')->latest()->paginate(10);

        return view('veterinario.index', compact('veterinarios'));
    }

    public function create()
    {
        $this->autorizarAcceso();

        return view('veterinario.create');
    }

    public function store(Request $request)
    {
        $this->autorizarAcceso();

        $adminUser = $this->usuarioAutenticado();

        if (! $adminUser->clinica_id) {
            return back()->with('error', 'Tu cuenta no tiene una clínica asignada. Contacta al soporte de ARKANI.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'especialidad' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'numero_tarjeta_profesional' => 'nullable|string|max:100',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'veterinario',
            'clinica_id' => $adminUser->clinica_id,
        ]);

        Veterinario::create([
            'user_id' => $user->id,
            'especialidad' => $validated['especialidad'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'numero_tarjeta_profesional' => $validated['numero_tarjeta_profesional'] ?? null,
        ]);

        return redirect()->route('veterinarios.index')->with('success', 'Veterinario registrado correctamente.');
    }

    public function edit(Veterinario $veterinario)
    {
        $this->autorizarAcceso();

        return view('veterinario.edit', compact('veterinario'));
    }

    public function update(Request $request, Veterinario $veterinario)
    {
        $this->autorizarAcceso();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $veterinario->user_id,
            'especialidad' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'numero_tarjeta_profesional' => 'nullable|string|max:100',
        ]);

        $veterinario->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $veterinario->update([
            'especialidad' => $validated['especialidad'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'numero_tarjeta_profesional' => $validated['numero_tarjeta_profesional'] ?? null,
        ]);

        return redirect()->route('veterinarios.index')->with('success', 'Veterinario actualizado correctamente.');
    }

    public function destroy(Veterinario $veterinario)
    {
        $this->autorizarAcceso();

        $veterinario->user->delete();

        return redirect()->route('veterinarios.index')->with('success', 'Veterinario eliminado.');
    }
}