<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title><?php echo $__env->yieldContent('title', 'Remos'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animation.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">

    <!-- Font -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/font/fonts.css')); ?>">

    <!-- Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/icon/style.css')); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('assets/images/favicon.png')); ?>">

    <?php echo $__env->yieldContent('style'); ?>
</head>

<body class="body">

    <div id="wrapper">
        <div id="page">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <!-- Javascript -->
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce2\resources\views/admin/layouts/single.blade.php ENDPATH**/ ?>