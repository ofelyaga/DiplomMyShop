<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'type'=>'text',
    'isError'=>false,
    'value'=>''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'type'=>'text',
    'isError'=>false,
    'value'=>''
]); ?>
<?php foreach (array_filter(([
    'type'=>'text',
    'isError'=>false,
    'value'=>''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<input type="<?php echo e($type); ?>" value="<?php echo e($value); ?>" <?php echo e($attributes
->class([
    '_is-error' => $isError,
    "w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white/20 focus:border-pink focus:shadow-[0_0_0_2px_#EC4176] outline-none transition text-white placeholder:text-white text-xxs md:text-xs font-semibold"
    ])); ?>

>
<?php /**PATH C:\OSPanel\domains\DiplomaShop\resources\views/components/forms/text-input.blade.php ENDPATH**/ ?>