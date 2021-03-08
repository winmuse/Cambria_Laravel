<div id="edit_user_modal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('messages.edit_user')); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo Form::open(['id'=>'editUserForm', 'method' => 'POST', 'files' => true]); ?>

            <?php echo Form::hidden('id','',['id' => 'edit_user_id']); ?>

            <div class="modal-body">
                <div class="row col-sm-12">
                    <div class="col-sm-12">
                        <div class="alert alert-danger" style="display: none" id="editValidationErrorsBox"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <!-- Name Field -->
                            <div class="form-group col-sm-6">
                                <?php echo Form::label('name', __('messages.full_name') ); ?><span class="red">*</span>
                                <?php echo Form::text('name', null, ['class' => 'form-control', 'id' => 'edit_name', 'required']); ?>

                            </div>

                            <!-- Phone Field -->
                            <div class="form-group col-sm-6">
                                <?php echo Form::label('phone', __('messages.phone') ); ?>

                                <?php echo Form::text('phone', null, ['class' => 'form-control', 'id' => 'edit_phone']); ?>

                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <?php echo Form::label('email', __('messages.email') ); ?><span class="red">*</span>
                            <?php echo Form::email('email', null, ['class' => 'form-control', 'id' => 'edit_email',  'required']); ?>

                        </div>

                        <div class="row">
                            <div class="form-group  col-sm-6">
                                <label><?php echo e(__('messages.gender')); ?></label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="edit_male" name="gender"
                                            value="<?php echo e(\App\Models\User::MALE); ?>"> <label class="custom-control-label"
                                            for="edit_male">
                                        <?php echo e(__('messages.male')); ?>

                                    </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="edit_female" name="gender"
                                           value="<?php echo e(\App\Models\User::FEMALE); ?>"> <label class="custom-control-label"
                                                                                          for="edit_female">
                                        <?php echo e(__('messages.female')); ?>

                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label><?php echo e(__('messages.group.privacy')); ?></label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="editPrivacyPrivate"
                                           name="privacy" value="0"> <label class="custom-control-label"
                                                                            for="editPrivacyPrivate">
                                        <?php echo e(__('messages.group.private')); ?>

                                        <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="All group members can send messages into the group."></i>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="editPrivacyPublic"
                                           name="privacy" value="1"> <label class="custom-control-label"
                                                                            for="editPrivacyPublic">
                                        <?php echo e(__('messages.group.public')); ?>

                                        <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="All group members can send messages into the group."></i>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Bio Field -->
                        <div class="form-group">
                            <?php echo Form::label('bio', __('messages.bio') ); ?>

                            <?php echo Form::textarea('about', null, ['class' => 'form-control user__bio', 'rows' => 3, 'id' => 'edit_about']); ?>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="profile__inner m-auto">
                                <div class="text-center profile__img-wrapper">
                                    <img src="<?php echo e(isset($user->photo_url) ? $user->photo_url : getDefaultAvatar()); ?>"
                                         alt="" id="edit_upload-photo-img">
                                </div>
                                <div class="text-center mt-2 user__upload-btn">
                                    <label class="btn profile__update-label">
                                        <?php echo e(__('messages.upload_photo')); ?>

                                        <input id="edit_upload-photo" class="d-none" name="photo" type="file">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Is Active Field -->
                            <div class="form-group col-sm-6">
                                <?php echo Form::label('is_active', __('messages.is_active') ); ?><span class="red">*</span>
                                <?php echo Form::select('is_active', [1 => 'Active', 0 => 'In Active'], (isset($user->is_active)) ? $user->is_active : [],  ['class' => 'form-control', 'id' => 'edit_is_active',  'required']); ?>

                            </div>

                            <!-- Role Field -->
                            <div class="form-group col-sm-6">
                                <?php echo Form::label('role', __('messages.role') ); ?><span class="red">*</span>
                                <?php echo Form::select('role_id', $roles, (isset($user->role_id)) ? $user->role_id : [],  ['class' => 'form-control','placeholder' => 'Select Role', 'id' => 'edit_role_id']); ?>

                            </div>
                        </div>

                    </div>

                    <!-- Submit Field -->
                    <div class="text-right form-group col-sm-12">
                        <?php echo Form::submit(__('messages.save'), ['class' => 'btn btn-primary', 'id' => 'editBtnSave']); ?>

                        <button type="button" class="btn btn-secondary ml-1"
                                data-dismiss="modal"><?php echo e(__('messages.cancel')); ?></button>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>

    </div>
</div>
<?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/delete_creators/edit.blade.php ENDPATH**/ ?>