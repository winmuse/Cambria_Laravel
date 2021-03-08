<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.profile')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(mix('assets/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/style_custom.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('assets/css/upload.css')); ?>">   
<link rel="stylesheet" href="<?php echo e(asset('assets/css/inter.css')); ?>"> 
<link rel="stylesheet" href="<?php echo e(asset('assets/css/modal.css')); ?>"> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom-inset mb-3">
        <div class="breadcrumbs-custom">
          <div class="container">            
          </div>
          <div class="box-position" style="background-image: url(../assets/images/slider/slider1.jpg);"></div>
        </div>
        
      </section> 
      <section class="section  section-first  text-md-left">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-3">
            <img src="<?php echo e($creator->photo_url); ?>" alt="" class="img-avatar" width="60" height="60" /> <?php echo e((htmlspecialchars_decode($creator->name))??''); ?>

          </div>
          <div class="col-4">
          <form method="post" enctype="multipart/form-data" class="require-validation" id="payment-form" data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>" action="<?php echo e(route('update.subscribe')); ?>">
          <?php echo csrf_field(); ?>
            <input type="text" value="<?php echo e(Auth::user()->id); ?>" name="user_id" style="display:none;">
            <input type="text" value="<?php echo e($creator->id); ?>" name="creator_id" style="display:none;">
            <?php if($card_info->count()>0): ?>
            <input type="text" value="<?php echo e($card_info[0]->card_number); ?>" name="card_number_id"  id="card_number_id" style="display:none;">
            <input type="text" value="<?php echo e($card_info[0]->cvc_number); ?>" name="cvc_number_id" id="cvc_number_id" style="display:none;">
            <input type="text" value="<?php echo e($card_info[0]->expiration_month); ?>" name="expiration_monthcreator_id" id="expiration_monthcreator_id" style="display:none;" >
            <input type="text" value="<?php echo e($card_info[0]->expiration_year); ?>" name="expiration_year_id" id="expiration_year_id" style="display:none;">
            <?php else: ?>
            <input type="text" value="" name="card_number_id" id="card_number_id" style="display:none;">
            <input type="text" value="" name="cvc_number_id" id="cvc_number_id" style="display:none;">
            <input type="text" value="" name="expiration_monthcreator_id" id="expiration_monthcreator_id" style="display:none;" >
            <input type="text" value="" name="expiration_year_id" id="expiration_year_id" style="display:none;">
            <?php endif; ?>
            <?php if(!is_numeric($creator->monthly_price) || $creator->monthly_price < 500 || $card_info->count() == 0): ?>
            <button type="submit" id="subscribBt" disabled
                                  class="btn button button-primary button-pipaluk button-circle mt-2"><?php echo e(__('messages.follow_premium')); ?>  ¥<b><?php echo e($creator->monthly_price); ?>/month</b></button>
            <?php elseif($paidData->count()==0): ?>
            <button type="submit" id="subscribBt"
                                  class="btn button button-primary button-pipaluk button-circle mt-2"><?php echo e(__('messages.follow_premium')); ?>  ¥<b><?php echo e($creator->monthly_price); ?>/month</b></button>
            <?php else: ?>
            <button type="submit" id="subscribBt" disabled
                                  class="btn button button-primary button-pipaluk button-circle mt-2"><?php echo e(__('messages.follow_premium')); ?>  ¥<b><?php echo e($creator->monthly_price); ?>::<?php echo e($paidData[0]['finished_at']); ?> end</b></button>
            <?php endif; ?>
          </form>
          </div>
          <div class="col-3">
          <form method="post" enctype="multipart/form-data" action="<?php echo e(route('update.follow')); ?>">
          <?php echo csrf_field(); ?>
            <input type="text" value="<?php echo e(Auth::user()->id); ?>" name="user_id" style="display:none;">
            <input type="text" value="<?php echo e($creator->id); ?>" name="creator_id" style="display:none;">
            <?php if($mediaData->count()>0): ?>
              <button type="submit" id="followBtn" disabled
                                  class="btn button button-primary button-pipaluk button-circle mt-2"><?php echo e(__('messages.follow_free')); ?></button>
            <?php else: ?>
              <button type="submit" id="followBtn"
                                  class="btn button button-primary button-pipaluk button-circle mt-2"><?php echo e(__('messages.follow_free')); ?></button>
            <?php endif; ?>
          </form>
          </div>          
        </div>
      </section>     
      <!-- Tabs-->
      <section class="section  section-first  text-md-left">
        <div class="container">
          <div class="row row-70 justify-content-center">            
            <div class="col-lg-12 col-xl-9">
              <h3></h3>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-2">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-2-1" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-2-2" data-toggle="tab">Photo</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-2-3" data-toggle="tab">Move</a></li>
                 
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-2-1">
                    <section class="section  text-left">
                        <div class="container">
                          <div class="row row-70">                                                    
                            <?php $__currentLoopData = $mediaData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="col-sm-9 col-md-12 col-lg-12">
                                <!-- Post Classic-->
                                <article class="post post-classic">                                 
                                  <!-- <p class="post-classic-text">Message</p> -->
                                  <div class="post-classic-figure"> 
                                    <?php if($data->creatorRelation == 2 && $data->mediaPrivacy == 3): ?>                                 
                                      <img src="<?php echo e('../uploads/mediadata/lock/lock.png'); ?>" alt="" width="480" height="360"/>
                                    <?php else: ?>
                                      <?php if($data->type==1): ?>
                                        <img src="<?php echo e('../uploads/mediadata/'.$data->mediaURL); ?>"  onclick="openModal(this.id);" id="myImg<?php echo e($data->mediaId); ?>" alt="" width="480" height="360"/> 
                                      <?php elseif($data->type==2): ?>
                                        <video id="my-video"  controls preload="auto" width="570" height="264" data-setup=''>
                                              <source src="<?php echo e('../uploads/mediadata/'.$data->mediaURL); ?>" type="video/mp4">
                                        </video>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                </article>
                                <!-- Quote Classic-->
                               
                               <?php if($data->love == 1): ?>
                                <i class="fa fa-heart " onclick="loveActive(<?php echo e($data->mediaId); ?>)" style="color:red"></i>
                               <?php else: ?>
                                <i class="fa fa-heart-o" onclick="loveActive(<?php echo e($data->mediaId); ?>)"></i>
                               <?php endif; ?>
                               
                                <h6><?php echo e($data->created_at); ?></h6>
                                <p><?php echo e($data->mediaCmnt); ?></p>
                                <div class="blog-post-bottom-panel group-md group-justify">
                                </div>
                                <div class="form-group w-100 float-left" >
                                  <label for="your comment" class="mb-0"><?php echo e(__('messages.yourcomment')); ?><span
                                              class="profile__required"> ***</span></label>                    
                                  <div style="display:flex;">
                                    <input type="text" class="profile__email form-control pl-10" style="margin-top:10px;" id="your_comment_<?php echo e($data->mediaId); ?>" value="<?php echo e($data->comment); ?>">
                                    <button type="submit" id="subscribBt" onclick="commentActive(<?php echo e($data->mediaId); ?>)"
                                      class="btn button button-primary button-pipaluk button-circle mt-2"><?php echo e(__('messages.save')); ?></button>
                                  </div>
                              </div> 
                              </div>
                              
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                     
                          </div>
                        </div>
                      </section>
                  </div>
                  <div class="tab-pane fade" id="tabs-2-2">
                    <section class="section section-xl  text-md-left">
                        <div class="container">
                            <div class="row row-60 justify-content-center">  
                                <?php $__currentLoopData = $mediaData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($data->creatorRelation == 2 && $data->mediaPrivacy == 3): ?>
                                    <?php if($data->type==1): ?>
                                      <div class="col-sm-9 col-md-4 col-lg-4">
                                        <!-- Post Classic-->
                                        <article class="post post-classic">                                 
                                          <!-- <p class="post-classic-text">Message</p> -->
                                          <div class="post-classic-figure"> 
                                            <img src="<?php echo e('../uploads/mediadata/lock/lock.png'); ?>" alt="" width="480" height="360"/>
                                          </div>
                                        </article>
                                        <!-- Quote Classic-->
                                        <?php if($data->love == 1): ?>
                                          <i class="fa fa-heart " onclick="loveActive(<?php echo e($data->mediaId); ?>)" style="color:red"></i>
                                        <?php else: ?>
                                          <i class="fa fa-heart-o" onclick="loveActive(<?php echo e($data->mediaId); ?>)"></i>
                                        <?php endif; ?>
                                        <h6><?php echo e($data->created_at); ?></h6>
                                        <p><?php echo e($data->mediaCmnt); ?></p>
                                        <div class="blog-post-bottom-panel group-md group-justify">
                                        </div>
                                      </div>
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <?php if($data->type==1): ?>
                                      <div class="col-sm-9 col-md-4 col-lg-4">
                                          <!-- Post Classic-->
                                          <article class="post post-classic">                                 
                                            <!-- <p class="post-classic-text">Message</p> -->
                                            <div class="post-classic-figure"> 
                                              <img src="<?php echo e('../uploads/mediadata/'.$data->mediaURL); ?>"  onclick="openModal(this.id);" id="myImg<?php echo e($data->mediaId); ?>" alt="" width="480" height="360"/> 
                                            </div>
                                          </article>
                                          <!-- Quote Classic-->
                                          <?php if($data->love == 1): ?>
                                            <i class="fa fa-heart " onclick="loveActive(<?php echo e($data->mediaId); ?>)" style="color:red"></i>
                                          <?php else: ?>
                                            <i class="fa fa-heart-o" onclick="loveActive(<?php echo e($data->mediaId); ?>)"></i>
                                          <?php endif; ?>
                                          <h6><?php echo e($data->created_at); ?></h6>
                                          <p><?php echo e($data->mediaCmnt); ?></p>
                                          <div class="blog-post-bottom-panel group-md group-justify">
                                          </div>
                                      </div>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                               
                            </div>
                        </div>
                    </section>
                  </div>
                  <div class="tab-pane fade" id="tabs-2-3">
                    <section class="section section-xl  text-md-left">
                        <div class="container">
                          <div class="row row-60 justify-content-center">                        
                          <?php $__currentLoopData = $mediaData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($data->creatorRelation == 2 && $data->mediaPrivacy == 3): ?>
                                    <?php if($data->type==2): ?> 
                                      <div class="col-sm-9 col-md-4 col-lg-4">
                                        <!-- Post Classic-->
                                        <article class="post post-classic">                                 
                                          <!-- <p class="post-classic-text">Message</p> -->
                                          <div class="post-classic-figure"> 
                                            <img src="<?php echo e('../uploads/mediadata/lock/lock.png'); ?>" alt="" width="480" height="360"/>
                                          </div>
                                        </article>
                                        <!-- Quote Classic-->
                                        <?php if($data->love == 1): ?>
                                          <i class="fa fa-heart " onclick="loveActive(<?php echo e($data->mediaId); ?>)" style="color:red"></i>
                                        <?php else: ?>
                                          <i class="fa fa-heart-o" onclick="loveActive(<?php echo e($data->mediaId); ?>)"></i>
                                        <?php endif; ?>
                                        <h6><?php echo e($data->created_at); ?></h6>
                                        <p><?php echo e($data->mediaCmnt); ?></p>
                                        <div class="blog-post-bottom-panel group-md group-justify">
                                        </div>
                                      </div>
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <?php if($data->type==2): ?>
                                      <div class="col-sm-9 col-md-4 col-lg-4">
                                          <!-- Post Classic-->
                                          <article class="post post-classic">                                 
                                            <!-- <p class="post-classic-text">Message</p> -->
                                            <div class="post-classic-figure"> 
                                              <video id="my-video"  controls preload="auto" width="570" height="264" data-setup=''>
                                                <source src="<?php echo e('../uploads/mediadata/'.$data->mediaURL); ?>" type="video/mp4">
                                              </video>
                                            </div>
                                          </article>
                                          <!-- Quote Classic-->
                                          <?php if($data->love == 1): ?>
                                            <i class="fa fa-heart " onclick="loveActive(<?php echo e($data->mediaId); ?>)" style="color:red"></i>
                                          <?php else: ?>
                                            <i class="fa fa-heart-o" onclick="loveActive(<?php echo e($data->mediaId); ?>)"></i>
                                          <?php endif; ?>
                                          <h6><?php echo e($data->created_at); ?></h6>
                                          <p><?php echo e($data->mediaCmnt); ?></p>
                                          <div class="blog-post-bottom-panel group-md group-justify">
                                          </div>
                                      </div>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                   
                          </div>
                        </div>
                    </section>
                  </div>                 
                </div>
              </div>
            </div>          
          </div>
        </div>
      </section> 
  <!--imageview_modal-->
  <div id="myModal" class="modal">
  <span class="image_close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
   <!-- Javascript-->
