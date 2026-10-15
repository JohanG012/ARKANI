<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar veterinario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('veterinarios.update', $veterinario) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre completo</label>
                        <input type="text" name="name" value="{{ old('name', $veterinario->user->name) }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email', $veterinario->user->email) }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Especialidad</label>
                        <input type="text" name="especialidad" value="{{ old('especialidad', $veterinario->especialidad) }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono', $veterinario->telefono) }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número de tarjeta profesional</label>
                        <input type="text" name="numero_tarjeta_profesional" value="{{ old('numero_tarjeta_profesional', $veterinario->numero_tarjeta_profesional) }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('veterinarios.index') }}" class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">Cancelar</a>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-teal-600 text-white hover:bg-teal-700">Actualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>