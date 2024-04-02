<a href="#" class="p-6 rounded-xl bg-card hover:bg-card/60">
    <div class="h-12 md:h-16">
        <img src="<?php echo e($item->makeThumbnail('70x70',$item->thumbnail)); ?>" class="object-contain w-full h-full"
             alt="<?php echo e($item->title); ?>">
    </div>
    <div class="mt-8 text-xs sm:text-sm lg:text-md font-semibold text-center"><?php echo e($item->title); ?></div>
</a>
<?php /**PATH C:\OSPanel\domains\DiplomaShop\resources\views/catalog/shared/brand.blade.php ENDPATH**/ ?>