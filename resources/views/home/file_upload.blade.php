@extends('home.app')
@section('title')
    {{ __('messages.upload') }}
@endsection
@section('page_css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
 <link rel="stylesheet" href="{{ mix('assets/css/style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/style_custom.css')}}"> 
<link rel="stylesheet" href="{{asset('assets/css/upload.css')}}"> 
<!-- <link rel="stylesheet" href="{{asset('assets/css/inter.css')}}">  -->
@endsection
@section('content')
<!-- {!! Form::open(['id'=>'editProfileForm','files'=>true]) !!} -->
<form method="post" enctype="multipart/form-data" action="{{ route('update.newpost') }}">
@csrf
<section class="section section-xl section-fluid"> 
        <div class="container-fluid">         
            <div class="row row-sm  justify-content-center">
                <div class="col-lg-8 col-xl-1">                  
                </div>
                <div class="col-lg-8 col-xl-2">
                    <div class="media chat-name align-items-right text-truncate">
                        <div class="avatar avatar-online d-none d-sm-inline-block mr-3">
                           <h5><i class="fa fa-arrow-left"></i> New post</h5>
                        </div>
                    </div>         
                </div>
                <div class="col-lg-8 col-xl-2">                  
                </div>
                <div class="col-lg-4 col-xl-2">                
                {!! Form::button(__('messages.share') , ['type'=>'submit','class' => 'profile_button','style'=>'width:120px; height:40px; background:#FFDE03','id'=>'btnEditSave']) !!} 
                </div>
                
            </div>
            <hr/>
        </div>
    </section>
    <section class="section  text-left">
        <div class="container">
          <div class="row ">
            <div class="col-lg-12">
              <div class="blog-post">
                <!-- Post Classic-->
                <article class="post post-classic">
                  <img src="{{Auth::user()->photo_url}}"  class="img-avatar" alt="" width="60" height="60" /> {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}                                                
                </article>
                <div class="row">
                    <div class="uploaded_file_view" id="uploaded_view">
                        <span class="file_remove">X</span>
                    </div>
                    
                </div>
                <div class="form-group bordered-input w-100">
                   
                    <input type="text" class="d-none" id="user_id"                          
                           value="{{Auth::user()->id}}" name="user_id" required>
                </div>
                <p class="post-classic-text">&nbsp;&nbsp;&nbsp;Text</p> 
                <br> 
                <div class="col-md-12">
                    <textarea rows="2" cols="150" id="comment" name="comment"  style="width: 90%; border:0;font-size: 20px;" ></textarea>
                    <hr/>
                </div>
              </div>
            </div>                          
          </div>
        </div>
    </section>
    <section class="section   text-left">
        <div class="container">
         
            <div class="col-lg-12">
              <div class="blog-post">
                <!-- Post Classic-->
                <article class="post post-classic">                   
                        <div class="row ">
                            <div class="col-3">
                              <div class="media__img-wrapper">
                                <!-- <img src="{{ Auth::user()->photo_url }}" alt="" id="upload-photo-img">                         -->
                                  <div class="button_outer btn_photo">
                                          <div class="btn_upload">                                          
                                              <label class="" style="font-size:30px;"><i class="fa fa-photo"></i>                                             
                                                  <input id="upload_file" class="d-none" name="photo" type="file" accept="image/png, image/jpeg">
                                              </label> 
                                          </div>                               
                                  </div>  
                                  <div class="button_video_outer">                                            
                                            <div class="btn_upload_video btn_video">                                          
                                                <label class="" style="font-size:30px;"><i class="fa fa-video-camera"></i>
                                                    <input id="upload-video" class="d-none" name="video" type="file" accept=".avi, .mpg, .wma, .m4v, .mov, .mpeg">
                                                </label>
                                            </div>                                        
                                  </div> 
                            </div>
                        </div>
                        
                        <!-- <div class="col-4">                             
                            <label class="switch switch-label switch-outline-primary-alt">
                              <p class="text-muted">{{ __('messages.follow') }}</p> 
                              <input name="privacy" id="privacy" data-id="2" class="switch-input is-active" type="checkbox" value="2" >
                              <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                            </label>
                        </div> -->
                        <div class="col-4">
                        </div>
                        <div class="col-1" style="margin-top: 20px;">
                            
                            <label class="switch switch-label switch-outline-primary-alt">
                              <input name="privacy" data-id="2" class="switch-input is-active" type="checkbox" value="3" style="border-radius:30px">
                              <span class="switch-slider" data-checked=" " data-unchecked=" "></span>                              
                            </label>
                            
                        </div>
                        <div class="col-2" style="margin-top: 20px;">
                          <p class="text-muted">{{ __('messages.paid_user_only') }}</p>
                        </div>
                    </div>
                                                
                </article>                
              </div>
            </div>                          
          </div>
     
    </section>
    </form>
    <!-- {!! Form::close() !!} -->
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
                          <img src="assets/images/livecasting/live_img-1.png" alt="" width="900" height="560"/>
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
                          <img src="assets/images/livecasting/live_img-2.png" alt="" width="900" height="560"/>
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
@endsection
@section('page_js')
@endsection
@section('scripts')
   <!-- Javascript-->
   <script>
        let profileURL ="{{ route('update.newpost') }}"; 
    </script>
    <script src="{{asset('assets/js/newpost.js') }}"></script>   
    <script src="{{asset('assets/js/script.js')}}"></script> 
    <script src="{{asset('assets/js/upload.js')}}"></script> 
    <script src="{{asset('assets/js/upload_video.js')}}"></script> 
     
@endsection


