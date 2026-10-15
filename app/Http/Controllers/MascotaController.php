<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Cliente;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isCliente()) {
            $mascotas = Mascota::whereHas('cliente', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->latest()->paginate(10);
        } else {
            $mascotas = Mascota::with('cliente.user')->latest()->paginate(10);
        }

        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        $user = auth()->user();
        $clientes = null;

        if (!$user->isCliente()) {
            $clientes = Cliente::with('user')->get();
        }

        return view('mascotas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string|max:20',
            'peso' => 'nullable|numeric|min:0|max:999.99',
            'color' => 'nullable|string|max:100',
        ];

        if (!$user->isCliente()) {
            $rules['cliente_id'] = 'required|exists:clientes,id';
        }

        $validated = $request->validate($rules);

        // Si es cliente, se asigna automáticamente su propio perfil como dueño
        $clienteId = $user->isCliente()
            ? $user->cliente->id
            : $validated['cliente_id'];

        Mascota::create([
            'cliente_id' => $clienteId,
            'nombre' => $validated['nombre'],
            'especie' => $validated['especie'],
            'raza' => $validated['raza'] ?? null,
            'fecha_nacimiento' => $validated['fecha_nacimiento'] ?? null,
            'sexo' => $validated['sexo'] ?? null,
            'peso' => $validated['peso'] ?? null,
            'color' => $validated['color'] ?? null,
        ]);

        return redirect()->route('mascotas.index')->with('success', 'Mascota registrada correctamente.');
    }

    public function edit(Mascota $mascota)
    {
        $this->autorizarAcceso($mascota);

        $user = auth()->user();
        $clientes = $user->isCliente() ? null : Cliente::with('user')->get();

        return view('mascotas.edit', compact('mascota', 'clientes'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $this->autorizarAcceso($mascota);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'raza' => 'nullable|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string|max:20',
            'peso' => 'nullable|numeric|min:0|max:999.99',
            'color' => 'nullable|string|max:100',
        ]);

        $mascota->update($validated);

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy(Mascota $mascota)
    {
        $this->autorizarAcceso($mascota);

        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada.');
    }

    /**
     * Verifica que el usuario tenga permiso sobre esta mascota:
     * - admin/omega/veterinario: acceso total
     * - cliente: solo si la mascota es suya
     */
    private function autorizarAcceso(Mascota $mascota): void
    {
        $user = auth()->user();

        if ($user->isCliente() && $mascota->cliente->user_id !== $user->id) {
            abort(403, 'No tienes permiso para acceder a esta mascota.');
        }
    }
}