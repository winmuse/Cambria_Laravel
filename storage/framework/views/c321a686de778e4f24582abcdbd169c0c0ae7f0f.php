<!DOCTYPE html>
<html>
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(getAppName()); ?></title>
    <meta name="description" content="<?php echo e(getAppName()); ?> <?php echo $__env->yieldContent('meta_content'); ?>">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/bootstrap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/coreui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/jquery.toast.min.css')); ?>">

    <?php echo $__env->yieldContent('page_css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="app flex-row align-items-center">
<?php echo $__env->yieldContent('content'); ?>

<!-- CoreUI and necessary plugins-->
<script src="<?php echo e(mix('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/coreui.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/jquery.toast.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/auth-forms.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/custom.js')); ?>"></script>

<?php echo $__env->yieldContent('page_js'); ?>
<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/layouts/auth_layout.blade.php ENDPATH**/ ?>