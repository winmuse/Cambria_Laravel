<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.edit_profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(mix('assets/css/style.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-container">
        <div class="profile bg-white">
            <h1><?php echo e(__('messages.edit_profile')); ?></h1>
            <?php echo Form::open(['id'=>'editProfileForm','files'=>true]); ?>

            <div class="profile__inner m-auto">
                <div class="profile__img-wrapper">
                    <img src="<?php echo e(Auth::user()->photo_url); ?>" alt="" id="upload-photo-img">
                </div>
                <div class="text-center mt-2">
                    <label class="btn profile__update-label"><?php echo e(__('messages.upload_photo')); ?>

                        <input id="upload-photo" class="d-none" name="photo" type="file">
                    </label>
                    <?php if(!empty(Auth::user()->getOriginal('photo_url'))): ?>
                    <label>
                         <button class="btn profile__update-label mb-2 remove-profile-img" >Remove Profile</button>
                    </label>
                    <?php endif; ?>
                </div>
                <div class="alert alert-danger w-100" style="display: none" id="editProfileValidationErrorsBox"></div>
                <div class="form-group bordered-input w-100">
                    <label for="user-name" class="mb-0"><?php echo e(__('messages.name')); ?><span
                                class="profile__required">*</span></label>
                    <input type="text" class="profile__name form-control pl-0" id="user-name"
                           aria-describedby="User name" placeholder="<?php echo e(__('messages.name')); ?>"
                           value="<?php echo e((htmlspecialchars_decode(Auth::user()->name))??''); ?>" name="name" required>
                </div>
                <div class="form-group bordered-input w-100">
                    <label for="email" class="mb-0"><?php echo e(__('messages.email')); ?><span
                                class="profile__required">*</span></label>
                    <input type="email" class="profile__email form-control pl-0" id="email"
                           aria-describedby="User email" placeholder="<?php echo e(__('messages.email')); ?>"
                           value="<?php echo e(Auth::user()->email); ?>" name="email" required>
                </div>
                <!-- <div class="form-group bordered-input w-100">
                    <?php if(Auth::user()->monthly_price): ?>
                        <div class="form-group w-40 float-left">
                            <label for="monthly_price" class="mb-0"><?php echo e(__('messages.monthlyprice')); ?><span
                                        class="profile__required">*</span></label>                    
                            <input type="text" class="profile__email form-control pl-0" id="monthly_price"
                                aria-describedby="User email" placeholder=""
                                value="<?php echo e(Auth::user()->monthly_price); ?>" name="monthly_price"  disabled >
                        </div>                  
                        <div class="form-group w-25 float-right">
                            <label  class="mb-0"><?php echo e(__('messages.contractamount')); ?></label>
                            <input type="text" class="profile__email form-control pl-0" name="contractamount" id="contractamount"                        
                                value="<?php echo e(Auth::user()->contractamount); ?>" disabled>
                        </div>
                        <div class="form-group w-25 float-right">
                            <label  class="mb-0"><?php echo e(__('messages.fee')); ?></label>
                            <input type="text" class="profile__email form-control pl-0" name="fee" id="fee"
                                value="<?php echo e(Auth::user()->fee); ?>" disabled>
                        </div>
                    <?php else: ?>
                        <div class="form-group w-40 float-left">
                            <label for="monthly_price" class="mb-0"><?php echo e(__('messages.monthlyprice')); ?><span
                                        class="profile__required">*</span></label>                    
                            <input type="text" class="profile__email form-control pl-0" id="monthly_price"
                                aria-describedby="User email" placeholder=""
                                value="" name="monthly_price" onkeyup="onCalc()" required >
                        </div>                  
                        <div class="form-group w-25 float-right">
                            <label  class="mb-0"><?php echo e(__('messages.contractamount')); ?></label>
                            <input type="text" class="profile__email form-control pl-0" name="contractamount" id="contractamount"                        
                                value="" >
                        </div>
                        <div class="form-group w-25 float-right">
                            <label  class="mb-0"><?php echo e(__('messages.fee')); ?></label>
                            <input type="text" class="profile__email form-control pl-0" name="fee" id="fee"
                                value="" >
                        </div>
                    <?php endif; ?>
                </div> -->
                <div class="form-group bordered-input w-100">
                    <label for="about"><?php echo e(__('messages.bio')); ?></label> <textarea
                            class="profile__about form-control pl-0" id="about" rows="3"
                            name="about"><?php echo e((htmlspecialchars_decode(Auth::user()->about))??''); ?></textarea>
                </div>
                <div class="form-group bordered-input w-100">
                    <label for="phone" class="mb-0"><?php echo e(__('messages.phone')); ?></label> <input type="tel"
                                                                                              class="profile__phone form-control pl-0"
                                                                                              id="phone"
                                                                                              aria-describedby="User phone no"
                                                                                              placeholder="<?php echo e(__('messages.phone_number')); ?>"
                                                                                              name="phone"
                                                                                              value="<?php echo e(Auth::user()->phone); ?>">
                </div>
                <?php
                    $isSubscribed = Auth::user()->is_subscribed
                ?>
                <div class="form-group w-100">
                    <div class="form-group w-50 float-left">
                        <label><?php echo e(__('messages.group.privacy')); ?></label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="privacyPrivate" name="privacy" value="0"
                                   <?php if(Auth::user()->privacy == 0): ?> checked <?php endif; ?>> <label class="custom-control-label"
                                                                                          for="privacyPrivate">
                                <?php echo e(__('messages.group.private')); ?>

                                <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                   data-toggle="tooltip" data-placement="top" title="Only My Contacts can chat with me"
                                   data-original-title="Only My Contacts can chat with me"></i>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="privacyPublic" name="privacy" value="1"
                                   <?php if(Auth::user()->privacy == 1): ?> checked <?php endif; ?>> <label class="custom-control-label"
                                                                                          for="privacyPublic">
                                <?php echo e(__('messages.group.public')); ?>

                                <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                   data-toggle="tooltip" data-placement="top" title="Anyone can chat with me"
                                   data-original-title="Anyone can chat with me"></i>
                            </label>
                        </div>
                    </div>
                    <div class="form-group w-50 float-right">
                        <label><?php echo e(__('messages.gender')); ?></label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="male" name="gender"
                                   value="<?php echo e(\App\Models\User::MALE); ?>"
                                   <?php if(Auth::user()->gender == \App\Models\User::MALE): ?> checked <?php endif; ?>>
                            <label class="custom-control-label" for="male"><?php echo e(__('messages.male')); ?></label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="female" name="gender"
                                   value="<?php echo e(\App\Models\User::FEMALE); ?>"
                                   <?php if(Auth::user()->gender == \App\Models\User::FEMALE): ?> checked <?php endif; ?>>
                            <label class="custom-control-label" for="female"><?php echo e(__('messages.female')); ?></label>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group bordered-input w-100">
                    <div class="form-group pl-0  d-flex">
                        <?php echo Form::checkbox('is_subscribed',$isSubscribed,$isSubscribed, ['id' => 'webNotification']); ?>

                        &nbsp;<lable for="is_subscribed" class="mb-0">Enable Web Notification</lable>
                    </div>
                </div> -->
                <div class="d-flex w-100">
                    <?php echo Form::button(__('messages.save') , ['type'=>'submit','class' => 'btn profile__update-label mr-2 ml-auto','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> " .__('messages.processing')]); ?>

                    <a class="btn profile__update-label" id="cancelGroupModal"
                        <?php if(Auth::user()->user == 1): ?>
                            href="<?php echo e(url('users_profile')); ?>"><?php echo e(__('messages.cancel')); ?></a>
                        <?php else: ?>
                            href="<?php echo e(url('profile')); ?>"><?php echo e(__('messages.cancel')); ?></a>
                        <?php endif; ?>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!--custom js-->
    <script>
         function onCalc() {             
            var monthly_price = document.getElementById("monthly_price");           
            var fee = document.getElementById("fee");           
            var contractamount = document.getElementById("contractamount");  
            var x = parseFloat(monthly_price.value)* 0.8; 
            var y = parseFloat(monthly_price.value)* 0.2; 
            contractamount.value = x;
            fee.value = y;
           
        }
    </script>
    <script>
        let profileURL = "<?php echo e(route('update.profile')); ?>";
        let removeProfileImage ="<?php echo e(url('remove-profile-image')); ?>";
        <?php if(Auth::user()->user == 1): ?>
            let backprofileURL = "users_profile";
        <?php else: ?>
            let backprofileURL = "profile";
        <?php endif; ?>
    </script>
    <script src="<?php echo e(mix('assets/js/profile.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/home/edit_profile.blade.php ENDPATH**/ ?>