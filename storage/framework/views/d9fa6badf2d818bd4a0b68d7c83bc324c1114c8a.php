<div id="create_user_modal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('messages.new_user')); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="form-group col-sm-12">
                <div class="" id="validationErrorsBox"></div>
            </div>
            <?php echo Form::open(['id'=>'createUserForm', 'method' => 'POST']); ?>

            <div class="modal-body">
                <?php echo $__env->make('users.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo Form::close(); ?>

        </div>

    </div>
</div>

<?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/creator_payment/create.blade.php ENDPATH**/ ?>