<script>
    function openModal(id) {     
      var modal = document.getElementById("myModal");
      var img = document.getElementById(id);
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");          
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
      var span = document.getElementsByClassName("image_close")[0];
// When the user clicks on <span> (x), close the modal
      span.onclick = function() { 
        modal.style.display = "none";
      }
    }

    function loveActive(id) {
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
        url: '/user/loveAction',
        type: 'post',
        data: {media_id:id},
        dataType: 'json',
        success: function success(obj) {
          // if (obj.success) {
             location.reload();
          // }

          // displayToastr('Success', 'success love has been actived.');
        },
        error: function error(data) {
          // displayToastr('Error', 'error', data.responseJSON.message);
          alert("eeeeee");
        }
      });
    }
    function commentActive(id) {
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
        url: '/user/commentAction',
        type: 'post',
        data: {media_id:id,comment:$("#your_comment_"+id).val()},
        dataType: 'json',
        success: function success(obj) {
          // if (obj.success) {
             location.reload();
          // }

          // displayToastr('Success', 'success love has been actived.');
        },
        error: function error(data) {
          // displayToastr('Error', 'error', data.responseJSON.message);
          alert("eeeeee");
        }
      });
    }
    

</script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="<?php echo e(asset('assets/js/core.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script> 
    <script src="<?php echo e(asset('assets/js/upload.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pay.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('home.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/home/userprofile.blade.php ENDPATH**/ ?>