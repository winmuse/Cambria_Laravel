<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_content'); ?>
    - <?php echo e(__('messages.login')); ?> <?php echo e(__('messages.to')); ?> <?php echo e(getAppName()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style_custom.css')); ?>"> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card-group"> 
                <div class="card p-4">
                    <div class="card-body">
                        <?php if(Session::has('error')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
                        <?php endif; ?>
                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                        <?php endif; ?>
                      
                        <form method="post" action="<?php echo e(url('/login')); ?>" id="loginForm">
                            <?php echo e(csrf_field()); ?>

                            <!-- <h2><?php echo e(__('messages.login')); ?></h2> -->
                            <a href="/" aria-current="page" class="router-link-exact-active router-link-active">
								<img src="<?php echo e(asset('assets/images/logo-default-191x52.png')); ?>" width="237" height="59"></img>
							</a>
                            <p class="text-muted"><?php echo e(__('messages.sign up to make money and interact with your fans!')); ?></p>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <button class="btn button button-primary button-pipaluk button-circle mt-2  text-center">
                                        <a href="<?php echo e(url('/login/google')); ?>" ><i class="fa fa-twitter"></i> Sign Up / Login with Twitter</a>
                                    </button>
                                    <button class="btn button button-primary button-pipaluk button-circle mt-2 text-center">
                                        <a href="<?php echo e(url('/login/facebook')); ?>"><i class="fa fa-google"></i> Sign Up / Login with Google</a>
                                    </button>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-envelope"></i>
                                    </span>
                                    </div>
                                    <input type="email" class="form-control <?php echo e($errors->has('email')?'is-invalid':''); ?>"
                                           name="email" value="<?php echo e(old('email')); ?>"
                                           placeholder="<?php echo e(__('messages.email')); ?>"
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
                                      <i class="fa fa-lock lock-icon-size"></i>
                                    </span>
                                    </div>
                                    <input type="password"
                                           class="form-control <?php echo e($errors->has('password')?'is-invalid':''); ?>"
                                           placeholder="<?php echo e(__('messages.password')); ?>" name="password" id="password"
                                           onkeypress="return avoidSpace(event)">
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback">
                                       <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class=" col-6 mb-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> <?php echo e(__('messages.remember_me')); ?>

                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                            <a class="btn btn-link px-0" href="<?php echo e(url('/password/reset')); ?>">
                                                <?php echo e(__('messages.forgot_password?')); ?>

                                            </a>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-12  text-center">
                                        <button class="btn button button-primary button-pipaluk button-circle mt-2" type="button"
                                                style="color:#000" id="loginBtn"><?php echo e(__('messages.login')); ?></button>
                                    </div>                                                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a class="btn button button-primary button-pipaluk button-circle mt-2"   style="color:#000"  href="<?php echo e(url('/register')); ?>"><?php echo e(__('messages.register_now!')); ?></a>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>