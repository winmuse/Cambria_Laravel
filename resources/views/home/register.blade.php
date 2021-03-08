@extends('home.app')
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
                        <h1>{{ __('messages.register') }}</h1>   
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <a class="btn button button-primary button-pipaluk button-circle mt-2"  href="{{ url('/register') }}">{{ __('messages.user') }}</a>
                            </div>  
                            <div class="col-md-6">
                                <a class="btn button button-primary button-pipaluk button-circle mt-2"  href="{{ url('/register') }}">{{ __('messages.creater') }}</a>
                            </div>
                        </div>   
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

