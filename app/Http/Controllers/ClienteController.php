<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isAdmin() && !auth()->user()->isOmega()) {
                abort(403, 'No tienes permiso para acceder a esta sección.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $clientes = Cliente::with('user')->latest()->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'documento_identidad' => 'nullable|string|max:50',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'cliente',
        ]);

        Cliente::create([
            'user_id' => $user->id,
            'telefono' => $validated['telefono'] ?? null,
            'direccion' => $validated['direccion'] ?? null,
            'documento_identidad' => $validated['documento_identidad'] ?? null,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $cliente->user_id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'documento_identidad' => 'nullable|string|max:50',
        ]);

        $cliente->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $cliente->update([
            'telefono' => $validated['telefono'] ?? null,
            'direccion' => $validated['direccion'] ?? null,
            'documento_identidad' => $validated['documento_identidad'] ?? null,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->user->delete(); // al borrar el usuario, el cliente se borra en cascada
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado.');
    }
}