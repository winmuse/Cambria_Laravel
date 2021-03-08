<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.monthly_subscription_list')); ?>

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
                         <div class="card-header page-header">
                             <div class="pull-left page__heading">
                                 <?php echo e(__('messages.monthly_subscription_list')); ?>

                             </div>
                             <div class="filter-container">
                                 <div class="mr-2">
                                     <?php echo Form::select('drp_users', \App\Models\User::FILTER_ARRAY, \App\Models\User::FILTER_ALL, ['id' => 'filter_user','class'=>'form-control','style'=>'min-width:150px;']); ?>

                                 </div>
                                 <button type="button" class="pull-right btn btn-primary filter-container__btn" data-toggle="modal" data-target="#create_user_modal"><?php echo e(__('messages.new_user')); ?></button>
                             </div>
                         </div>
                         <div class="card-body">
                             <?php echo $__env->make('monthly_subscriptions.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
    <?php echo $__env->make('users.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('users.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('users.templates.action_icons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/dataTable.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        let createUserUrl = "<?php echo e(route('monthly_subscriptions.store')); ?>";
        let usersUrl = "<?php echo e(url('monthly_subscriptions')); ?>/";
        let defaultImageAvatar = "<?php echo e(getDefaultAvatar()); ?>/";
    </script>
    <script src="<?php echo e(mix('assets/js/admin/monthly_subscriptions/monthly_subscriptions.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/admin/monthly_subscriptions/edit_user.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/custom-datatables.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/monthly_subscriptions/index.blade.php ENDPATH**/ ?>