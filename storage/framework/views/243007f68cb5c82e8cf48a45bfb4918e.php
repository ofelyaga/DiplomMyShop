<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title', env('APP_NAME')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')([ 'resources/css/app.css', 'resources/sass/main.sass', 'resources/js/app.js']); ?>
</head>
<body class="antialiased">
<?php echo $__env->make('shared.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="py-16 lg:py-20">
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>
<?php echo $__env->make('shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
<?php /**PATH C:\OSPanel\domains\DiplomaShop\resources\views/layouts\app.blade.php ENDPATH**/ ?>