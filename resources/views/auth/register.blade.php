@extends('layouts.auth_layout')
@section('title')
    {{ __('messages.register') }}
@endsection
@section('meta_content')
    - {{ __('messages.register') }} {{ __('messages.to') }} {{getAppName()}}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ mix('assets/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style_custom.css')}}"> 
    
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <form method="post" action="{{ url('/register') }}" id="registerForm">
                        {{ csrf_field() }}
                        <h2>{{ __('messages.register') }}</h2>
                        <p class="text-muted">{{ __('messages.create_your_account') }}</p>                      
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-user"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" value="{{ old('name') }}"
                                   placeholder="{{ __('messages.full_name') }}" id="name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                   name="email" value="{{ old('email') }}" placeholder="{{ __('messages.email') }}"
                                   id="email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':''}}"
                                   name="password" placeholder="{{ __('messages.password') }}" id="password"
                                   onkeypress="return avoidSpace(event)">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ __('messages.confirm_password') }}" id="password_confirmation" onkeypress="return avoidSpace(event)">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                               </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6">                              
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="editUser"
                                           name="user" value="1" checked> 
                                    <label class="custom-control-label" for="editUser" > 
                                        {{ __('messages.user') }}  
                                        <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="All group members can send messages into the group."></i>                               
                                    </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="editCreater"
                                           name="user" value="2"> 
                                    <label class="custom-control-label"   for="editCreater">
                                        {{ __('messages.creater') }}  
                                        <i class="fa fa-question-circle ml-2 question-type-open cursor-pointer"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="All group members can send messages into the group."></i>                                     
                                    </label>
                                </div>
                        </div>
                        <div class="input-group mb-4" id="twitter_input" style="display:none;">
                             <div class="col-md-5">
                             <p class="text-muted">{{ __('messages.twitter_link') }}: </p>
                            </div>
                            <input type="text"  class="form-control"   name="twitter_link" id="twitter_link">  
                                                  
                        </div>
                        <div class="input-group mb-4" id="instagram_input" style="display:none;">
                            <div class="col-md-5">
                                <p class="text-muted">{{ __('messages.instagram_link') }}: </p>
                            </div>
                            <input type="text"  class="form-control"  name="instagram_link" id="instagram_link">                          
                        </div>
                        <div class="input-group mb-4" id="youtube_input" style="display:none;">
                             <div class="col-md-5">
                                <p class="text-muted">{{ __('messages.youtube_link') }}: </p>
                            </div>                            
                            <input type="text"  class="form-control"  name="youtube_link" id="youtube_link">                          
                        </div>
                        <button type="button" id="registerBtn"
                                class="btn button button-primary button-pipaluk button-circle mt-2">{{ __('messages.register') }}</button>
                        <a href="{{ url('/login') }}" class="text-center">{{ __('messages.already_have_membership') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')    
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
@endsection

