<div class="section-menu-left">
    <div class="box-logo">
        <a href="<?php echo e(route('dashboard')); ?>" id="site-logo-inner">
            <img id="logo_header" alt="Mursalin Ecommerce" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>"
                 data-light="<?php echo e(asset('assets/images/logo/logo.png')); ?>"
                 data-dark="<?php echo e(asset('assets/images/logo/logo-dark.png')); ?>">
        </a>
        <div class="button-show-hide"><i class="icon-menu-left"></i></div>
    </div>

    <div class="section-menu-left-wrap">
        <div class="center">
            <div class="center-item">
                <div class="center-heading">Main Home</div>
                <ul class="menu-list">
                    <li class="menu-item <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('dashboard')); ?>" class="menu-item-button">
                            <div class="icon"><i class="icon-grid"></i></div>
                            <div class="text">Dashboard</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="center-item">
                <div class="center-heading">Catalog</div>
                <ul class="menu-list">
                    <li class="menu-item has-children <?php echo e(request()->is('products*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-shopping-cart"></i></div>
                            <div class="text">Products</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('products.create') ? 'active' : ''); ?>" href="<?php echo e(route('products.create')); ?>"><div class="text">Add Product</div></a></li>
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('products.index') ? 'active' : ''); ?>" href="<?php echo e(route('products.index')); ?>"><div class="text">Product List</div></a></li>
                        </ul>
                    </li>
                    <li class="menu-item has-children <?php echo e(request()->is('categories*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-layers"></i></div>
                            <div class="text">Categories</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('categories.index') ? 'active' : ''); ?>" href="<?php echo e(route('categories.index')); ?>"><div class="text">Category List</div></a></li>
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('categories.create') ? 'active' : ''); ?>" href="<?php echo e(route('categories.create')); ?>"><div class="text">New Category</div></a></li>
                        </ul>
                    </li>
                    <li class="menu-item has-children <?php echo e(request()->is('brands*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-box"></i></div>
                            <div class="text">Brands</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('brands.index') ? 'active' : ''); ?>" href="<?php echo e(route('brands.index')); ?>"><div class="text">Brand List</div></a></li>
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('brands.create') ? 'active' : ''); ?>" href="<?php echo e(route('brands.create')); ?>"><div class="text">Add Brand</div></a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="center-item">
                <div class="center-heading">Sales</div>
                <ul class="menu-list">
                    <li class="menu-item has-children <?php echo e(request()->is('orders*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-file-plus"></i></div>
                            <div class="text">Orders</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('orders.index') ? 'active' : ''); ?>" href="<?php echo e(route('orders.index')); ?>"><div class="text">Order List</div></a></li>
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('orders.create') ? 'active' : ''); ?>" href="<?php echo e(route('orders.create')); ?>"><div class="text">Create Order</div></a></li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo e(request()->is('reports*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('reports.index')); ?>" class="menu-item-button">
                            <div class="icon"><i class="icon-pie-chart"></i></div>
                            <div class="text">Reports</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="center-item">
                <div class="center-heading">Management</div>
                <ul class="menu-list">
                    <li class="menu-item has-children <?php echo e(request()->is('users*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-user"></i></div>
                            <div class="text">Users</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('users.index') ? 'active' : ''); ?>" href="<?php echo e(route('users.index')); ?>"><div class="text">All Users</div></a></li>
                            <li class="sub-menu-item"><a class="<?php echo e(request()->routeIs('users.create') ? 'active' : ''); ?>" href="<?php echo e(route('users.create')); ?>"><div class="text">Add New User</div></a></li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo e(request()->routeIs('profile*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('profile')); ?>" class="menu-item-button">
                            <div class="icon"><i class="icon-settings"></i></div>
                            <div class="text">Profile</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>