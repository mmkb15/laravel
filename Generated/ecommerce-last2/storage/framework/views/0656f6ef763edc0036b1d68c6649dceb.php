<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>User List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Users</div></li>
            </ul>
        </div>
        <a class="tf-button" href="<?php echo e(route('users.create')); ?>"><i class="icon-plus"></i>Add User</a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="<?php echo e(route('users.index')); ?>">
                <input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search user or email...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count"><?php echo e($users->total()); ?> user(s)</div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-user-table">
                <div class="ecom-table-head">
                    <div class="cell">User</div>
                    <div class="cell">Email</div>
                    <div class="cell">Phone</div>
                    <div class="cell">Role</div>
                    <div class="cell cell-right">Action</div>
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-user-cell">
                                <div class="ecom-thumb user"><img src="<?php echo e($user->image_url); ?>" alt="<?php echo e($user->name); ?>"></div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate"><?php echo e($user->name); ?></div>
                                    <div class="ecom-muted">#<?php echo e($user->id); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="cell text-truncate"><?php echo e($user->email); ?></div>
                        <div class="cell"><?php echo e($user->phone ?: '—'); ?></div>
                        <div class="cell"><span class="ecom-status <?php echo e($user->role === 'admin' ? 'processing' : ''); ?>"><?php echo e(ucfirst($user->role)); ?></span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="<?php echo e(route('users.edit', $user)); ?>" class="item edit" title="Edit user"><i class="icon-edit-3"></i></a>
                                <?php if($user->id !== auth()->id()): ?>
                                    <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST" onsubmit="return confirm('Delete this user?');">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="item trash" title="Delete user"><i class="icon-trash-2"></i></button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="ecom-empty">No users found.</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="ecom-pagination"><?php echo e($users->onEachSide(1)->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/user/index.blade.php ENDPATH**/ ?>