<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/style_custom.css')); ?>"> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <!-- Swiper-->
    <section class="section swiper-container swiper-slider swiper-slider-classic" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-direction="vertical" data-nav="false">
        <div class="swiper-wrapper text-center" >
          <div class="swiper-slide" data-slide-bg="<?php echo e(asset('assets/images/slider/slider1.jpg')); ?>">
            <div class="swiper-slide-caption section-md">              
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="<?php echo e(asset('assets/images/slider/slider2.jpg')); ?>">
            <div class="swiper-slide-caption section-md">              
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="<?php echo e(asset('assets/images/slider/slider3.jpg')); ?>">
            <div class="swiper-slide-caption section-md">              
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="<?php echo e(asset('assets/images/slider/slider4.jpg')); ?>">
            <div class="swiper-slide-caption section-md">              
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="<?php echo e(asset('assets/images/slider/slider5.jpg')); ?>">
            <div class="swiper-slide-caption section-md">              
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination__module">
          <div class="swiper-pagination__fraction"><span class="swiper-pagination__fraction-index">00</span><span class="swiper-pagination__fraction-divider">/</span><span class="swiper-pagination__fraction-count">00</span></div>
          <div class="swiper-pagination__divider"></div>
          <div class="swiper-pagination"></div>
        </div>
    </section>
      <!-- Years of experience-->
    <section class="section section-sm section-fluid-scroll ">
        <div class="container-fluid creator-view"> 
          <div class="row row-sm row-30 justify-content-center">
          <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <div class="col-md-5 col-lg-5 col-xl-4 wow fadeInRight">              
              <article class="team-classic team-classic-lg">              
             <a class="team-classic-figure" href="<?php echo e(url('/userprofile/'.$data->id)); ?>"> 
                <img src="<?php echo e($data->photo_url); ?>" alt="" width="400" height="400"/>
              </a> 
              <script id="tmplUserDetails" type="text/x-jsrender">
              </script>       
                <div class="team-classic-caption">
                  <h4 class="team-classic-name"><a href="<?php echo e(url('/userprofile/'.$data->id)); ?>"><?php echo e($data->name); ?></a></h4>
                  <p class="team-classic-status">¥<?php echo e($data->monthly_price); ?>/Month</p>
                </div>
              </article>
            </div> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          </div>
         
        </div>
    </section>
  <!--modal-->
  <div class="modal modal-lg-fullscreen fade" id="AlertView" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-alert modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content">               
                <div class="modal-body py-0 hide-scrollbar">
                    <div class="row  pt-2" data-step="1" data-title="">                        
                        <div class="col-12">
                            <div class="form-group">
                              <h4 id="Alert_ModalLabel">Ready to Start live broadcast?</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer-alert">
                  <div class="col-2">                   
                  </div>
                  <div class="col-4">
                    <button type="button" data-toggle="modal" data-dismiss="modal" data-target="#LiveGroup" class="btn btn-primary-alert js-btn-step" data-orientation="yes">Yes</button>
                  </div>
                  <div class="col-4">
                    <button type="button" class="btn btn-primary-alert-no js-btn-step" data-orientation="no">No</button>
                  </div> 
                  <div class="col-2"></div> 
                </div>
            </div>
        </div>
  </div>

  <div class="modal modal-lg-fullscreen fade" id="LiveGroup" tabindex="-1" role="dialog" aria-labelledby="createGroupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title js-title-step" id="createGroupLabel">Strinm preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>                    
                </button>
            </div>
            <div class="modal-body py-0 hide-scrollbar">
                <div class="row pt-2" data-step="1" data-title="">
                    
                    <div class="col-12">
                        <div class="form-group">
                          <img src="<?php echo e(Auth::user()->photo_url); ?>" alt="" width="600" height="480"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <div class="row">                   
                  <button type="button" class="btn btn-link text-muted  mr-auto" data-orientation="cancel" data-dismiss="modal"></button>
                  <button type="button" class="btn button button-primary button-pipaluk button-circle " data-toggle="modal" data-orientation="Start" data-target="#LiveStream" data-dismiss="modal">Start</button>
              

              </div>

            </div>
        </div>
    </div>
  </div>
  <div class="modal modal-lg-fullscreen fade" id="LiveStream" tabindex="-1" role="dialog" aria-labelledby="createGroupLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-stream modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
        <div class="modal-content">
            <div class="modal-header">
              <div class="col-2"> 
                <h4 class="modal-title js-title-step" id="createGroupLabel">Live Broadcast</h4>                  
              </div>
              <div class="col-3"></div>
              <div class="col-7">
                <div class="row" >
                <div class="col-md-4">                      
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn button button-primary button-pipaluk button-circle" data-orientation="Start">Pause</button> 
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn button button-primary button-pipaluk button-circle mr-auto" data-orientation="cancel" data-dismiss="modal">End Broadcast</button>
                </div>
                </div>          
              </div>
                                  
            </div>
            <div class="modal-body py-0 hide-scrollbar">
                <div class="row  pt-2" data-step="1" data-title="">                        
                    <div class="col-12">
                      <div class="col-8">
                        <div class="form-group">
                          <img src="<?php echo e(Auth::user()->photo_url); ?>" alt="" width="600" height="480"/>
                        </div>
                      </div>
                      <div class="col-4">                           
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
  </div>  
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <!-- Javascript-->
    <script src="<?php echo e(asset('assets/js/core.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script> 
 
<?php $__env->stopSection(); ?>



<?php echo $__env->make('home.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/home/index.blade.php ENDPATH**/ ?>