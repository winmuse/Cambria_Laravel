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
<link rel="stylesheet" href="{{asset('assets/css/modal.css')}}">   
@endsection
@section('content')
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom">
          <div class="container">            
          </div>
          <div class="box-position" style="background-image: url(assets/images/slider/slider1.jpg);"></div>
        </div>
        <!-- <img src="assets/images/slider/slider1.jpg" /> -->
      </section>
    <section class="section section-xl section-fluid bg-default"> 
        <div class="container-fluid">
            <div class="row row-sm row-200 justify-content-center">
                <!-- <div class="col-lg-8 col-xl-1">
                  
                </div> -->
                <div class="col-lg-8 col-xl-2">
                    <!-- <div class="media chat-name align-items-right text-truncate"> -->
                        <!-- <div class="avatar avatar-online d-none d-sm-inline-block mr-3">
                            <img src="{{Auth::user()->photo_url}}" alt="">
                        </div> -->

                        <!-- <div class="media-body align-self-center ">
                            <h4 class="text-truncate mb-0">Catherine</h6>
                            <h6 class="text-muted">https://Cambria.com</h6>
                        </div> -->
                        <img src="{{Auth::user()->photo_url}}" alt="" class="img-avatar" width="60" height="60" /> {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}
                        <h6 class="text-muted">https://Cambria.com</h6>
                    <!-- </div>   -->
                    <div class="media-body align-self-center ">
                        <h6 class="text-truncate mb-0">Show less</h6>
                        <h6 class="text-muted"></h6>
                    </div>                 
                </div>
                <div class="col-lg-8 col-xl-2">
                @if($follower_sub_paid>0)
                <button type="submit" id="withdrawBt"
                                  class="btn button button-primary button-pipaluk button-circle mt-2">withraw: <b>{{$follower_sub_paid}}¥</b></button>
                @endif
                </div>
                <div class="col-lg-8 col-xl-2"  style="background:#ffffff; border-radius:5%; align-items:center; display:grid;">
                @if(Auth::user()->monthly_price)
                  <div class="form-group w-40 float-left">
                      <label for="monthly_price" class="btn button button-primary button-pipaluk button-circle mt-2">{{ __('messages.monthlyprice') }}<span
                        class="profile__required">*</span></label>
                      <label for="monthly_price" class="btn button button-primary button-pipaluk button-circle mt-2" style="color:#ff0000">{{Auth::user()->monthly_price}}<span
                        class="profile__required">¥</span></label>
                  </div>
                @else
                <form method="post" id="selectMonthlyPlan" enctype="multipart/form-data" action="{{ route('update.updatemonthly') }}">
                  <div class="form-group w-40 float-left">
                      <label for="monthly_price" class="mb-0">{{ __('messages.monthlyprice') }}<span
                                  class="profile__required">*</span></label>                    
                      <select type="submit" name="monthlyPlan" id="monthlyPlan" >
                        @for ($i = 500; $i <= 10000; $i+=100)
                        <option value={{$i}}>{{$i}}¥</option>
                        @endfor
                      </select>
                  </div>
                  <button type="submit" id="saveMonthlyBt"
                    class="btn button button-primary button-pipaluk button-circle mt-2"></b>{{ __('messages.save') }}</button>
                </form>
                @endif                         
                </div>
                <div class="col-lg-8 col-xl-4">
                   <a href="{{ url('/edit_profile') }}"><button class="btn button button-primary button-pipaluk button-circle mt-2" style="width:150px; height:40px;"> Edit Profile</button></a>
                </div>
            </div>
        </div>
    </section>
      <!-- Tabs-->
      <section class="section  section-first bg-default text-md-left">
        <div class="">
          <div class="row row-70 justify-content-center">
            <!-- <div class="col-lg-8 col-xl-1">
            </div> -->

            <div class="col-lg-8 col-xl-3" style="padding: 100px;">
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
            <div class="col-lg-8 col-xl-6">
              <div class="tab-content">
              <h3></h3>
              <!-- Bootstrap tabs-->
                  <div class="tabs-custom  tab-pane fade show tabs-horizontal tabs-line active" id="tabs-1-1">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-2-1" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-2-2" data-toggle="tab">Photo</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-2-3" data-toggle="tab">Move</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-2-4" data-toggle="tab">Info</a></li>
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-2-1">
                    <section class="section  bg-default text-left">
                        <div class="container">
                          <div class="row row-10">
                            <!-- <div class="col-lg-12"> -->
                              @foreach($mediaData  as $data)
                              <div class="col-sm-12 col-md-4 col-lg-4">
                                <img src="{{Auth::user()->photo_url}}" alt="" class="img-avatar" width="60" height="60" /> {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}
                              </div>
                              <div class="col-sm-12 col-md-6 col-lg-6">
                              </div>
                              <div class="col-sm-12 col-md-2 col-lg-2">
                                <li class="nav-item dropdown">
                                  <a class="nav-link" style="margin-right: 10px; font-size: 30px; color: #000" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                      {{'...'}}
                                      <!-- <img class="img-avatar" src="{{Auth::user()->photo_url}}" alt="cambria"> -->
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#"><i
                                        class="fa fa-lock"></i>{{ __('messages.copy_to_link') }}</a>
                                      <a class="dropdown-item" onClick="deletepostid({{$data->id}})" data-toggle="modal" data-target="#deletePost" id="{{$data->id}}" ><i
                                        class="fa fa-lock"></i>{{ __('messages.delete_the_post') }}</a>
                                  </div>
                                </li>
                              </div>
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="blog-post">
                                  <article class="post post-classic">
                                    
                                    <div class="post-classic-figure">
                                      @if($data->type==1)  
                                        <img src="{{'../uploads/mediadata/'.$data->photo_url}}" onclick="openModal(this.id);" id="myImg{{$data->id}}"  alt="" width="640" height="480"/>
                                      @elseif($data->type==2)
                                        <video id="my-video"  controls preload="auto" width="500"  data-setup=''>
                                              <source src="{{'../uploads/mediadata/'.$data->photo_url}}" type="video/mp4">
                                        </video>
                                      @endif
                                    </div>
                                  </article>
                                  <!-- Quote Classic-->
                                  <i class="fa fa-heart-o" ></i><h6>{{$data->created_at}}</h6>
                                  <p>{{$data->comment}}</p>
                                  <hr>
                                </div>
                              </div>
                              @endforeach
                            </div>                          
                          <!-- </div> -->
                        </div>
                      </section>
                  </div>
                  <div class="tab-pane fade" id="tabs-2-2">
                    <section class="section section-xl bg-default text-md-left">
                        <div class="container">
                          <div class="row row-10 justify-content-center">
                            @foreach($photo as $pdata) 
                                  <div class="col-sm-12 col-md-4 col-lg-4"> 
                                  <!-- Post Aria-->
                                  <article class="post post-aria">
                                      <img src="{{'../uploads/mediadata/'.$pdata->photo_url}}"  onclick="openModal(this.id);" id="myImg{{$pdata->id}}" alt="" width="570" height="492"/>
                                  </article>
                                </div>
                              @endforeach  
                          </div>
                        </div>
                    </section>
                  </div>
                  <div class="tab-pane fade" id="tabs-2-3">
                    <section class="section section-xl bg-default text-md-left">
                        <div class="container">
                          <div class="row row-10 justify-content-center">
                            @foreach($video as $vdata) 
                                  <div class="col-sm-12 col-md-4 col-lg-4"> 
                                  <!-- Post Aria-->
                                  <article class="post post-aria">
                                    <video id="my-video"  controls preload="auto" width="270" height="202" data-setup=''>
                                              <source src="{{'../uploads/mediadata/'.$vdata->photo_url}}" type="video/mp4">
                                    </video>
                                  </article>
                                </div>
                            @endforeach  
                          </div>
                        </div>
                    </section>
                  </div>
                  <div class="tab-pane fade" id="tabs-2-4">
                  <a href="#" data-toggle="modal" data-target="#myTabModalFollower" class="header__link">
                    <h3>Follower</h3>
                  </a>
                    <hr>
                        <section class="section section-xl  bg-default text-md-left">
                            <div class="container">
                              <div class="row row-10 justify-content-center">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                  <!-- Post Aria-->
                                  <article class="post post-aria-4">
                                    <!-- <a href="#" data-toggle="modal" data-target="#follower_free_list" class="header__link"> -->
                                      <h5>{{sizeof($follower_free_list)}}</h5>
                                    <!-- </a> -->
                                  </article>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                  <!-- Post Aria-->
                                  <article class="post post-aria-4">
                                    <!-- <a href="#" data-toggle="modal" data-target="#follower_sub_list" class="header__link"> -->
                                      <h5>{{sizeof($follower_sub_list)}}</h5> 
                                    <!-- </a> -->
                                  </article>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <article class="post post-aria-4">
                                      <!-- <a href="#" data-toggle="modal" data-target="#follower_paid_list" class="header__link"> -->
                                        <h5>¥{{$follower_sub_paid}}</h5> 
                                      <!-- </a> -->
                                    </article>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <!-- Post Aria-->
                                    <article class="post post-aria-4">
                                      <h5>Free</h5>
                                    </article>
                                  </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                    <!-- Post Aria-->
                                    <article class="post post-aria-4">
                                      <h5>Subscriber</h5> 
                                    </article>
                                  </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                      <article class="post post-aria-4">
                                          <h5>Monthly Income</h5> 
                                      </article>
                                  </div>
                                
                              </div>
                            </div>
                        </section>
                        <a href="#" data-toggle="modal" data-target="#myTabModalFollow" class="header__link">
                          <h3>Follow</h3>
                        </a>
                        
                        <hr>
                        <section class="section section-xl  bg-default text-md-left">
                            <div class="container">
                              <div class="row row-10 justify-content-center">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                  <!-- Post Aria-->
                                  <article class="post post-aria-4">
                                    <!-- <a href="#" data-toggle="modal" data-target="#follow_free_list" class="header__link"> -->
                                      <h5>{{sizeof($follow_free_list)}}</h5>
                                    <!-- </a> -->
                                  </article>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                  <!-- Post Aria-->
                                  <article class="post post-aria-4">
                                    <!-- <a href="#" data-toggle="modal" data-target="#follow_sub_list" class="header__link"> -->
                                      <h5>{{sizeof($follow_sub_list)}}</h5> 
                                    <!-- </a> -->
                                  </article>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <article class="post post-aria-4">
                                      <!-- <a href="#" data-toggle="modal" data-target="#follow_paid_list" class="header__link"> -->
                                          <h5>¥{{$follow_sub_paid}}</h5> 
                                      <!-- </a> -->
                                    </article>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <!-- Post Aria-->
                                    <article class="post post-aria-4">
                                      <h5>Free</h5>
                                    </article>
                                  </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                    <!-- Post Aria-->
                                    <article class="post post-aria-4">
                                      <h5>Subscriber</h5> 
                                    </article>
                                  </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                      <article class="post post-aria-4">
                                          <h5>Total pay</h5> 
                                      </article>
                                  </div>
                                
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
            <div class="col-lg-8 col-xl-3">
            </div>        
          </div>
        </div>
      </section>
  <!--modal-->
 <!--imageview_modal-->
