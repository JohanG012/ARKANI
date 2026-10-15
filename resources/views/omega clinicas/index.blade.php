<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Clínicas registradas en ARKANI
        </h2>
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Clínica</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Contacto</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Admins</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Veterinarios</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Citas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Estado</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($clinicas as $clinica)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $clinica->nombre }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $clinica->email ?? '—' }}<br>
                                    <span class="text-xs">{{ $clinica->telefono ?? '' }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-700 dark:text-gray-300">{{ $clinica->administradores_count }}</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-700 dark:text-gray-300">{{ $clinica->veterinarios_count }}</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-700 dark:text-gray-300">{{ $clinica->citas_count }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if($clinica->estado === 'activa')
                                        <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300">Activa</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300">Inactiva</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right text-sm">
                                    <form action="{{ route('omega.clinicas.toggleEstado', $clinica) }}" method="POST" class="inline"
                                          onsubmit="return confirm('¿Seguro que quieres cambiar el estado de esta clínica?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-indigo-600 dark:text-indigo-400 hover:underline text-xs">
                                            {{ $clinica->estado === 'activa' ? 'Desactivar' : 'Activar' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Todavía no hay clínicas registradas en ARKANI.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $clinicas->links() }}
            </div>

        </div>
    </div>
</x-app-layout>