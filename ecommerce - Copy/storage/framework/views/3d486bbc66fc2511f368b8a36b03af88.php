<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'info',
    'messages' => [],
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'type' => 'info',
    'messages' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $items = is_array($messages) ? $messages : [$messages];
    $items = array_values(array_filter($items, static fn ($message) => filled($message)));
?>

<?php if(count($items)): ?>
    <div <?php echo e($attributes->merge(['class' => 'ecom-alert ecom-alert-'.$type])); ?> role="alert">
        <div class="ecom-alert-body">
            <?php if(count($items) === 1): ?>
                <p class="ecom-alert-text"><?php echo e($items[0]); ?></p>
            <?php else: ?>
                <ul class="ecom-alert-list">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($message); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
        <button type="button" class="ecom-alert-close" data-alert-close aria-label="Close">&times;</button>
    </div>
<?php endif; ?>
<?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/components/alert.blade.php ENDPATH**/ ?>