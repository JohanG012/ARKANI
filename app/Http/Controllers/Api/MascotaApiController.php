<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $consulta = Mascota::with('cliente');

        // Los clientes solo pueden ver sus propias mascotas.
        if ($user->isCliente()) {
            $cliente = $user->cliente;

            if (!$cliente) {
                return response()->json([
                    'message' => 'El usuario no tiene un cliente asociado.',
                ], 403);
            }

            $consulta->where('cliente_id', $cliente->id);
        } elseif (
            !$user->isVeterinario()
            && !$user->isAdmin()
            && !$user->isOmega()
        ) {
            return response()->json([
                'message' => 'No tienes permiso para consultar mascotas.',
            ], 403);
        }

        return response()->json(
            $consulta->latest()->paginate(10)
        );
    }

    public function show(Request $request, Mascota $mascota)
    {
        $user = $request->user();

        if ($user->isCliente()) {
            $cliente = $user->cliente;

            if (!$cliente || $mascota->cliente_id !== $cliente->id) {
                return response()->json([
                    'message' => 'No tienes permiso para consultar esta mascota.',
                ], 403);
            }
        } elseif (
            !$user->isVeterinario()
            && !$user->isAdmin()
            && !$user->isOmega()
        ) {
            return response()->json([
                'message' => 'No tienes permiso para consultar mascotas.',
            ], 403);
        }

        return response()->json(
            $mascota->load('cliente')
        );
    }
}
