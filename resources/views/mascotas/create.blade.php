<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nueva mascota
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('mascotas.store') }}" class="space-y-4">
                    @csrf

                    @if($clientes)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dueño</label>
                            <select name="cliente_id" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                <option value="">Selecciona un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cliente_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de la mascota</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        @error('nombre') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Especie</label>
                        <input type="text" name="especie" value="{{ old('especie') }}" placeholder="Perro, gato, ave..." class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        @error('especie') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Raza</label>
                        <input type="text" name="raza" value="{{ old('raza') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sexo</label>
                            <select name="sexo" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                <option value="">Selecciona</option>
                                <option value="macho" {{ old('sexo') == 'macho' ? 'selected' : '' }}>Macho</option>
                                <option value="hembra" {{ old('sexo') == 'hembra' ? 'selected' : '' }}>Hembra</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Peso (kg)</label>
                            <input type="number" step="0.01" name="peso" value="{{ old('peso') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color</label>
                            <input type="text" name="color" value="{{ old('color') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('mascotas.index') }}" class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">Cancelar</a>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-teal-600 text-white hover:bg-teal-700">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>