<div id="myModal" class="modal">
  <span class="image_close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<!-- tab_modal -->
    <!-- <div class="row justify-content-center"> <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary py-2 px-4">Click Here !</button> Modal -->
        <div id="myTabModalFollower" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs1 active" id="tab011">
                            <h6 class="text-muted">Free follower</h6>
                        </div>
                        <div class="tabs1 " id="tab021">
                            <h6 class="font-weight-bold">Subscriber</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab0111">
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
                          @foreach($follower_free_list as $creator)
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
                        </fieldset>
                        <fieldset id="tab0211">
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
                            @foreach($follower_sub_list as $creator)
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
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
<!-- end tab_modal -->
<!-- tab_modal -->
    <!-- <div class="row justify-content-center"> <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary py-2 px-4">Click Here !</button> Modal -->
    <div id="myTabModalFollow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs2 active" id="tab03">
                            <h6 class="text-muted">Free follower</h6>
                        </div>
                        <div class="tabs2 " id="tab04">
                            <h6 class="font-weight-bold">Subscriber</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab031">
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
                          @foreach($follow_free_list as $creator)
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
                        </fieldset>
                        <fieldset id="tab041">
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
                          @foreach($follow_sub_list as $creator)
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
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
<!-- end tab_modal -->
<!--modal-->
<!-- <div class="modal modal-lg-fullscreen fade" id="follower_free_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
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
              @foreach($follower_free_list as $creator)
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
<div class="modal modal-lg-fullscreen fade" id="follower_sub_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
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
              @foreach($follower_sub_list as $creator)
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
<div class="modal modal-lg-fullscreen fade" id="follower_paid_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
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
                {{ __('messages.paid') }}
                </div>
              </div>            
              <hr>
              @foreach($follower_sub_list as $creator)
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
                  <p>¥{{$creator->paid}}</p>
                  </div>
                </div>
              </a>
              <hr>
              @endforeach  
            </div>
        </div>
