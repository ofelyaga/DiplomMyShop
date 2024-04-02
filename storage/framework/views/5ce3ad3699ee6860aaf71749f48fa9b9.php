<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title', env('APP_NAME')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')([ 'resources/css/output.css', 'resources/sass/main.sass', 'resources/js/app.js']); ?>
</head>
<body class="antialiased">
<?php echo $__env->make('shared.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
    <div class="container">
        <div class="text-center">
            <a href="<?php echo e(route('home')); ?>" class="inline-block" rel="home">
                <img src="<?php echo e(Vite::image('logo.svg')); ?>"
                     class="w-[148px] md:w-[201px] h-[36px] md:h-[50px]"
                     alt="CutCode">
            </a>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

</body>
</html>
<?php /**PATH C:\OSPanel\domains\DiplomaShop\resources\views/layouts/auth.blade.php ENDPATH**/ ?>