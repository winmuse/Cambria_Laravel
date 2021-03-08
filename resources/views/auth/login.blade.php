@extends('layouts.auth_layout')
@section('title')
    {{ __('messages.login') }}
@endsection
@section('meta_content')
    - {{ __('messages.login') }} {{ __('messages.to') }} {{getAppName()}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/style_custom.css')}}"> 
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card-group"> 
                <div class="card p-4">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                      
                        <form method="post" action="{{ url('/login') }}" id="loginForm">
                            {{ csrf_field() }}
                            <!-- <h2>{{ __('messages.login') }}</h2> -->
                            <a href="/" aria-current="page" class="router-link-exact-active router-link-active">
								<img src="{{asset('assets/images/logo-default-191x52.png')}}" width="237" height="59"></img>
							</a>
                            <p class="text-muted">{{ __('messages.sign up to make money and interact with your fans!') }}</p>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <button class="btn button button-primary button-pipaluk button-circle mt-2  text-center">
                                        <a href="{{ url('/login/google') }}" ><i class="fa fa-twitter"></i> Sign Up / Login with Twitter</a>
                                    </button>
                                    <button class="btn button button-primary button-pipaluk button-circle mt-2 text-center">
                                        <a href="{{ url('/login/facebook') }}"><i class="fa fa-google"></i> Sign Up / Login with Google</a>
                                    </button>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-envelope"></i>
                                    </span>
                                    </div>
                                    <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                           name="email" value="{{ old('email') }}"
                                           placeholder="{{ __('messages.email') }}"
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
                                      <i class="fa fa-lock lock-icon-size"></i>
                                    </span>
                                    </div>
                                    <input type="password"
                                           class="form-control {{ $errors->has('password')?'is-invalid':'' }}"
                                           placeholder="{{ __('messages.password') }}" name="password" id="password"
                                           onkeypress="return avoidSpace(event)">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                       <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class=" col-6 mb-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> {{ __('messages.remember_me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                            <a class="btn btn-link px-0" href="{{ url('/password/reset') }}">
                                                {{ __('messages.forgot_password?') }}
                                            </a>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-12  text-center">
                                        <button class="btn button button-primary button-pipaluk button-circle mt-2" type="button"
                                                style="color:#000" id="loginBtn">{{ __('messages.login') }}</button>
                                    </div>                                                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a class="btn button button-primary button-pipaluk button-circle mt-2"   style="color:#000"  href="{{ url('/register') }}">{{ __('messages.register_now!') }}</a>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
