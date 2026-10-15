<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Registra tu veterinaria en ARKANI</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
            Crea la cuenta de tu clínica y tu perfil de administrador en un solo paso.
        </p>
    </div>

    <form method="POST" action="<?php echo e(route('clinica.register')); ?>" class="space-y-6">
        <?php echo csrf_field(); ?>

        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-teal-600 dark:text-teal-400 mb-4">
                Datos de tu clínica
            </h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de la clínica</label>
                    <input type="text" name="clinica_nombre" value="<?php echo e(old('clinica_nombre')); ?>" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    <?php $__errorArgs = ['clinica_nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dirección</label>
                    <input type="text" name="clinica_direccion" value="<?php echo e(old('clinica_direccion')); ?>" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                        <input type="text" name="clinica_telefono" value="<?php echo e(old('clinica_telefono')); ?>" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email de contacto</label>
                        <input type="email" name="clinica_email" value="<?php echo e(old('clinica_email')); ?>" class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
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
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                        <input type="password" name="password" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" required class="mt-1 block w-full rounded-lg border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-4">
            <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-500 dark:text-gray-400 underline">
                ¿Ya tienes cuenta? Inicia sesión
            </a>
            <button type="submit" class="px-6 py-2 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700">
                Registrar mi clínica
            </button>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\ARKANI\resources\views/auth/registrar-clinica.blade.php ENDPATH**/ ?>