</div>
  <div class="modal modal-lg-fullscreen fade" id="follow_free_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
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
              @foreach($follow_free_list as $creator)
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
  <div class="modal modal-lg-fullscreen fade" id="follow_sub_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
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
              @foreach($follow_sub_list as $creator)
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
  <div class="modal modal-lg-fullscreen fade" id="follow_paid_list" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
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
                {{ __('messages.paid') }}
                </div>
              </div>            
              <hr>
              @foreach($follow_sub_list as $creator)
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
                  <p>¥{{$creator->paid}}</p>
                  </div>
                </div>
              </a>
              <hr>
              @endforeach  
            </div>
        </div>
</div> -->
 
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
    $(".tabs1").click(function(){

      $(".tabs1").removeClass("active");
      $(".tabs1 h6").removeClass("font-weight-bold");
      $(".tabs1 h6").addClass("text-muted");
      $(this).children("h6").removeClass("text-muted");
      $(this).children("h6").addClass("font-weight-bold");
      $(this).addClass("active");

      current_fs = $(".active");

      next_fs = $(this).attr('id');
      next_fs = "#" + next_fs + "1";

      $("fieldset").removeClass("show");
      $(next_fs).addClass("show");

      current_fs.animate({}, {
        step: function() {
        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        next_fs.css({
          'display': 'block'
          });
        }
      });
    });

    $(".tabs2").click(function(){

      $(".tabs2").removeClass("active");
      $(".tabs2 h6").removeClass("font-weight-bold");
      $(".tabs2 h6").addClass("text-muted");
      $(this).children("h6").removeClass("text-muted");
      $(this).children("h6").addClass("font-weight-bold");
      $(this).addClass("active");

      current_fs = $(".active");

      next_fs = $(this).attr('id');
      next_fs = "#" + next_fs + "1";

      $("fieldset").removeClass("show");
      $(next_fs).addClass("show");

      current_fs.animate({}, {
        step: function() {
        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        next_fs.css({
          'display': 'block'
          });
        }
      });
    });
</script> 
   <script>
        let profileURL = "{{ route('update.newaccount')}}"; 
        let profileMonthlyURL = "{{ route('update.updatemonthly') }}";
    </script>   
    <script src="{{ mix('assets/js/account.js') }}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script> 
    <script src="{{asset('assets/js/upload.js')}}"></script>
    <script src="{{asset('assets/js/profile.js')}}"></script>
@endsection


