<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_content'); ?>
    - <?php echo e(__('messages.register')); ?> <?php echo e(__('messages.to')); ?> <?php echo e(getAppName()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style_custom.css')); ?>"> 
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <form method="post" action="<?php echo e(url('/register')); ?>" id="registerForm">
                        <?php echo e(csrf_field()); ?>

                        <h2><?php echo e(__('messages.register')); ?></h2>
                        <p class="text-muted"><?php echo e(__('messages.create_your_account')); ?></p>                      
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-user"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control <?php echo e($errors->has('name')?'is-invalid':''); ?>" name="name" value="<?php echo e(old('name')); ?>"
                                   placeholder="<?php echo e(__('messages.full_name')); ?>" id="name">
                            <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control <?php echo e($errors->has('email')?'is-invalid':''); ?>"
                                   name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('messages.email')); ?>"
                                   id="email">
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" class="form-control <?php echo e($errors->has('password')?'is-invalid':''); ?>"
                                   name="password" placeholder="<?php echo e(__('messages.password')); ?>" id="password"
                                   onkeypress="return avoidSpace(event)">
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="<?php echo e(__('messages.confirm_password')); ?>" id="password_confirmation" onkeypress="return avoidSpace(event)">
                            <?php if($errors->has('password_confirmation')): ?>
                                <span class="help-block">
                                  <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                               </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-sm-6">                              
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="editUser"
                                           name="user" value="1" checked> 
                                    <label class="custom-control-label" for="editUser" > 
                                        <?php echo e(__('messages.user')); ?>  
                                        <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="All group members can send messages into the group."></i>                               
                                    </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="editCreater"
                                           name="user" value="2"> 
                                    <label class="custom-control-label"   for="editCreater">
                                        <?php echo e(__('messages.creater')); ?>  
                                        <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="All group members can send messages into the group."></i>                                     
                                    </label>
                                </div>
                        </div>
                        <div class="input-group mb-4" id="twitter_input" style="display:none;">
                             <div class="col-md-5">
                             <p class="text-muted"><?php echo e(__('messages.twitter_link')); ?>: </p>
                            </div>
                            <input type="text"  class="form-control"   name="twitter_link" id="twitter_link">  
                                                  
                        </div>
                        <div class="input-group mb-4" id="instagram_input" style="display:none;">
                            <div class="col-md-5">
                                <p class="text-muted"><?php echo e(__('messages.instagram_link')); ?>: </p>
                            </div>
                            <input type="text"  class="form-control"  name="instagram_link" id="instagram_link">                          
                        </div>
                        <div class="input-group mb-4" id="youtube_input" style="display:none;">
                             <div class="col-md-5">
                                <p class="text-muted"><?php echo e(__('messages.youtube_link')); ?>: </p>
                            </div>                            
                            <input type="text"  class="form-control"  name="youtube_link" id="youtube_link">                          
                        </div>
                        <button type="button" id="registerBtn"
                                class="btn button button-primary button-pipaluk button-circle mt-2"><?php echo e(__('messages.register')); ?></button>
                        <a href="<?php echo e(url('/login')); ?>" class="text-center"><?php echo e(__('messages.already_have_membership')); ?></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>    
<script> 
  $("#editUser") 
        .change(function(){
        if( $(this).is(":checked") ){
            var val = $(this).val();            
             if(val=="1"){
                $("#twitter_input").hide(); 
                $("#instagram_input").hide();  
                $("#youtube_input").hide();  
             }
                        
        }
    });  
    $("#editCreater") 
        .change(function(){
        if( $(this).is(":checked") ){
            var val = $(this).val();         
             if(val=="2"){
                $("#twitter_input").show(); 
                $("#instagram_input").show();  
                $("#youtube_input").show();   
             }
                        
        }
    });
  
</script> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/auth/register.blade.php ENDPATH**/ ?>