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
        <span class="ecom-alert-icon" aria-hidden="true">
            <?php switch($type):
                case ('success'): ?>
                    <svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg>
                    <?php break; ?>
                <?php case ('deleted'): ?>
                    <svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6" /></svg>
                    <?php break; ?>
                <?php case ('error'): ?>
                    <svg viewBox="0 0 24 24"><path d="m18 6-12 12M6 6l12 12" /></svg>
                    <?php break; ?>
                <?php case ('warning'): ?>
                    <svg viewBox="0 0 24 24"><path d="M12 9v4m0 4h.01M10.3 3.9 1.8 18.6A1.6 1.6 0 0 0 3.2 21h17.6a1.6 1.6 0 0 0 1.4-2.4L13.7 3.9a2 2 0 0 0-3.4 0Z" /></svg>
                    <?php break; ?>
                <?php default: ?>
                    <svg viewBox="0 0 24 24"><path d="M12 16v-4m0-4h.01M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z" /></svg>
            <?php endswitch; ?>
        </span>
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
        <button type="button" class="ecom-alert-close" data-alert-close aria-label="Close notification">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m18 6-12 12M6 6l12 12" /></svg>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/components/alert.blade.php ENDPATH**/ ?>