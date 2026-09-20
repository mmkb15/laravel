<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>
<div class="wrap-login-page sign-up ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="<?php echo e(route('login')); ?>" class="auth-logo" aria-label="Mursalin Ecommerce">
            <img src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="Mursalin Ecommerce">
        </a>

        <div class="login-box auth-login-box">
            <div class="auth-heading">
                <div class="auth-icon"><i class="icon-user-plus"></i></div>
                <div>
                    <h3>Create an account</h3>
                    <div class="body-text">Create a customer account for your ecommerce system</div>
                </div>
            </div>

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

            <form class="form-login flex flex-column gap20" method="POST" action="<?php echo e(route('register.store')); ?>">
                <?php echo csrf_field(); ?>

                <fieldset class="template-field">
                    <label for="register-name">Full Name <span class="required">*</span></label>
                    <input id="register-name" class="template-input" type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter your full name" autocomplete="name" required>
                </fieldset>

                <fieldset class="template-field">
                    <label for="register-email">Email Address <span class="required">*</span></label>
                    <input id="register-email" class="template-input" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email address" autocomplete="email" required>
                </fieldset>

                <fieldset class="template-field">
                    <label for="register-password">Password <span class="required">*</span></label>
                    <input id="register-password" class="template-input" type="password" name="password" placeholder="Minimum 8 characters" autocomplete="new-password" required>
                </fieldset>

                <fieldset class="template-field">
                    <label for="register-password-confirmation">Confirm Password <span class="required">*</span></label>
                    <input id="register-password-confirmation" class="template-input" type="password" name="password_confirmation" placeholder="Repeat your password" autocomplete="new-password" required>
                </fieldset>

                <button class="tf-button w-full" type="submit">
                    <i class="icon-user-plus"></i>
                    Create Account
                </button>
            </form>

            <div class="body-text text-center">
                Already have an account?
                <a href="<?php echo e(route('login')); ?>" class="body-text tf-color">Login Now</a>
            </div>
        </div>
    </div>

    <div class="text-tiny">Copyright © <?php echo e(date('Y')); ?> Mursalin Ecommerce. All rights reserved.</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.single', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/auth/register.blade.php ENDPATH**/ ?>