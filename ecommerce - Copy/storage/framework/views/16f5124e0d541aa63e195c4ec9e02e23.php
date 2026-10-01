<div class="header-dashboard">
    <div class="wrap">
        <div class="header-left">
            <a href="<?php echo e(route('dashboard')); ?>">
                <img id="logo_header_mobile" alt="Mursalin Ecommerce" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>"
                     data-light="<?php echo e(asset('assets/images/logo/logo.png')); ?>"
                     data-dark="<?php echo e(asset('assets/images/logo/logo-dark.png')); ?>">
            </a>
            <div class="button-show-hide"><i class="icon-menu-left"></i></div>
            <form class="form-search flex-grow" action="<?php echo e(route('products.index')); ?>" method="GET">
                <fieldset class="name">
                    <input type="text" placeholder="Search products or SKU..." class="show-search" name="search" value="<?php echo e(request('search')); ?>">
                </fieldset>
                <div class="button-submit"><button type="submit"><i class="icon-search"></i></button></div>
            </form>
        </div>

        <div class="header-grid">
            <div class="header-item button-dark-light"><i class="icon-moon"></i></div>

            <div class="popup-wrap noti type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <span class="header-item"><i class="icon-bell"></i></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content">
                        <li><h6>Notifications</h6></li>
                        <li>
                            <div class="noti-item w-full wg-user active">
                                <div class="image"><img src="<?php echo e(asset('assets/images/avatar/user-11.png')); ?>" alt=""></div>
                                <div class="flex-grow">
                                    <div class="body-title">Admin Panel</div>
                                    <div class="text-tiny">Manage products, orders and customers from one place.</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="popup-wrap user type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <span class="header-user wg-user">
                            <span class="image"><img src="<?php echo e(auth()->user()->image_url); ?>" alt="<?php echo e(auth()->user()->name); ?>"></span>
                            <span class="flex flex-column">
                                <span class="body-title mb-2"><?php echo e(auth()->user()->name); ?></span>
                                <span class="text-tiny"><?php echo e(ucfirst(auth()->user()->role)); ?></span>
                            </span>
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content">
                        <li><a href="<?php echo e(route('profile')); ?>" class="user-item"><div class="icon"><i class="icon-user"></i></div><div class="body-title-2">Profile</div></a></li>
                        <li><a href="<?php echo e(route('reports.index')); ?>" class="user-item"><div class="icon"><i class="icon-pie-chart"></i></div><div class="body-title-2">Reports</div></a></li>
                        <li>
                            <form action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="user-item w-full" type="submit" style="border:0;background:transparent;text-align:left;">
                                    <div class="icon"><i class="icon-log-out"></i></div><div class="body-title-2">Log out</div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>