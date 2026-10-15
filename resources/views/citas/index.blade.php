<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Citas
            </h2>
            <a href="{{ route('citas.create') }}" class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition text-sm font-medium">
                + Agendar cita
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg dark:bg-green-900/40 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Mascota</th>
                            @if(!auth()->user()->isCliente())
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Dueño</th>
                            @endif
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Veterinario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Motivo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Estado</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($citas as $cita)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                    {{ $cita->fecha->format('d/m/Y') }} — {{ \Carbon\Carbon::parse($cita->hora)->format('h:i A') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $cita->mascota->nombre }}</td>
                                @if(!auth()->user()->isCliente())
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $cita->mascota->cliente->user->name }}</td>
                                @endif
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $cita->veterinario->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $cita->motivo }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @php
                                        $colores = [
                                            'pendiente' => 'bg-orange-100 text-orange-700 dark:bg-orange-900/40 dark:text-orange-300',
                                            'confirmada' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300',
                                            'en_atencion' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/40 dark:text-purple-300',
                                            'completada' => 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300',
                                            'cancelada' => 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300',
                                        ];
                                    @endphp
                                    <span class="px-2 py-1 rounded-full text-xs {{ $colores[$cita->estado] }}">
                                        {{ ucfirst(str_replace('_', ' ', $cita->estado)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right text-sm space-x-2">
                                    @if(!auth()->user()->isCliente())
                                        <form action="{{ route('citas.estado', $cita) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <select name="estado" onchange="this.form.submit()" class="text-xs rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                                <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="confirmada" {{ $cita->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                                <option value="en_atencion" {{ $cita->estado == 'en_atencion' ? 'selected' : '' }}>En atención</option>
                                                <option value="completada" {{ $cita->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                                                <option value="cancelada" {{ $cita->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                            </select>
                                        </form>
                                    @endif
                                    <form action="{{ route('citas.destroy', $cita) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que quieres eliminar esta cita?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:underline text-xs">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Todavía no hay citas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $citas->links() }}
            </div>

        </div>
    </div>
</x-app-layout>