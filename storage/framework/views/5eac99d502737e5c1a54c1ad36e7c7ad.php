<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'ARKANI')); ?></title>

    <script>
        if (localStorage.getItem('theme') === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-50 dark:bg-slate-950 text-gray-800 dark:text-gray-100 transition-colors">

    <!-- Barra de navegación -->
    <nav class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800"
         x-data="{ dark: document.documentElement.classList.contains('dark') }">
        <div class="max-w-6xl mx-auto px-6 py-2 flex justify-between items-center">
            <a href="/" aria-label="ARKANI" class="flex h-20 w-40 items-center justify-center">
                <img src="<?php echo e(asset('Img/logo trans.png')); ?>" alt="Logo ARKANI" class="h-20 w-40 object-contain">
            </a>

            <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="#inicio" class="hover:text-teal-600 dark:hover:text-teal-400 transition">Inicio</a>
                <a href="#servicios" class="hover:text-teal-600 dark:hover:text-teal-400 transition">Servicios</a>
                <a href="#sedes" class="hover:text-teal-600 dark:hover:text-teal-400 transition">Sedes</a>
                <a href="#contacto" class="hover:text-teal-600 dark:hover:text-teal-400 transition">Contacto</a>
            </div>

            <div class="flex items-center space-x-4">
                <button
                    @click="
                        dark = !dark;
                        document.documentElement.classList.toggle('dark', dark);
                        localStorage.setItem('theme', dark ? 'dark' : 'light');
                    "
                    class="p-2 rounded-full border border-gray-300 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-800 transition"
                >
                    <span x-show="!dark">🌙</span>
                    <span x-show="dark">☀️</span>
                </button>

<?php if(auth()->guard()->check()): ?>
    <a href="<?php echo e(url('/dashboard')); ?>"
       class="px-4 py-2 rounded-lg bg-teal-600 text-white hover:bg-teal-700 transition">
        Ir al panel
    </a>
<?php else: ?>
    <a href="<?php echo e(route('clinica.register')); ?>"
       class="text-sm text-gray-600 dark:text-gray-300 hover:text-teal-600 dark:hover:text-teal-400 transition hidden md:inline">
        ¿Eres una veterinaria?
    </a>
    <a href="<?php echo e(route('login')); ?>"
       class="px-4 py-2 rounded-lg text-teal-600 dark:text-teal-400 border border-teal-600 dark:border-teal-400 hover:bg-teal-50 dark:hover:bg-slate-800 transition">
        Iniciar sesión
    </a>
    <?php if(Route::has('register')): ?>
        <a href="<?php echo e(route('register')); ?>"
           class="px-4 py-2 rounded-lg bg-teal-600 text-white hover:bg-teal-700 transition">
            Registrarse
        </a>
    <?php endif; ?>
<?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Hero -->
        <!-- Hero -->
       <!-- Hero con parallax -->
    <header id="inicio" class="relative h-screen flex items-center justify-center text-center overflow-hidden"
        style="background-image: url('https://images.unsplash.com/photo-1544568100-847a948585b9?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
               background-attachment: fixed;
               background-size: cover;
               background-position: center;">

        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 px-6 max-w-3xl">
            <p class="uppercase tracking-widest text-sm text-teal-300 mb-4">
                Gestión integral para tu clínica veterinaria
            </p>
            <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight">
                ARKANI simplifica y optimiza cada aspecto de tu negocio veterinario, 
                <span class="italic font-serif text-teal-300">todo desde un solo lugar.</span>
            </h1>
            <p class="mt-6 text-lg text-gray-200">
            
            </p>

            <div class="mt-10 flex justify-center gap-4">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/dashboard')); ?>"
                       class="px-6 py-3 rounded-lg bg-teal-500 text-white font-semibold hover:bg-teal-600 transition">
                        Entrar a ARKANI
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>"
                       class="px-6 py-3 rounded-lg bg-teal-500 text-white font-semibold hover:bg-teal-600 transition">
                        Empezar con ARKANI
                    </a>
                    <a href="<?php echo e(route('login')); ?>"
                       class="px-6 py-3 rounded-lg border border-white/40 text-white font-semibold hover:bg-white/10 transition">
                        Iniciar sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 text-white/70 animate-bounce">
            ↓
        </div>
    </header>

    <!-- Carrusel de marcas proveedoras -->
    <section class="bg-white dark:bg-slate-900 py-10 overflow-hidden border-b border-gray-100 dark:border-slate-800">
        <p class="text-center text-xs uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-6">
            Compatible con tus proveedores de insumos de confianza
        </p>
        <div class="relative flex overflow-hidden">
            <div class="flex gap-16 animate-marquee whitespace-nowrap">
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">VetPharma</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">ZoetisLab</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">NutriPet</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">BioVetSupply</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">MediPaws</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">AgroVet</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">VetPharma</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">ZoetisLab</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">NutriPet</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">BioVetSupply</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">MediPaws</span>
                <span class="text-2xl font-semibold text-gray-400 dark:text-gray-500">AgroVet</span>
            </div>
        </div>
    </section>

       <!-- Servicios / módulos del sistema - Panel interactivo -->
    <section id="servicios" class="bg-gray-50 dark:bg-slate-950 py-24"
        x-data="{ active: 'historia' }">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-center text-sm uppercase tracking-widest text-teal-500 dark:text-teal-400 mb-3">
                Lo que hace ARKANI por ti
            </p>
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 dark:text-white mb-16">
                Cuatro pilares - un solo sistema
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-10 items-start">

                <!-- Lista de módulos (izquierda) -->
                <div class="md:col-span-2 space-y-2">

                    <button @click="active = 'historia'"
                        :class="active === 'historia' ? 'bg-white dark:bg-slate-900 border-teal-500 shadow-md' : 'border-transparent hover:bg-white/50 dark:hover:bg-slate-900/50'"
                        class="w-full text-left p-5 rounded-xl border-l-4 transition-all">
                        <div class="flex items-center gap-4">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-stethoscope'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-teal-600 dark:text-teal-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Historia clínica</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400" x-show="active !== 'historia'">La memoria de cada paciente</p>
                            </div>
                        </div>
                    </button>

                    <button @click="active = 'agenda'"
                        :class="active === 'agenda' ? 'bg-white dark:bg-slate-900 border-indigo-500 shadow-md' : 'border-transparent hover:bg-white/50 dark:hover:bg-slate-900/50'"
                        class="w-full text-left p-5 rounded-xl border-l-4 transition-all">
                        <div class="flex items-center gap-4">
                           	<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-calendar-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-teal-600 dark:text-teal-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Agenda inteligente</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400" x-show="active !== 'agenda'">Citas sin choques de horario</p>
                            </div>
                        </div>
                    </button>

                    <button @click="active = 'alertas'"
                        :class="active === 'alertas' ? 'bg-white dark:bg-slate-900 border-orange-500 shadow-md' : 'border-transparent hover:bg-white/50 dark:hover:bg-slate-900/50'"
                        class="w-full text-left p-5 rounded-xl border-l-4 transition-all">
                        <div class="flex items-center gap-4">
                            	<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-bell-simple-ringing'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-teal-600 dark:text-teal-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Recordatorios y alertas</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400" x-show="active !== 'alertas'">Nada se olvida</p>
                            </div>
                        </div>
                    </button>

                    <button @click="active = 'gestion'"
                        :class="active === 'gestion' ? 'bg-white dark:bg-slate-900 border-purple-500 shadow-md' : 'border-transparent hover:bg-white/50 dark:hover:bg-slate-900/50'"
                        class="w-full text-left p-5 rounded-xl border-l-4 transition-all">
                        <div class="flex items-center gap-4">
                            	<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-chart-pie'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-purple-600 dark:text-purple-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Gestión y administración</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400" x-show="active !== 'gestion'">Tu clínica, en números</p>
                            </div>
                        </div>
                    </button>

                </div>

                <!-- Panel de detalle (derecha) -->
                <div class="md:col-span-3 relative min-h-[380px]">

                    <!-- Historia clínica -->
                    <div x-show="active === 'historia'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute inset-0 p-8 rounded-2xl bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 shadow-lg">
                        <div class="w-14 h-14 rounded-xl bg-teal-100 dark:bg-teal-900/40 flex items-center justify-center text-3xl mb-5"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-stethoscope'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-teal-600 dark:text-teal-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>   </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Historia clínica</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Cada mascota tiene una historia completa y ordenada dentro de ARKANI:
                            diagnósticos, tratamientos, cirugías y exámenes, accesibles con un
                            clic desde cualquier consulta.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-teal-500 text-lg">✔</span> Registro de consultas y diagnósticos</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-teal-500 text-lg">✔</span> Control de vacunas y tratamientos</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-teal-500 text-lg">✔</span> Historial accesible en segundos</li>
                        </ul>
                    </div>

                    <!-- Agenda -->
                    <div x-show="active === 'agenda'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute inset-0 p-8 rounded-2xl bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 shadow-lg">
                        <div class="w-14 h-14 rounded-xl bg-indigo-100 dark:bg-indigo-900/40 flex items-center justify-center text-3xl mb-5"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-calendar-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-indigo-600 dark:text-indigo-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?></div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Agenda inteligente</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Organiza citas de consulta, vacunación y cirugía sin choques de horario.
                            Visualiza el día, la semana o el mes completo de tu equipo veterinario
                            de un vistazo.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-indigo-500 text-lg">✔</span> Programación y reprogramación fácil</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-indigo-500 text-lg">✔</span> Vista por veterinario o por sede</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-indigo-500 text-lg">✔</span> Sin dobles reservas</li>
                        </ul>
                    </div>

                    <!-- Recordatorios y alertas -->
                    <div x-show="active === 'alertas'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute inset-0 p-8 rounded-2xl bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 shadow-lg">
                        <div class="w-14 h-14 rounded-xl bg-orange-100 dark:bg-orange-900/40 flex items-center justify-center text-3xl mb-5"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-bell-simple-ringing'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-orange-600 dark:text-orange-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?></div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Recordatorios y alertas</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            ARKANI avisa antes de que algo se olvide: próxima vacuna, cita
                            pendiente de confirmar, o control post-operatorio. Menos llamadas,
                            menos mascotas desatendidas.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-orange-500 text-lg">✔</span> Alertas de vacunación próxima</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-orange-500 text-lg">✔</span> Notificación de citas pendientes</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-orange-500 text-lg">✔</span> Seguimiento post-consulta</li>
                        </ul>
                    </div>

                    <!-- Gestión y administración -->
                    <div x-show="active === 'gestion'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute inset-0 p-8 rounded-2xl bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800 shadow-lg">
                        <div class="w-14 h-14 rounded-xl bg-purple-100 dark:bg-purple-900/40 flex items-center justify-center text-3xl mb-5"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-chart-pie'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-purple-600 dark:text-purple-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?></div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Gestión y administración</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Controla clientes, inventario de medicamentos e insumos, y genera
                            reportes claros para tomar decisiones sobre tu clínica sin
                            perderte en hojas de cálculo.
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-purple-500 text-lg">✔</span> Perfil de clientes y sus mascotas</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-purple-500 text-lg">✔</span> Control de inventario</li>
                            <li class="flex items-center gap-3 text-gray-700 dark:text-gray-200"><span class="text-purple-500 text-lg">✔</span> Reportes de atención e ingresos</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Contacto -->
<section id="contacto" class="bg-white dark:bg-slate-900 py-24 border-t border-gray-100 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest text-teal-500 dark:text-teal-400 mb-3">
                Estamos para ayudarte
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Contacta con ARKANI
            </h2>

            <p class="text-gray-600 dark:text-gray-400 mb-10">
                ¿Tienes preguntas sobre la plataforma? Escríbenos y te ayudaremos a encontrar la mejor solución para tu clínica.
            </p>
        </div>

        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 text-center rounded-2xl bg-gray-50 dark:bg-slate-800 border border-gray-100 dark:border-slate-700">
                <div class="text-3xl mb-3"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-envelope'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-teal-600 dark:text-teal-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?></div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">
                    Correo electrónico
                </h3>
                <a href="mailto:contacto@arkani.com" class="text-teal-600 dark:text-teal-400 hover:underline">
                    softwarkani@gmail.com
                </a>
            </div>

            <div class="p-6 text-center rounded-2xl bg-gray-50 dark:bg-slate-800 border border-gray-100 dark:border-slate-700">
                <div class="text-3xl mb-3"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-phone'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-teal-600 dark:text-teal-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?></div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">
                    Teléfono
                </h3>
                <a href="tel:+573122714998" class="text-teal-600 dark:text-teal-400 hover:underline">
                    +57 3122714998
                </a>
            </div>

            <div class="p-6 text-center rounded-2xl bg-gray-50 dark:bg-slate-800 border border-gray-100 dark:border-slate-700">
                <div class="text-3xl mb-3"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-map-pin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-teal-600 dark:text-teal-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?></div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">
                    Ubicación
                </h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Colombia
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 dark:bg-black text-gray-300 py-8">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p>&copy; ARKANI SINCE 2026. Todos los derechos reservados.</p>
    </div>
</footer>


</body>
</html><?php /**PATH C:\xampp\htdocs\ARKANI\resources\views/welcome.blade.php ENDPATH**/ ?>