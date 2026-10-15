<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Mascotas
            </h2>
            <a href="{{ route('mascotas.create') }}" class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition text-sm font-medium">
                + Nueva mascota
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Especie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Raza</th>
                            @if(!auth()->user()->isCliente())
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Dueño</th>
                            @endif
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($mascotas as $mascota)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $mascota->nombre }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $mascota->especie }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $mascota->raza ?? '—' }}</td>
                                @if(!auth()->user()->isCliente())
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $mascota->cliente->user->name }}</td>
                                @endif
                                <td class="px-6 py-4 text-right text-sm space-x-2">
                                    <a href="{{ route('mascotas.edit', $mascota) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Editar</a>
                                    <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que quieres eliminar esta mascota?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Todavía no hay mascotas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $mascotas->links() }}
            </div>

        </div>
    </div>
</x-app-layout>