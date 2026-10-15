<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Registra tu veterinaria en ARKANI</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
            Crea la cuenta de tu clínica y tu perfil de administrador en un solo paso.
        </p>
    </div>

    <form method="POST" action="{{ route('clinica.register') }}" class="space-y-6">
        @csrf

        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-teal-600 dark:text-teal-400 mb-4">
                Datos de tu clínica
            </h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de la clínica</label>
                    <input type="text" name="clinica_nombre" value="{{ old('clinica_nombre') }}" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    @error('clinica_nombre') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección</label>
                    <input type="text" name="clinica_direccion" value="{{ old('clinica_direccion') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                        <input type="text" name="clinica_telefono" value="{{ old('clinica_telefono') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email de contacto</label>
                        <input type="email" name="clinica_email" value="{{ old('clinica_email') }}" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-sm font-semibold uppercase tracking-wide text-teal-600 dark:text-teal-400 mb-4">
                Tu cuenta de administrador
            </h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tu nombre completo</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                        <input type="password" name="password" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('login') }}" class="text-sm text-gray-500 dark:text-gray-400 underline">
                ¿Ya tienes cuenta? Inicia sesión
            </a>
            <button type="submit" class="px-6 py-2 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700">
                Registrar mi clínica
            </button>
        </div>
    </form>
</x-guest-layout>