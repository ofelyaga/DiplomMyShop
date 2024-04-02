<?php if(!is_null($message=Session::flash('message')?->get())): ?>
    <div class="<?php echo e($message->class()); ?> p-5">
        <?php echo e($message->message()); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\OSPanel\domains\DiplomaShop\resources\views/shared/flash.blade.php ENDPATH**/ ?>