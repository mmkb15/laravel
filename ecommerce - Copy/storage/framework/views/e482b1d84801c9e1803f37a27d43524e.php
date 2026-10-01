<?php $__env->startSection('title', '404 - Page Not Found'); ?>

<?php $__env->startSection('content'); ?>
<div class="wrap-login-page ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="<?php echo e(route('login')); ?>" class="auth-logo" aria-label="Mursalin Ecommerce">
            <img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="Mursalin Ecommerce">
        </a>

        <div class="login-box">
            <div class="box-404 ecom-404-box">
                <div class="ecom-404-illustration" aria-hidden="true">
                    <div class="ecom-404-circle">404</div>
                    <div class="ecom-404-card">
                        <i class="icon-file"></i>
                        <span></span>
                        <span></span>
                        <span class="short"></span>
                    </div>
                </div>

                <h3>Oops! Page not found</h3>
                <div class="body-text">The page you are looking for does not exist, has been moved, or is temporarily unavailable.</div>

                <div class="auth-box-actions">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('dashboard')); ?>" class="tf-button">Go to Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="tf-button">Go to Login</a>
                    <?php endif; ?>
                    <a href="javascript:history.back()" class="tf-button style-2">Go Back</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-tiny">© <?php echo e(date('Y')); ?> | All Rights Reserved. Developed by Mustafa Mursalin Khan (1295365) (WDPF Round-70) as an assignment of ISDB-BISEW IT Scholarship Programme</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.single', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/errors/404.blade.php ENDPATH**/ ?>