<div class="section-menu-left">
    <div class="box-logo">
        <a href="<?php echo e(url('/')); ?>" id="site-logo-inner">
            <img class="" id="logo_header" alt="" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" data-light="<?php echo e(asset('assets/images/logo/logo.png')); ?>" data-dark="<?php echo e(asset('assets/images/logo/logo-dark.png')); ?>">
        </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>
    <div class="section-menu-left-wrap">
        <div class="center">
            <!-- Main Home -->
            <div class="center-item">
                <ul class="menu-list">
                    <li class="menu-item <?php echo e(request()->is('/') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/')); ?>" class="menu-item-button">
                            <div class="icon"><i class="icon-grid"></i></div>
                            <div class="text">Dashboard</div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- All Pages -->
            <div class="center-item">
                <ul class="menu-list">
                    <!-- Products -->
                    <li class="menu-item has-children <?php echo e(request()->is('products*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-shopping-cart"></i></div>
                            <div class="text">Products</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/products/create')); ?>">
                                    <div class="text">Add Product</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/products')); ?>">
                                    <div class="text">Product List</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Category -->
                    <li class="menu-item has-children <?php echo e(request()->is('categories*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-layers"></i></div>
                            <div class="text">Category</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/categories')); ?>">
                                    <div class="text">Category List</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/categories/create')); ?>">
                                    <div class="text">New Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Attributes -->
                    <li class="menu-item has-children <?php echo e(request()->is('attributes*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-box"></i></div>
                            <div class="text">Attributes</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/attributes')); ?>">
                                    <div class="text">Attributes List</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/attributes/create')); ?>">
                                    <div class="text">Add Attribute</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Order -->
                    <li class="menu-item has-children <?php echo e(request()->is('orders*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-file-plus"></i></div>
                            <div class="text">Order</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/orders')); ?>">
                                    <div class="text">Order List</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/orders/tracking')); ?>">
                                    <div class="text">Order Tracking</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- User -->
                    <li class="menu-item has-children <?php echo e(request()->is('users*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-user"></i></div>
                            <div class="text">User</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/users')); ?>">
                                    <div class="text">All Users</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/users/create')); ?>">
                                    <div class="text">Add New User</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Roles -->
                    <li class="menu-item has-children <?php echo e(request()->is('roles*') ? 'active' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-user-plus"></i></div>
                            <div class="text">Roles</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/roles')); ?>">
                                    <div class="text">All Roles</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="<?php echo e(url('/roles/create')); ?>">
                                    <div class="text">Create Role</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Gallery -->
                    <li class="menu-item <?php echo e(request()->is('gallery*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/gallery')); ?>">
                            <div class="icon"><i class="icon-image"></i></div>
                            <div class="text">Gallery</div>
                        </a>
                    </li>

                    <!-- Report -->
                    <li class="menu-item <?php echo e(request()->is('reports*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/reports')); ?>">
                            <div class="icon"><i class="icon-pie-chart"></i></div>
                            <div class="text">Report</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

   
    </div>
</div><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce-old\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>