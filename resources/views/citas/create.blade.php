<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Agendar cita
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($mascotas->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400">
                        No tienes mascotas registradas todavía.
                        <a href="{{ route('mascotas.create') }}" class="text-teal-600 dark:text-teal-400 underline">Registra una mascota primero</a>.
                    </p>
                @else
                    <form method="POST" action="{{ route('citas.store') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mascota</label>
                            <select name="mascota_id" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                <option value="">Selecciona una mascota</option>
                                @foreach($mascotas as $mascota)
                                    <option value="{{ $mascota->id }}" {{ old('mascota_id') == $mascota->id ? 'selected' : '' }}>
                                        {{ $mascota->nombre }} @if(!auth()->user()->isCliente()) — {{ $mascota->cliente->user->name }} @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('mascota_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Veterinario</label>
                            <select name="veterinario_id" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                <option value="">Selecciona un veterinario</option>
                                @foreach($veterinarios as $veterinario)
                                    <option value="{{ $veterinario->id }}" {{ old('veterinario_id') == $veterinario->id ? 'selected' : '' }}>
                                        {{ $veterinario->user->name }} @if($veterinario->especialidad) — {{ $veterinario->especialidad }} @endif
                                        @if($veterinario->user->clinica) ({{ $veterinario->user->clinica->nombre }}) @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('veterinario_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
                                <input type="date" name="fecha" value="{{ old('fecha') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                @error('fecha') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora</label>
                                <input type="time" name="hora" value="{{ old('hora') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                @error('hora') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Motivo de la consulta</label>
                            <input type="text" name="motivo" value="{{ old('motivo') }}" placeholder="Consulta general, vacunación, control..." class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                            @error('motivo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notas adicionales</label>
                            <textarea name="notas" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">{{ old('notas') }}</textarea>
                        </div>

                        <div class="flex justify-end gap-3 pt-4">
                            <a href="{{ route('citas.index') }}" class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300">Cancelar</a>
                            <button type="submit" class="px-4 py-2 rounded-lg bg-teal-600 text-white hover:bg-teal-700">Agendar</button>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>