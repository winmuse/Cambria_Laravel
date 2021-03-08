<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(mix('assets/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/style_custom.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('assets/css/upload.css')); ?>">   
<link rel="stylesheet" href="<?php echo e(asset('assets/css/inter.css')); ?>"> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom">
          <div class="container">            
          </div>
          <div class="box-position" style="background-image: url(assets/images/slider/slider1.jpg);"></div>
        </div>
      </section>
    <section class="section section-xl section-fluid bg-default"> 
        <div class="container-fluid">         
            <div class="row row-sm row-200 justify-content-center">
                <div class="col-lg-8 col-xl-1">
                  
                </div>
                <div class="col-lg-8 col-xl-2">
                    <div class="media chat-name align-items-right text-truncate">
                        <div class="avatar avatar-online d-none d-sm-inline-block mr-3">
                            <img src="<?php echo e(Auth::user()->photo_url); ?>" alt="">
                        </div>

                        <div class="media-body align-self-center ">
                        <img src="<?php echo e(Auth::user()->photo_url); ?>" alt="" class="img-avatar" width="60" height="60" /> <?php echo e((htmlspecialchars_decode(Auth::user()->name))??''); ?>

                            <h6 class="text-muted">https://Cambria.com</h6>
                        </div>
                    </div>  
                    <div class="media-body align-self-center ">
                        <h6 class="text-truncate mb-0">Show less</h6>
                        <h6 class="text-muted"></h6>
                    </div>                 
                </div>
                <div class="col-lg-8 col-xl-4">
                
                 </div>
                <div class="col-lg-8 col-xl-4">
                   <a href="<?php echo e(url('/edit_profile')); ?>"><button class="btn button button-primary button-pipaluk button-circle mt-2" style="width:150px; height:40px;"> Edit Profile</button></a>
                </div>
                <div class="col-lg-8 col-xl-2">
                  
                 </div>
            </div>
        </div>
    </section>
      <!-- Tabs-->
      <section class="section  section-first bg-default text-md-left">
        <div class="container">
          <div class="row row-70 justify-content-center">
            <div class="col-lg-8 col-xl-5">
              <h3></h3>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-vertical tabs-line" id="tabs-1">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-1" data-toggle="tab"><i class="fa fa-bell"></i>&nbsp;&nbsp;Main Profile</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab"><i class="fa fa-bell"></i>&nbsp;&nbsp;Notification</a></li>
                  <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab"><i class="fa fa-university"></i>&nbsp;&nbsp;Add bank account</a></li> -->
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3"  data-toggle="tab"><i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp;&nbsp; Credit Card Register</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab"><i class="fa fa-bell"></i>&nbsp;&nbsp; Notification Setting</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-5" data-toggle="tab"><i class="fa fa-commenting"></i>&nbsp;&nbsp;Contact</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-6" data-toggle="tab"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;&nbsp;F&A</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-7" data-toggle="tab"><i class="fa fa-wpforms" aria-hidden="true"></i>&nbsp;&nbsp;Terms pf service</a></li>
                  <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-8" data-toggle="tab"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Log out</a></li> -->
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-8" data-toggle="tab" onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Log out</a></li>                  
                  <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                  </form>
                </ul> 
               
              </div>
            </div>
            <div class="col-lg-8 col-xl-7">
              <div class="tab-content">
              <h3></h3>
              <!-- Bootstrap tabs-->
                  <div class="tabs-custom  tab-pane fade show tabs-horizontal tabs-line active" id="tabs-1-1">
                    <!-- Nav tabs-->
                    <!-- <ul class="nav nav-tabs">                 
                      <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-2-1" data-toggle="tab">Info</a></li>
                    </ul> -->
                    <!-- Tab panes-->
                    <div class="tab-content">                 
                      <div class="tab-pane fade show active" id="tabs-2-1">                    
                            <section class="section section-xl  bg-default text-md-left">
                                <div class="container">
                                  <div class="row row-10 justify-content-center">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                      <!-- Post Aria-->
                                      <article class="post post-aria-4">
                                      <a href="#" data-toggle="modal" data-target="#follow_list" class="header__link">
                                        <h5><?php echo e($follow); ?></h5>
                                        </a>
                                      </article>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                      <!-- Post Aria-->
                                      <article class="post post-aria-4">
                                        <a href="#" data-toggle="modal" data-target="#subscribe_list" class="header__link">
                                          <h5><?php echo e($subscribe); ?></h5> 
                                        </a>
                                      </article>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <article class="post post-aria-4">                                   
                                        <a href="#" data-toggle="modal" data-target="#paid_list" class="header__link">
                                          <h5>¥<?php echo e($paid); ?></h5> 
                                        </a> 
                                        </article>
                                    </div>                                
                                </div>
                            </section> 
                            <section class="section section-xl  bg-default text-md-left">
                                <div class="container">
                                  <div class="row row-10 justify-content-center">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                      <!-- Post Aria-->
                                      <article class="post post-aria-4">
                                        <h5>Free</h5>
                                      </article>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                      <!-- Post Aria-->
                                      <article class="post post-aria-4">
                                        <h5>Subscribe</h5> 
                                      </article>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <article class="post post-aria-4">
                                            <h5>Monthly/</h5> 
                                        </article>
                                    </div>                                
                                </div>
                            </section> 
                      </div>
                    </div>
                  </div>
                <?php if(sizeof($card_info)>0): ?>
                  <div class="tabs-custom tab-pane fade tabs-horizontal tabs-line" id="tabs-1-3">  
                    <!-- <?php echo Form::open(['id'=>'editProfileForm','files'=>true]); ?> -->
                    <?php $__currentLoopData = $card_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="row">
                        <div class="col-md-2"></div>
                          <div class="col-md-8">
                              <input type="hidden"  id="user_id"                                        
                                         name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="card_number" class="mb-0"><?php echo e(__('messages.card_number')); ?><span
                                              class="profile__required">*</span></label>
                                      <input type="text" class="profile__name form-control pl-0" id="card_number"
                                        aria-describedby=""  value="<?php echo e($card->card_number); ?>" name="card_number"  disabled>
                                    <img src="<?php echo e(asset('assets/images/card_image.png')); ?>" alt="" class="img-fluid user-about-image"> 
                                </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                  <div class="row">
                                    <label class="mb-0"><?php echo e(__('messages.validity_period')); ?>

                                      <span class="profile__required">*</span>
                                    </label> 
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="row">                                        
                                        <?php if($card->expiration_month): ?>
                                        <input type="text" class="profile__name form-control pl-0" value="<?php echo e($card->expiration_month); ?>" style="width: 120px;" disabled>
                                       
                                        <?php endif; ?>
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;Month</label>
                                      </div>
                                      <div class="row">
                                        <?php if($card->expiration_year): ?>
                                        <input type="text" class="profile__name form-control pl-0" value="<?php echo e($card->expiration_year); ?>" style="width: 120px;" disabled>
                                 
                                        <?php endif; ?>
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;&nbsp;Year</label>
                                      </div>
                                    </div>                                     
                                  </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="securitycode" class="mb-0"><?php echo e(__('messages.securitycode')); ?>(CVC)<span
                                              class="profile__required">*</span></label>  
                                    <?php if($card->cvc_number): ?>
                                        <input type="text" class="profile__name form-control pl-0" value="<?php echo e($card->cvc_number); ?>"  disabled>
                                   
                                    <?php endif; ?>
                                </div>                                 
                              </div>
                          </div>
                          <div class="col-md-2"></div>                         
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <!-- <?php echo Form::close(); ?> -->
                 </div> 
                 <?php else: ?>
                  <div class="tabs-custom tab-pane fade tabs-horizontal tabs-line" id="tabs-1-3">                                       
                   <form method="post" id="editProfileForm" enctype="multipart/form-data" action="<?php echo e(route('update.newaccount')); ?>"> 
                    <!-- <?php echo Form::open(['id'=>'editProfileForm','files'=>true]); ?> -->
                    <?php echo csrf_field(); ?>
                     <div class="row">
                        <div class="col-md-2"></div>
                          <div class="col-md-8">
                              <input type="hidden"  id="user_id"                                        
                                         name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="card_number" class="mb-0"><?php echo e(__('messages.card_number')); ?><span
                                              class="profile__required">*</span></label>
                                      <input type="text" class="profile__name form-control pl-0" id="card_number"                                        aria-describedby=""  value="" name="card_number" required>
                              
                                    <img src="<?php echo e(asset('assets/images/card_image.png')); ?>" alt="" class="img-fluid user-about-image"> 
                                </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                  <div class="row">
                                    <label class="mb-0"><?php echo e(__('messages.validity_period')); ?>

                                      <span class="profile__required">*</span>
                                    </label> 
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="row"> 
                                        <select id="month" name="month" >                                           
                                              <?php for($i = 1; $i <= 12; $i++): ?>
                                                <option  class="profile__name form-control pl-0" value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                              <?php endfor; ?>               
                                        </select>
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;Month</label>
                                      </div>
                                      <div class="row">
                                        <select id="year" name="year">                                           
                                              <?php for($j = 2020; $j <= 2050; $j++): ?>
                                                <option  class="profile__name form-control pl-0" value="<?php echo e($j); ?>"><?php echo e($j); ?></option>
                                              <?php endfor; ?>               
                                        </select>
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;&nbsp;Year</label>
                                      </div>
                                    </div>                                     
                                  </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="securitycode" class="mb-0"><?php echo e(__('messages.securitycode')); ?>(CVC)<span
                                              class="profile__required">*</span></label>          
                                      <input type="text" class="profile__name form-control pl-0" id="security_code"
                                        aria-describedby=""  value="" name="security_code" required>
                                   
                                </div>                                 
                              </div>
                          </div>
                          <div class="col-md-2"></div>                         
                      </div>
                      <div class="row"> 
                        <div class="col-md-4"></div>                       
                        <div class="col-md-4">
                           <?php echo Form::button(__('messages.register') , ['type'=>'submit','class' => 'btn btn-primary mr-2 ml-auto','id'=>'btnPayJPInfoSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> " .__('messages.processing')]); ?>

    
                        </div>
                        <div class="col-md-4"></div>
                      </div>
                  
                    </form>
                    <!-- <?php echo Form::close(); ?> -->
                  </div>
                <?php endif; ?>           
              </div> 
            </div>         
          </div>
        </div>
      </section>
  <!--modal-->
  <div class="modal modal-lg-fullscreen fade" id="follow_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-alert modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content"> 
              <div class="row"> 
                <div class="col-md-1"></div>  
                <div class="col-md-2">
                <?php echo e(__('messages.profile')); ?>

                </div>
                <div class="col-md-3">
                <?php echo e(__('messages.name')); ?>

                </div>
                <div class="col-md-4">
                <?php echo e(__('messages.about')); ?>

                </div>
              </div>            
              <hr>
              <?php $__currentLoopData = $followerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a  href="<?php echo e(url('/userprofile/'.$creator->id)); ?>">   
                <div class="row"> 
                  <div class="col-md-1"></div>  
                  <div class="col-md-2">
                    <img src="../uploads/users/<?php echo e($creator->photo_url); ?>" alt="" class="img-avatar" />   
                  </div>                
                  <div class="col-md-3">
                  <?php echo e($creator->name); ?>

                  </div>
                  <div class="col-md-4">
                  <p><?php echo e($creator->about); ?></p>
                  </div>
                </div>
              </a>
              <hr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
        </div>
  </div>
  <div class="modal modal-lg-fullscreen fade" id="subscribe_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-alert modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content"> 
            <div class="row"> 
                <div class="col-md-1"></div>  
                <div class="col-md-2">
                <?php echo e(__('messages.profile')); ?>

                </div>
                <div class="col-md-3">
                <?php echo e(__('messages.name')); ?>

                </div>
                <div class="col-md-4">
                <?php echo e(__('messages.about')); ?>

                </div>
              </div>            
              <hr>
              <?php $__currentLoopData = $subscribelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creators): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <a  href="<?php echo e(url('/userprofile/'.$creators->id)); ?>">  
                <div class="row">                
                    <div class="col-md-1"></div>  
                    <div class="col-md-2">
                      <img src="../uploads/users/<?php echo e($creators->photo_url); ?>" alt="" class="img-avatar" />   
                    </div>                
                    <div class="col-md-3">
                    <?php echo e($creators->name); ?>

                    </div>
                    <div class="col-md-4">
                    <p><?php echo e($creators->about); ?></p>
                    </div>
                      
                </div>
              </a>
              <hr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
        </div>
  </div>
  <div class="modal modal-lg-fullscreen fade" id="paid_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-alert modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content"> 
            <div class="row" data-step="1" data-title=""> 
                <div class="col-md-1"></div>  
                <div class="col-md-2">
                <?php echo e(__('messages.profile')); ?>

                </div>
                <div class="col-md-2">
                <?php echo e(__('messages.name')); ?>

                </div>               
                <div class="col-md-3">
                <?php echo e(__('messages.paid')); ?>

                </div>
              </div>            
              <hr>
              <?php $__currentLoopData = $subscribelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $creators): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <a  href="<?php echo e(url('/userprofile/'.$creators->id)); ?>">
                <div class="row"> 
                  <div class="col-md-1"></div>  
                  <div class="col-md-2">
                    <img src="../uploads/users/<?php echo e($creators->photo_url); ?>" alt="" class="img-avatar" />   
                  </div>                
                  <div class="col-md-2">
                  <?php echo e($creators->name); ?>

                  </div>             
                  <div class="col-md-3">
                  ¥<?php echo e($creators->paid); ?>

                  </div>
                </div>
              </a>
              <hr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
        </div>
  </div>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <!-- Javascript-->

   <script>
        let profileURL = "<?php echo e(route('update.newaccount')); ?>"; 
    </script>   
    <script src="<?php echo e(mix('assets/js/account.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script> 
    <script src="<?php echo e(asset('assets/js/upload.js')); ?>"></script>  
<?php $__env->stopSection(); ?>



<?php echo $__env->make('home.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/home/users_profile.blade.php ENDPATH**/ ?>