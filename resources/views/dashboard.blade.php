<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if(auth()->user()->isOmega())
                Panel de ARKANI (Omega)
            @elseif(auth()->user()->isAdmin())
                Panel de Administración
            @elseif(auth()->user()->isVeterinario())
                Mi Agenda
            @else
                Mis Mascotas
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(auth()->user()->isOmega())
                @php
                    $totalClinicas = \App\Models\Clinica::count();
                    $totalUsuarios = \App\Models\User::count();
                    $totalCitas = \App\Models\Cita::count();
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Clínicas registradas</p>
                        <p class="text-3xl font-bold text-teal-600 dark:text-teal-400">{{ $totalClinicas }}</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Usuarios totales</p>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ $totalUsuarios }}</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Citas totales</p>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $totalCitas }}</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Bienvenido, <strong>{{ auth()->user()->name }}</strong>. Desde aquí administras toda la plataforma ARKANI.
                    </p>
                    <a href="{{ route('omega.clinicas.index') }}" class="inline-block px-4 py-2 rounded-lg bg-teal-600 text-white hover:bg-teal-700 transition text-sm font-medium">
                        Ver todas las clínicas →
                    </a>
                </div>

            @elseif(auth()->user()->isAdmin())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Citas hoy</p>
                        <p class="text-3xl font-bold text-teal-600 dark:text-teal-400">0</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Clientes registrados</p>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">0</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Veterinarios activos</p>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400">0</p>
                    </div>
                </div>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300">
                        Bienvenido, <strong>{{ auth()->user()->name }}</strong>. Desde aquí gestionas veterinarios, clientes y citas de tu clínica.
                    </p>
                </div>

            @elseif(auth()->user()->isVeterinario())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300">
                        Hola, Dr(a). <strong>{{ auth()->user()->name }}</strong>. Aquí verás tu agenda de citas del día. (Módulo en construcción)
                    </p>
                </div>

            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300">
                        Hola, <strong>{{ auth()->user()->name }}</strong>. Aquí verás tus mascotas registradas y tus próximas citas.
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>