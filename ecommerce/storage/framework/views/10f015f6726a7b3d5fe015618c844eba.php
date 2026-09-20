<?php $__env->startSection('title', 'Admin Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="wrap-login-page ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="<?php echo e(route('login')); ?>" class="auth-logo" aria-label="Mursalin Ecommerce">
            <img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="Mursalin Ecommerce">
        </a>

        <div class="login-box auth-login-box">
            <div class="auth-heading">
                <div class="auth-icon"><i class="icon-lock"></i></div>
                <div>
                    <h3>Welcome back</h3>
                    <div class="body-text">Sign in to manage your ecommerce store</div>
                </div>
            </div>

            <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'success','class' => 'auth-alert','messages' => session('success')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'success','class' => 'auth-alert','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('success'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'error','class' => 'auth-alert','messages' => $errors->all()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error','class' => 'auth-alert','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->all())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

            <form class="form-login flex flex-column gap24" method="POST" action="<?php echo e(route('login.store')); ?>">
                <?php echo csrf_field(); ?>

                <fieldset class="template-field">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input id="email" class="template-input" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email address" autocomplete="email" required>
                </fieldset>

                <fieldset class="template-field password">
                    <label for="password">Password <span class="required">*</span></label>
                    <div class="auth-password-field">
                        <input id="password" class="template-input password-input" type="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                        <button type="button" class="show-pass auth-password-toggle" aria-label="Show password">
                            <i class="icon-eye view"></i>
                            <i class="icon-eye-off hide"></i>
                        </button>
                    </div>
                </fieldset>

                <div class="flex items-center justify-between gap15 flex-wrap">
                    <label class="auth-check">
                        <input type="checkbox" name="remember" value="1">
                        <span>Keep me signed in</span>
                    </label>
                </div>

                <button class="tf-button w-full" type="submit">
                    <i class="icon-log-in"></i>
                    Login
                </button>
            </form>

            <div class="auth-demo-box">
                <div class="text-tiny">Demo Admin Account</div>
                <div class="body-text"><strong>admin@example.com</strong> &nbsp; / &nbsp; <strong>password</strong></div>
            </div>

            <div class="body-text text-center">
                Need a customer account?
                <a href="<?php echo e(route('register')); ?>" class="body-text tf-color">Register Now</a>
            </div>
        </div>
    </div>

    <div class="text-tiny">Copyright © <?php echo e(date('Y')); ?> Mursalin Ecommerce. All rights reserved.</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.auth-password-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = button.closest('.auth-password-field').querySelector('input');
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                button.classList.toggle('active', isPassword);
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.single', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/auth/login.blade.php ENDPATH**/ ?>