<x-guest-split-layout>

    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">
        {{ __('Iniciar sesión') }}
    </h1>
    <p class="text-gray-500 dark:text-gray-400 mb-8">
        {{ __('Ingresa tus datos para acceder a tu cuenta') }}
    </p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-teal-600 shadow-sm focus:ring-teal-500" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuérdame') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-teal-600 dark:text-teal-400 hover:underline" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="w-full py-2.5 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700 transition">
            {{ __('Iniciar sesión') }}
        </button>

        <p class="text-center text-sm text-gray-500 dark:text-gray-400 pt-2">
            {{ __('¿No tienes cuenta?') }}
            <a href="{{ route('register') }}" class="text-teal-600 dark:text-teal-400 hover:underline font-medium">
                {{ __('Regístrate') }}
            </a>
        </p>

        <p class="text-center text-sm text-gray-500 dark:text-gray-400">
            {{ __('¿Eres una veterinaria?') }}
            <a href="{{ route('clinica.register') }}" class="text-teal-600 dark:text-teal-400 hover:underline font-medium">
                {{ __('Regístrala aquí') }}
            </a>
        </p>
    </form>

</x-guest-split-layout>