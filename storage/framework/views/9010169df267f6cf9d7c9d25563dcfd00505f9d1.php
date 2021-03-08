<div id="changePasswordModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('messages.change_password')); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo Form::open(['id'=>'changePasswordForm']); ?>

            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group col-sm-12">
                    <div class="alert alert-danger" style="display: none" id="validationErrorsBox"></div>
                </div>
                <div class="form-group col-sm-12">
                    <?php echo Form::label('password', __('messages.new_password')); ?><span class="red">*</span>
                    <?php echo Form::password('password', ['class' => 'form-control', 'required']); ?>

                </div>
                <div class="form-group col-sm-12">
                    <?php echo Form::label('password_confirmation', __('messages.confirm_password')); ?><span
                            class="red">*</span>
                    <?php echo Form::password('password_confirmation', ['class' => 'form-control', 'required']); ?>

                </div>
                <div class="text-right form-group col-sm-12">
                    <?php echo Form::button(__('messages.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnCreateSave','data-loading-text'=>"<i class='fa fa-refresh fa-spin'></i> " .__('messages.processing')]); ?>

                    <button type="button" id="cancelPasswordModalBtn" class="btn btn-secondary close_create_role ml-1"
                            data-dismiss="modal"><?php echo e(__('messages.cancel')); ?>

                    </button>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\kitc\Documents\tools\Cambria_Laravel-10-27\Cambria_Laravel\resources\views/layouts/change_password.blade.php ENDPATH**/ ?>