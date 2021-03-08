@extends('home.app')
@section('title')
    {{ __('messages.timeline') }}
@endsection
@section('page_css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
 <link rel="stylesheet" href="{{ mix('assets/css/style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/style_custom.css')}}"> 
<link rel="stylesheet" href="{{asset('assets/css/upload.css')}}">  
<link rel="stylesheet" href="{{asset('assets/css/modal.css')}}">  
@endsection
@section('content')
<section class="section section-xl bg-default text-md-left">
			<div class="container">
				<div class="row row-20">
					<div class="col-lg-8">
            <div class="tab-pane fade show active" id="">
              <section class="section  bg-default text-left timeline-section">
                  <div class="container">
                  @foreach($mediaData as $data) 
                    @if($data->creatorRelation == 2 && $data->mediaPrivacy == 3)
                      <div class="row row-10">
                            <div class="blog-post" >
                              <article class="post post-classic">
                                <div class="post post-profile-header">
                                  <img src="../uploads/users/.{{$data->photo_url}}"  class="img-avatar" alt="" width="60" height="60" /> {{$data->creatorName}}  
                                                                                
                                  <!-- <p class="post-classic-text">Message</p> -->
                                </div> 
                                <div class="post-classic-figure">
                                  <img src="{{'../uploads/mediadata/lock/lock.png'}}" alt="" width="480" height="360"/>
                                </div>
                                <div style="display:flex;">
                                  <div class="post post-profile-header" style="display:flex;">
                                    @if($data->loves>0)
                                      <i class="fa fa-heart" style="color:red"></i>
                                    @else
                                      <i class="fa fa-heart-o" ></i>
                                    @endif
                                    <h6 style="margin-left:10px;">{{$data->loves}}</h6>
                                  </div>
                                  <div class="post post-profile-header" style="display:flex;">
                                  @if($data->loves>0)
                                      <i class="fa fa-folder" style="color:yellow"></i>
                                    @else
                                      <i class="fa fa-folder-o" ></i>
                                    @endif
                                    <h6 style="margin-left:10px;">{{$data->loves}}</h6>
                                  </div>
                                </div>
                                <div class="post post-profile-header">
                                  <h6>{{$data->created_at}}</h6>
                                  <p>{{$data->mediaCmnt}}</p>
                                </div>
                              </article>
                          </div>
                        </div>
                        <hr>
                    @else
                      <div class="row row-10">
                          <div class="blog-post">
                            <article class="post post-classic">
                              <div class="post post-profile-header">
                                <img src="../uploads/users/{{$data->photo_url}}"  class="img-avatar" alt="" width="60" height="60" /> {{$data->creatorName}}                                                
                                <!-- <p class="post-classic-text">Message</p> -->
                              </div> 
                              @if($data->type==1)
                                <div class="post-classic-figure">
                                  <img src="../uploads/mediadata/{{$data->mediaURL}}" alt="" onclick="openModal(this.id);" id="myImg{{$data->mediaId}}" alt="" width="480" height="360"/>
                                </div>
                              @elseif($data->type==2)
                                <div class="post-classic-figure">
                                  <video id="my-video"  controls preload="auto" width="570" height="264" data-setup=''>
                                            <source src="{{'../uploads/mediadata/'.$data->mediaURL}}" type="video/mp4">
                                  </video>
                                </div>
                              @endif
                              <div style="display:flex;">
                                <div class="post post-profile-header" style="display:flex;">
                                    @if($data->loves>0)
                                      <i class="fa fa-heart" style="color:red"></i>
                                    @else
                                      <i class="fa fa-heart-o" ></i>
                                    @endif
                                  <h6 style="margin-left:10px;">{{$data->loves}}</h6>
                                </div>
                                <div class="post post-profile-header" style="display:flex;">
                                    @if($data->loves>0)
                                      <i class="fa fa-folder" style="color:yellow"></i>
                                    @else
                                      <i class="fa fa-folder-o" ></i>
                                    @endif
                                  <h6 style="margin-left:10px;">{{$data->loves}}</h6>
                                </div>
                              </div>
                              <div class="post post-profile-header">
                                <h6>{{$data->created_at}}</h6>
                                <p>{{$data->mediaCmnt}}</p>
                              </div>
                            </article>
                        </div>
                      </div>
                      <hr>
                    @endif                    
                  @endforeach
                  </div>
              </section>
            </div>            
          </div>
					<div class="col-lg-4">
				
						<div class="post-sidebar post-sidebar-inset">
							<div class="row row-lg row-60">
								<div class="col-sm-6 col-lg-12">
									<div class="">
                    <h3>Pick Up Creators</h3>
									</div>
									<div class="post-sidebar-item">
																
                    <div class="tab-pane fade show active" id="tabs-2-1">
                      <section class="section  bg-default text-left timeline-section">
                          <div class="container">
                            <div class="row row-70">
                                <div class="blog-post">
                                  
                                  <article class="post post-classic">
                                    
                                    <div class="post-classic-figure"><img src="assets/images/profile/creator-3.jpg" alt="" width="770" height="430"/>
                                    </div>
                                    <div class="post-profile-short-header">                  
                                      <img src="{{Auth::user()->photo_url}}"  class="img-avatar" alt="" width="60" height="60" /> {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}                                                
                                      <p class="post-classic-text">Profile Text</p>
                                    </div>
                                  </article>
                                  
                                </div>
                            </div>
                          </div>
                        </section>
                    </div>
									</div>
									<div class="post-sidebar-item">
										<div class="tab-pane fade show active" id="tabs-2-1">
                      <section class="section  bg-default text-left timeline-section">
                          <div class="container">
                            <div class="row row-70">
                                <div class="blog-post">
                                 
                                  <article class="post post-classic">
                                    
                                    <div class="post-classic-figure"><img src="assets/images/profile/creator-1.jpg" alt="" width="770" height="430"/>
                                    </div>
                                    <div class="post post-profile-short-header">
                                       <img src="{{Auth::user()->photo_url}}"  class="img-avatar" alt="" width="60" height="60" /> {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}                                                

                                      <p class="post-classic-text">Message</p>
                                    </div>
                                  </article>
                                </div>
                            </div>
                          </div>
                        </section>
                    </div>
                  </div>
                  <div class="post-sidebar-item">
										<div class="tab-pane fade show active" id="tabs-2-1">
                      <section class="section  bg-default text-left timeline-section">
                          <div class="container">
                            <div class="row row-70">
                                <div class="blog-post">
                                
                                  <article class="post post-classic">
                                    
                                    <div class="post-classic-figure"><img src="assets/images/profile/profile-1.png" alt="" width="770" height="430"/>
                                    </div>
                                    <div class="post post-profile-short-header">
                                      <img src="{{Auth::user()->photo_url}}"  class="img-avatar" alt="" width="60" height="60" /> {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}                                                
                                      <p class="post-classic-text">Message</p>
                                    </div>
                                  </article>
                                </div>
                            </div>
                          </div>
                        </section>
                    </div>
								  </div>
								
							</div>
						</div>
					</div>
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
 <!--imageview_modal-->
 <div id="myModal" class="modal">
  <span class="image_close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
@endsection
@section('page_js')
@endsection
@section('scripts')
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
</script>
    <script src="{{asset('assets/js/script.js')}}"></script> 
    <script src="{{asset('assets/js/upload.js')}}"></script>  
@endsection


