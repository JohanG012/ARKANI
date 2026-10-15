<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ARKANI') }}</title>

    <script>
        if (localStorage.getItem('theme') === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-slate-950">

    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Columna del formulario -->
        <div class="w-full md:w-1/2 flex flex-col justify-center px-8 sm:px-16 py-12 relative">

            <!-- Selector de idioma -->
            <div class="absolute top-6 right-6 flex gap-2 text-sm font-medium">
                <a href="{{ route('lang.switch', 'es') }}"
                   class="px-2.5 py-1 rounded-md transition {{ app()->getLocale() == 'es' ? 'bg-teal-600 text-white' : 'text-gray-400 hover:text-gray-600 dark:hover:text-gray-200' }}">
                    ES
                </a>
                <a href="{{ route('lang.switch', 'en') }}"
                   class="px-2.5 py-1 rounded-md transition {{ app()->getLocale() == 'en' ? 'bg-teal-600 text-white' : 'text-gray-400 hover:text-gray-600 dark:hover:text-gray-200' }}">
                    EN
                </a>
            </div>

            <div class="max-w-sm mx-auto w-full">

                <a href="/" class="flex items-center gap-2 mb-10">
                    <span class="text-3xl">🐾</span>
                    <span class="text-2xl font-bold text-teal-600 dark:text-teal-400">ARKANI</span>
                </a>

                {{ $slot }}

            </div>
        </div>

        <!-- Columna de imagen -->
        <div class="hidden md:block md:w-1/2 relative">
            <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?auto=format&fit=crop&w=1200&q=80"
                 alt="Golden retriever atendido por un veterinario"
                 class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/25 to-transparent"></div>

            <div class="absolute bottom-16 left-12 right-12 text-white">
                <h2 class="text-3xl font-bold leading-tight mb-3">
                    {{ __('El sistema que cuida cada detalle de tu clínica') }}
                </h2>
                <p class="text-gray-200">
                    {{ __('Gestiona citas, historiales y clientes en un solo lugar, sin complicaciones.') }}
                </p>
            </div>