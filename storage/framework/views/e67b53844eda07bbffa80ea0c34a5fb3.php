<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php if(auth()->user()->isOmega()): ?>
                Panel de ARKANI (Omega)
            <?php elseif(auth()->user()->isAdmin()): ?>
                Panel de Administración
            <?php elseif(auth()->user()->isVeterinario()): ?>
                Mi Agenda
            <?php else: ?>
                Mis Mascotas
            <?php endif; ?>
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <?php if(auth()->user()->isOmega()): ?>
                <?php
                    $totalClinicas = \App\Models\Clinica::count();
                    $totalUsuarios = \App\Models\User::count();
                    $totalCitas = \App\Models\Cita::count();
                ?>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Clínicas registradas</p>
                        <p class="text-3xl font-bold text-teal-600 dark:text-teal-400"><?php echo e($totalClinicas); ?></p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Usuarios totales</p>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400"><?php echo e($totalUsuarios); ?></p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Citas totales</p>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400"><?php echo e($totalCitas); ?></p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Bienvenido, <strong><?php echo e(auth()->user()->name); ?></strong>. Desde aquí administras toda la plataforma ARKANI.
                    </p>
                    <a href="<?php echo e(route('omega.clinicas.index')); ?>" class="inline-block px-4 py-2 rounded-lg bg-teal-600 text-white hover:bg-teal-700 transition text-sm font-medium">
                        Ver todas las clínicas →
                    </a>
                </div>

            <?php elseif(auth()->user()->isAdmin()): ?>
            
            

    <div class="mb-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">
            Bienvenido, <?php echo e(auth()->user()->name); ?>

        </h3>
        <p class="mt-1 text-gray-600 dark:text-gray-300">
            Selecciona un módulo para gestionar tu clínica veterinaria.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <a href="<?php echo e(route('veterinarios.create')); ?>"
           class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 hover:shadow-lg transition">
            <div class="text-4xl mb-3"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
<?php endif; ?></div>
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">
                Veterinarios
            </h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Registrar un nuevo veterinario.
            </p>
            <span class="inline-block mt-4 text-teal-600 dark:text-teal-400 font-semibold">
                Abrir formulario →
            </span>
        </a>

        <a href="<?php echo e(route('citas.create')); ?>"
           class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 hover:shadow-lg transition">
            <div class="text-4xl mb-3"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
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
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">
                Citas
            </h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Programar una cita veterinaria.
            </p>
            <span class="inline-block mt-4 text-teal-600 dark:text-teal-400 font-semibold">
                Crear cita →
            </span>
        </a>

        <a href="<?php echo e(route('clientes.create')); ?>"
           class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 hover:shadow-lg transition">
            <div class="text-4xl mb-3"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-users'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-blue-600 dark:text-blue-400']); ?>
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
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">
                Clientes
            </h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Registrar los propietarios de mascotas.
            </p>
            <span class="inline-block mt-4 text-teal-600 dark:text-teal-400 font-semibold">
                Registrar cliente →
            </span>
        </a>

        <a href="<?php echo e(route('mascotas.create')); ?>"
           class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 hover:shadow-lg transition">
            <div class="text-4xl mb-3"><?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('phosphor-paw-print'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-7 h-7 text-green-600 dark:text-green-400']); ?>
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
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">
                Mascotas
            </h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Registrar una mascota.
            </p>
            <span class="inline-block mt-4 text-teal-600 dark:text-teal-400 font-semibold">
                Registrar mascota →
            </span>
        </a>

    </div>


            <?php elseif(auth()->user()->isVeterinario()): ?>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300">
                        Hola, Dr(a). <strong><?php echo e(auth()->user()->name); ?></strong>. Aquí verás tu agenda de citas del día. (Módulo en construcción)
                    </p>
                </div>

            <?php else: ?>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300">
                        Hola, <strong><?php echo e(auth()->user()->name); ?></strong>. Aquí verás tus mascotas registradas y tus próximas citas.
                    </p>
                </div>
            <?php endif; ?>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ARKANI\resources\views/dashboard.blade.php ENDPATH**/ ?>