<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.reported_user')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/dataTable.min.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/admin_panel.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid page__container">
        <div class="animated fadeIn">
             <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <div class="pull-left page__heading">
                                 <?php echo e(__('messages.reported_user')); ?>

                             </div>
                         </div>
                         <div class="card-body">
                             <?php echo $__env->make('reported_users.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         </div>
                     </div>
                  </div>
             </div>
            <?php echo $__env->make('reported_users.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('reported_users.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/dataTable.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let reportedUsersUrl = "<?php echo e(route('reported-users.index')); ?>";
        let usersUrl = "<?php echo e(url('users')); ?>";
        let defaultImageAvatar = "<?php echo e(getDefaultAvatar()); ?>/";
    </script>
    <script src="<?php echo e(mix('assets/js/admin/reported_users/reported_users.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/custom-datatables.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kitc\Documents\tools\Cambria_Laravel-10-27\Cambria_Laravel\resources\views/reported_users/index.blade.php ENDPATH**/ ?>