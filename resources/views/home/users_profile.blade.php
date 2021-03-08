@extends('home.app')
@section('title')
    {{ __('messages.profile') }}
@endsection
@section('page_css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
 <link rel="stylesheet" href="{{ mix('assets/css/style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/style_custom.css')}}"> 
<link rel="stylesheet" href="{{asset('assets/css/upload.css')}}">   
<link rel="stylesheet" href="{{asset('assets/css/inter.css')}}"> 
@endsection
@section('content')
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
                            <img src="{{Auth::user()->photo_url}}" alt="">
                        </div>

                        <div class="media-body align-self-center ">
                        <img src="{{Auth::user()->photo_url}}" alt="" class="img-avatar" width="60" height="60" /> {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}
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
                   <a href="{{ url('/edit_profile') }}"><button class="btn button button-primary button-pipaluk button-circle mt-2" style="width:150px; height:40px;"> Edit Profile</button></a>
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
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
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
                                        <h5>{{$follow}}</h5>
                                        </a>
                                      </article>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                      <!-- Post Aria-->
                                      <article class="post post-aria-4">
                                        <a href="#" data-toggle="modal" data-target="#subscribe_list" class="header__link">
                                          <h5>{{$subscribe}}</h5> 
                                        </a>
                                      </article>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <article class="post post-aria-4">                                   
                                        <a href="#" data-toggle="modal" data-target="#paid_list" class="header__link">
                                          <h5>¥{{$paid}}</h5> 
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
                @if(sizeof($card_info)>0)
                  <div class="tabs-custom tab-pane fade tabs-horizontal tabs-line" id="tabs-1-3">  
                    <!-- {!! Form::open(['id'=>'editProfileForm','files'=>true]) !!} -->
                    @foreach($card_info as $card)
                     <div class="row">
                        <div class="col-md-2"></div>
                          <div class="col-md-8">
                              <input type="hidden"  id="user_id"                                        
                                         name="user_id" value="{{Auth::user()->id}}">
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="card_number" class="mb-0">{{ __('messages.card_number') }}<span
                                              class="profile__required">*</span></label>
                                      <input type="text" class="profile__name form-control pl-0" id="card_number"
                                        aria-describedby=""  value="{{$card->card_number}}" name="card_number"  disabled>
                                    <img src="{{asset('assets/images/card_image.png')}}" alt="" class="img-fluid user-about-image"> 
                                </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                  <div class="row">
                                    <label class="mb-0">{{ __('messages.validity_period') }}
                                      <span class="profile__required">*</span>
                                    </label> 
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="row">                                        
                                        @if($card->expiration_month)
                                        <input type="text" class="profile__name form-control pl-0" value="{{$card->expiration_month}}" style="width: 120px;" disabled>
                                       
                                        @endif
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;Month</label>
                                      </div>
                                      <div class="row">
                                        @if($card->expiration_year)
                                        <input type="text" class="profile__name form-control pl-0" value="{{$card->expiration_year}}" style="width: 120px;" disabled>
                                 
                                        @endif
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;&nbsp;Year</label>
                                      </div>
                                    </div>                                     
                                  </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="securitycode" class="mb-0">{{ __('messages.securitycode') }}(CVC)<span
                                              class="profile__required">*</span></label>  
                                    @if($card->cvc_number)
                                        <input type="text" class="profile__name form-control pl-0" value="{{$card->cvc_number}}"  disabled>
                                   
                                    @endif
                                </div>                                 
                              </div>
                          </div>
                          <div class="col-md-2"></div>                         
                      </div>
                    @endforeach
                    
                    <!-- {!! Form::close() !!} -->
                 </div> 
                 @else
                  <div class="tabs-custom tab-pane fade tabs-horizontal tabs-line" id="tabs-1-3">                                       
                   <form method="post" id="editProfileForm" enctype="multipart/form-data" action="{{ route('update.newaccount') }}"> 
                    <!-- {!! Form::open(['id'=>'editProfileForm','files'=>true]) !!} -->
                    @csrf
                     <div class="row">
                        <div class="col-md-2"></div>
                          <div class="col-md-8">
                              <input type="hidden"  id="user_id"                                        
                                         name="user_id" value="{{Auth::user()->id}}">
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="card_number" class="mb-0">{{ __('messages.card_number') }}<span
                                              class="profile__required">*</span></label>
                                      <input type="text" class="profile__name form-control pl-0" id="card_number"                                        aria-describedby=""  value="" name="card_number" required>
                              
                                    <img src="{{asset('assets/images/card_image.png')}}" alt="" class="img-fluid user-about-image"> 
                                </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                  <div class="row">
                                    <label class="mb-0">{{ __('messages.validity_period') }}
                                      <span class="profile__required">*</span>
                                    </label> 
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="row"> 
                                        <select id="month" name="month" >                                           
                                              @for ($i = 1; $i <= 12; $i++)
                                                <option  class="profile__name form-control pl-0" value="{{ $i }}">{{ $i }}</option>
                                              @endfor               
                                        </select>
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;Month</label>
                                      </div>
                                      <div class="row">
                                        <select id="year" name="year">                                           
                                              @for ($j = 2020; $j <= 2050; $j++)
                                                <option  class="profile__name form-control pl-0" value="{{ $j }}">{{ $j }}</option>
                                              @endfor               
                                        </select>
                                        <label for="payjp_account_apikey" class="mb-10">&nbsp;&nbsp;&nbsp;Year</label>
                                      </div>
                                    </div>                                     
                                  </div>
                              </div>
                              <div class="form-group bordered-input w-100">
                                <div class="row">
                                  <label for="securitycode" class="mb-0">{{ __('messages.securitycode') }}(CVC)<span
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
                           {!! Form::button(__('messages.register') , ['type'=>'submit','class' => 'btn btn-primary mr-2 ml-auto','id'=>'btnPayJPInfoSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> " .__('messages.processing')]) !!}
    
                        </div>
                        <div class="col-md-4"></div>
                      </div>
                  
                    </form>
                    <!-- {!! Form::close() !!} -->
                  </div>
                @endif           
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
                {{ __('messages.profile') }}
                </div>
                <div class="col-md-3">
                {{ __('messages.name') }}
                </div>
                <div class="col-md-4">
                {{ __('messages.about') }}
                </div>
              </div>            
              <hr>
              @foreach($followerlist as $creator)
              <a  href="{{ url('/userprofile/'.$creator->id) }}">   
                <div class="row"> 
                  <div class="col-md-1"></div>  
                  <div class="col-md-2">
                    <img src="../uploads/users/{{$creator->photo_url}}" alt="" class="img-avatar" />   
                  </div>                
                  <div class="col-md-3">
                  {{$creator->name}}
                  </div>
                  <div class="col-md-4">
                  <p>{{$creator->about}}</p>
                  </div>
                </div>
              </a>
              <hr>
              @endforeach  
            </div>
        </div>
  </div>
  <div class="modal modal-lg-fullscreen fade" id="subscribe_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-alert modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content"> 
            <div class="row"> 
                <div class="col-md-1"></div>  
                <div class="col-md-2">
                {{ __('messages.profile') }}
                </div>
                <div class="col-md-3">
                {{ __('messages.name') }}
                </div>
                <div class="col-md-4">
                {{ __('messages.about') }}
                </div>
              </div>            
              <hr>
              @foreach($subscribelist as $creators) 
              <a  href="{{ url('/userprofile/'.$creators->id) }}">  
                <div class="row">                
                    <div class="col-md-1"></div>  
                    <div class="col-md-2">
                      <img src="../uploads/users/{{$creators->photo_url}}" alt="" class="img-avatar" />   
                    </div>                
                    <div class="col-md-3">
                    {{$creators->name}}
                    </div>
                    <div class="col-md-4">
                    <p>{{$creators->about}}</p>
                    </div>
                      
                </div>
              </a>
              <hr>
              @endforeach  
            </div>
        </div>
  </div>
  <div class="modal modal-lg-fullscreen fade" id="paid_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-alert modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content"> 
            <div class="row" data-step="1" data-title=""> 
                <div class="col-md-1"></div>  
                <div class="col-md-2">
                {{ __('messages.profile') }}
                </div>
                <div class="col-md-2">
                {{ __('messages.name') }}
                </div>               
                <div class="col-md-3">
                {{ __('messages.paid') }}
                </div>
              </div>            
              <hr>
              @foreach($subscribelist as $creators) 
              <a  href="{{ url('/userprofile/'.$creators->id) }}">
                <div class="row"> 
                  <div class="col-md-1"></div>  
                  <div class="col-md-2">
                    <img src="../uploads/users/{{$creators->photo_url}}" alt="" class="img-avatar" />   
                  </div>                
                  <div class="col-md-2">
                  {{$creators->name}}
                  </div>             
                  <div class="col-md-3">
                  ¥{{$creators->paid}}
                  </div>
                </div>
              </a>
              <hr>
              @endforeach  
            </div>
        </div>
  </div>
 
@endsection
@section('page_js')
@endsection
@section('scripts')
   <!-- Javascript-->

   <script>
        let profileURL = "{{ route('update.newaccount')}}"; 
    </script>   
    <script src="{{ mix('assets/js/account.js') }}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script> 
    <script src="{{asset('assets/js/upload.js')}}"></script>  
@endsection


