<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascota;
use App\Models\Veterinario;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    private function usuarioAutenticado(): \App\Models\User
    {
        $user = auth()->user();

        if (! $user instanceof \App\Models\User) {
            abort(401, 'No autenticado.');
        }

        return $user;
    }

    public function index()
    {
        $user = $this->usuarioAutenticado();

        if ($user->isCliente()) {
            $citas = Cita::with(['mascota', 'veterinario.user', 'clinica'])
                ->whereHas('mascota.cliente', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                })
                ->orderBy('fecha')->orderBy('hora')
                ->paginate(10);
        } elseif ($user->isVeterinario()) {
            $citas = Cita::with(['mascota.cliente.user', 'clinica'])
                ->whereHas('veterinario', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                })
                ->orderBy('fecha')->orderBy('hora')
                ->paginate(10);
        } else {
            // administrador / omega: ve todas las citas
            $citas = Cita::with(['mascota.cliente.user', 'veterinario.user', 'clinica'])
                ->orderBy('fecha')->orderBy('hora')
                ->paginate(10);
        }

        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $user = $this->usuarioAutenticado();

        // El cliente solo puede elegir entre SUS PROPIAS mascotas
        $mascotas = $user->isCliente()
            ? $user->cliente->mascotas
            : Mascota::with('cliente.user')->get();

        // Veterinarios disponibles (de cualquier clínica, ya que el cliente puede elegir cualquiera)
        $veterinarios = Veterinario::with(['user.clinica'])->get();

        return view('citas.create', compact('mascotas', 'veterinarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'veterinario_id' => 'required|exists:veterinarios,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'motivo' => 'required|string|max:255',
            'notas' => 'nullable|string',
        ]);

        $user = $this->usuarioAutenticado();

        // Seguridad: si es cliente, confirmar que la mascota realmente le pertenece
        if ($user->isCliente()) {
            $mascota = Mascota::findOrFail($validated['mascota_id']);
            if ($mascota->cliente->user_id !== $user->id) {
                abort(403, 'No puedes agendar citas para una mascota que no es tuya.');
            }
        }

        $veterinario = Veterinario::findOrFail($validated['veterinario_id']);

        Cita::create([
            'mascota_id' => $validated['mascota_id'],
            'veterinario_id' => $validated['veterinario_id'],
            'clinica_id' => $veterinario->user->clinica_id,
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'motivo' => $validated['motivo'],
            'estado' => 'pendiente',
            'notas' => $validated['notas'] ?? null,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita agendada correctamente.');
    }

    public function updateEstado(Request $request, Cita $cita)
    {
        $user = $this->usuarioAutenticado();

        if ($user->isCliente()) {
            abort(403, 'No tienes permiso para cambiar el estado de una cita.');
        }

        $validated = $request->validate([
            'estado' => 'required|in:pendiente,confirmada,en_atencion,completada,cancelada',
        ]);

        $cita->update(['estado' => $validated['estado']]);

        return redirect()->route('citas.index')->with('success', 'Estado de la cita actualizado.');
    }

    public function destroy(Cita $cita)
    {
        $user = $this->usuarioAutenticado();

        if ($user->isCliente() && $cita->mascota->cliente->user_id !== $user->id) {
            abort(403, 'No tienes permiso para cancelar esta cita.');
        }

        $cita->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada.');
    }
}