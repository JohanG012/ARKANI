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
                        Bienvenido, <strong><?php echo e(auth()->user()->name); ?></strong>. Desde aquí gestionas veterinarios, clientes y citas de tu clínica.
                    </p>
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