<?php $__env->startSection('title'); ?>
    Roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/jquery.toast.min.css')); ?>">
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
                                <?php echo e(__('messages.roles')); ?>

                            </div>
                            <button type="button" class="pull-right btn btn-primary" data-toggle="modal"
                                    data-target="#create_role_modal"><?php echo e(__('messages.new_role')); ?></button>
                        </div>
                        <div class="card-body">
                            <?php echo $__env->make('roles.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="pull-right mr-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('roles.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('roles.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/dataTable.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/jquery.toast.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/custom-datatables.js')); ?>"></script>
    <script>
        let createRoleUrl = '<?php echo e(route('roles.store')); ?>';
        let roleUrl = '<?php echo e(url('roles')); ?>/';
        let token = '<?php echo e(csrf_token()); ?>';
    </script>
    <script src="<?php echo e(mix('assets/js/admin/roles/role.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kitc\Documents\tools\Cambria_Laravel-10-27\Cambria_Laravel\resources\views/roles/index.blade.php ENDPATH**/ ?>