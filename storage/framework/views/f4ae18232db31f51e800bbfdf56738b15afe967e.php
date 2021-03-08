<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
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
                                <?php echo e(__('messages.settings')); ?>

                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $__env->make('coreui-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('settings.update')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group row col-sm-12">
                                    <div class="col-sm-6">
                                        <!-- App Name Field -->
                                        <div class="form-group col-sm-12">
                                            <?php echo Form::label('app_name', __('messages.app_name') ); ?><span class="red">*</span>
                                            <?php echo Form::text('app_name', $settings['app_name'] ?? '', ['class' => 'form-control', 'required']); ?>

                                        </div>
                                        <!-- Company Name Field -->
                                        <div class="form-group col-sm-12">
                                            <?php echo Form::label('company_name', __('messages.company_name') ); ?><span class="red">*</span>
                                            <?php echo Form::text('company_name', $settings['company_name'] ?? '', ['class' => 'form-control', 'required']); ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group mt-2">
                                            <div class="profile__logo-img-wrapper">
                                                <img src="<?php echo e($settings['logo_url'] ?? asset('assets/images/logo.png')); ?>"
                                                     alt="" id="logo-img">
                                            </div>
                                            <div class="mt-2 user__upload-btn">
                                                <label class="btn profile__update-label">
                                                    <?php echo e(__('messages.upload_logo')); ?>

                                                    <input id="logo_upload" class="d-none" name="app_logo" type="file">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group mt-2">
                                            <div class="profile__favicon-img-wrapper">
                                                <img src="<?php echo e($settings['favicon_url'] ?? asset('assets/images/logo-30x30.png')); ?>"
                                                     alt="" id="favicon-img">
                                            </div>
                                            <div class="mt-2 user__upload-btn">
                                                <label class="btn profile__update-label">
                                                    <?php echo e(__('messages.upload_favicon')); ?>

                                                    <input id="favicon_upload" class="d-none" name="favicon_logo"
                                                           type="file">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Is Active Field -->
                                        <div class="form-group col-sm-12">
                                            <div class=""><label><?php echo e(__('messages.enable_group_chat')); ?></label></div>
                                            <label class="switch switch-label switch-outline-primary-alt">
                                                <input name="enable_group_chat" class="switch-input enable_group_chat"
                                                       type="checkbox" value="1" <?php echo e($enabledGroupChat); ?>>
                                                <span class="switch-slider" data-checked="&#x2713;"
                                                      data-unchecked="&#x2715;"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="reset"
                                            class="btn btn-secondary pull-right"><?php echo e(__('messages.cancel')); ?></button>
                                    <button type="submit"
                                            class="btn btn-primary pull-right mr-1"><?php echo e(__('messages.save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
    </script>
    <script src="<?php echo e(mix('assets/js/admin/users/edit_user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/settings/index.blade.php ENDPATH**/ ?>