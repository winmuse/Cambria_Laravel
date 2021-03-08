<!DOCTYPE html>
<html>
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title') | {{ getAppName() }}</title>
    <meta name="description" content="@yield('title') - {{getAppName()}}">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="{{ mix('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="{{ mix('assets/css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/jquery.toast.min.css') }}">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

    <script src="{{ mix('assets/js/jquery.min.js') }}"></script>

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <!-- <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script> -->
    
    <script>
        let webNotificationRoute = '{{ url('update-web-notifications')}}/';
        let currentUserId = '{{ getLoggedInUserId() }}';
        let isSubscribedBefore = '{{ !is_null(Auth::user()->is_subscribed) ? true : false }}';

        let oneSignalAppId = '{{ config('onesignal.app_id') }}';
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function () {
            OneSignal.init({
                appId: oneSignalAppId,
            });

            // if push is disabled in DB then disable it in OneSignal too.
            let isPushEnabled = '{{Auth::user()->is_subscribed}}';
            if (!isPushEnabled) {
                OneSignal.setSubscription(false);
            }

            $('#webNotification').on('ifChanged', function () {
                let isSubscribed = ($(this).val()) ? false : true;

                if (isSubscribed) {
                    OneSignal.showNativePrompt();
                } else {
                    if (confirm('Are you sure to disable web notification ?')) {
                        OneSignal.getUserId(function (userId) {
                            OneSignal.setSubscription(false);
                            updateWebPushNotification(false, userId);
                        });
                    }
                }
            });

            OneSignal.on('customPromptClick', function (promptClickResult) {
                let result = promptClickResult.result;

                if (result == 'denied') {
                    updateWebPushNotification(false);
                    return;
                }

                OneSignal.getUserId(function (userId) {
                    updateWebPushNotification(true, userId);
                });
            });

            /** Show Subscribe web notification only first time */
            if (!isSubscribedBefore) {
                OneSignal.showNativePrompt();
            }
        });

        function updateWebPushNotification (isSubscribed, oneSignalPlayerId = null) {
            /** Change Web notification Status */
            let data = {};
            data.is_subscribed = isSubscribed;
            if (oneSignalPlayerId) {
                data.player_id = oneSignalPlayerId;
            }

            $.ajax({
                url: webNotificationRoute,
                type: 'PUT',
                data: data,
                success: function (result) {
                    if (result.success) {
                        displayToastr('Success', 'success', result.message);
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }
                },
                error: function (result) {
                    displayToastr('Error', 'error', result.responseJSON.message);
                },
            });
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/emojionearea.min.css') }}">
    <!-- google font -->
    <link href="//fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
    <!-- font awesome version 4.7 -->
    <link rel="stylesheet" href="{{ mix('assets/css/font-awesome.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ mix('assets/css/landing-page-style.css') }}">
    @yield('page_css')
    <link rel="stylesheet" href="{{ mix('assets/css/style.css') }}">
    @yield('css')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <div class="header__bar">
        <a href="#" data-toggle="modal" data-target="#AlertView" class="header__link"><i class="fa fa-video-camera"></i></a>
    </div>
    <div class="header__logo-brand">
                <!-- <img src="{{ getLogoUrl() }}" alt="logo-image" class="header__logo"> -->
                <span class="header__brand-name">{{getAppName()}}</span>
    </div>
    <div class="header__bar">
        <a href="#" data-toggle="modal" data-target="#AlertView" class="header__link"><i class="fa fa-search"></i></a>
    </div>
    <div class="header__collapsible ml-auto align-items-center" id="collapsedNav">
            <nav>
                @auth
                    @if(   Auth::user()-> user==1 && Auth::user()-> is_system !=1)
                        <a href="{{ url('/home') }}" class="header__link {{ Request::is('home*') ? 'active' : '' }}"><i class="fa fa-home"></i></a>
                        <a href="{{ url('/conversations') }}" class="header__link {{ Request::is('conversations*') ? 'active' : '' }}"><i class="fa fa-comment"></i></a>
                        <a href="{{ url('/timeline') }}" class="header__link {{ Request::is('timeline*') ? 'active' : '' }}"><i class="fa fa-clock-o"></i></a>
                        <a href="{{ url('/users_profile') }}" class="header__link {{ Request::is('users_profile*') ? 'active' : '' }}"><i class="fa fa-user"></i></a>
                        
                    @elseif( Auth::user()-> user==2)
                        <a href="#" data-toggle="modal" data-target="#AlertView" class="header__link"><i class="fa fa-video-camera"></i></a>
                        <a href="{{ url('/home') }}" class="header__link {{ Request::is('home*') ? 'active' : '' }}"><i class="fa fa-home"></i></a>
                        <a href="{{ url('/conversations') }}" class="header__link {{ Request::is('conversations*') ? 'active' : '' }}"><i class="fa fa-comment"></i></a>
                        <a href="{{ url('/file_upload') }}" class="header__link {{ Request::is('file_upload*') ? 'active' : '' }}"><i class="fa fa-plus-circle"></i></a>
                        <a href="{{ url('/timeline') }}" class="header__link {{ Request::is('timeline*') ? 'active' : '' }}"><i class="fa fa-clock-o"></i></a>
                        <a href="{{ url('/profile') }}" class="header__link {{ Request::is('profile*') ? 'active' : '' }}"><i class="fa fa-user"></i></a>
                    @elseif( Auth::user()-> user==1 && Auth::user()-> is_system==1)
                        <a href="{{ url('/home') }}" class="header__link {{ Request::is('home*') ? 'active' : '' }}"><i class="fa fa-home"></i></a>
                        <a href="{{ url('/conversations') }}" class="header__link {{ Request::is('conversations*') ? 'active' : '' }}"><i class="fa fa-comment"></i></a>
                        <a href="{{ url('/timeline') }}" class="header__link {{ Request::is('timeline*') ? 'active' : '' }}"><i class="fa fa-clock-o"></i></a>
                        <a href="{{ url('/users_profile') }}" class="header__link {{ Request::is('users_profile*') ? 'active' : '' }}"><i class="fa fa-user"></i></a>
                        <a href="{{ url('/creators') }}" class="header__link {{ Request::is('creators*') ? 'active' : '' }}"><i class="fa fa-gear"></i></a>
                    @endif
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="header__link {{ Request::is('login*') ? 'active' : '' }}">{{ __('messages.login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="header__link {{ Request::is('register*') ? 'active' : '' }}">{{ __('messages.register') }}</a>
                    @endif
                @endauth
            </nav>
    </div>

    <!-- <ul class="nav navbar-nav ml-auto">
        {{--<li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>--}}
        <li class="nav-item dropdown notification">
            <a class="nav-link notification__icon" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="totalNotificationCount" data-total_count="0"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right notification__popup">
                <div class="dropdown-header text-center">
                    <div class="header-heading">
                        <strong>Notifications</strong>
                        <span class="totalNotificationCount" data-total_count="0" style="display: none"></span>
                    </div>
                    <div class="header-button">
                        <a href="#" class="read-all-notification">Read All</a>
                    </div>
                </div>
                <a class="dropdown-item read" id="noNewNotification">
                    No Notifications Yet...
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                {{ (htmlspecialchars_decode(Auth::user()->name))??'' }}
                <img class="img-avatar" src="{{Auth::user()->photo_url}}" alt="cambria">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>{{ __('messages.account') }}</strong>
                </div>              
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal"><i
                            class="fa fa-lock"></i>{{ __('messages.change_password') }}</a>
                <a class="dropdown-item" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>{{ __('messages.logout') }}
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul> -->
</header>

<div class="app-body">  
    @include('layouts.change_password')
    <main class="main">
        @yield('content')
    </main>
</div>
@include('chat.templates.notification')
@include('partials.file-upload')
@include('partials.set_custom_status_modal')
<footer class="app-footer">
    <!-- <div>
        <a href="">{{ getAppName() }}</a>
        <span>&copy; 2019 - {{date('Y')}} {{ getCompanyName() }}.</span>
    </div> -->
    <div class="footer__bar">
        <!-- <div class="ml-auto align-items-center" id="collapsedNav"> -->
                <!-- <nav> -->
                    @auth
                        @if(   Auth::user()-> user==1 && Auth::user()-> is_system !=1)
                            <a href="{{ url('/home') }}" class="footer__link {{ Request::is('home*') ? 'active' : '' }}"><i class="fa fa-home"></i></a>
                            <a href="{{ url('/conversations') }}" class="footer__link {{ Request::is('conversations*') ? 'active' : '' }}"><i class="fa fa-comment"></i></a>
                            <a href="{{ url('/timeline') }}" class="footer__link {{ Request::is('timeline*') ? 'active' : '' }}"><i class="fa fa-clock-o"></i></a>
                            <a href="{{ url('/users_profile') }}" class="footer__link {{ Request::is('users_profile*') ? 'active' : '' }}"><i class="fa fa-user"></i></a>
                            
                        @elseif( Auth::user()-> user==2)
                            <a href="{{ url('/home') }}" class="footer__link {{ Request::is('home*') ? 'active' : '' }}"><i class="fa fa-home"></i></a>
                            <a href="{{ url('/conversations') }}" class="footer__link {{ Request::is('conversations*') ? 'active' : '' }}"><i class="fa fa-comment"></i></a>
                            <a href="{{ url('/file_upload') }}" class="footer__link {{ Request::is('file_upload*') ? 'active' : '' }}" ><i class="fa fa-plus-circle"></i></a>
                            <a href="{{ url('/timeline') }}" class="footer__link {{ Request::is('timeline*') ? 'active' : '' }}"><i class="fa fa-clock-o"></i></a>
                            <a href="{{ url('/profile') }}" class="footer__link {{ Request::is('profile*') ? 'active' : '' }}"><i class="fa fa-user"></i></a>
                        @elseif( Auth::user()-> user==1 && Auth::user()-> is_system==1)
                            <a href="{{ url('/home') }}" class="footer__link {{ Request::is('home*') ? 'active' : '' }}"><i class="fa fa-home"></i></a>
                            <a href="{{ url('/conversations') }}" class="footer__link {{ Request::is('conversations*') ? 'active' : '' }}"><i class="fa fa-comment"></i></a>
                            <a href="{{ url('/timeline') }}" class="footer__link {{ Request::is('timeline*') ? 'active' : '' }}"><i class="fa fa-clock-o"></i></a>
                            <a href="{{ url('/users_profile') }}" class="footer__link {{ Request::is('users_profile*') ? 'active' : '' }}"><i class="fa fa-user"></i></a>
                            <a href="{{ url('/creators') }}" class="footer__link {{ Request::is('settings*') ? 'active' : '' }}"><i class="fa fa-user"></i></a>
                        @endif
                    @else
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="footer__link {{ Request::is('login*') ? 'active' : '' }}">{{ __('messages.login') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="footer__link {{ Request::is('register*') ? 'active' : '' }}">{{ __('messages.register') }}</a>
                        @endif
                    @endauth
                <!-- </nav> -->
        <!-- </div> -->
    </div>
</footer>
</body>
<!-- jQuery 3.1.1 -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="{{ mix('assets/js/popper.min.js') }}"></script>
<script src="{{ mix('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ mix('assets/js/coreui.min.js') }}"></script>
<script src="{{ mix('assets/js/jquery.toast.min.js') }}"></script>
<script src="{{ mix('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assets/icheck/icheck.min.js') }}"></script>
<script src="https://www.jsviews.com/download/jsviews.min.js"></script>
<script src="{{ asset('js/emojionearea.js') }}"></script>
<script src="{{ mix('assets/js/emojione.min.js') }}"></script>
@yield('page_js')
<script>
    let setLastSeenURL = '{{url('update-last-seen')}}';
    let pusherKey = '{{ config('broadcasting.connections.pusher.key') }}';
    let pusherCluster = '{{ config('broadcasting.connections.pusher.options.cluster') }}';
    let messageDeleteTime = '{{ config('configurable.delete_message_time') }}';
    let changePasswordURL = '{{ url('change-password') }}';
    let deletePostURL = '{{ url('deletePost') }}';
    let baseURL = '{{ url('/') }}';
    let conversationsURL = '{{ route('conversations') }}';
    let notifications = JSON.parse(JSON.stringify({!! json_encode(getNotifications()) !!}));
    let loggedInUserId = '{{Auth::id()}}';
    let loggedInUserStatus = '{!! Auth::user()->userStatus !!}';
    if (loggedInUserStatus != '') {
        loggedInUserStatus = JSON.parse(JSON.stringify({!! Auth::user()->userStatus !!}));
    }
    let setUserCustomStatusUrl = '{{ route('set-user-status') }}';
    let clearUserCustomStatusUrl = '{{ route('clear-user-status') }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
<script src="{{ mix('assets/js/app.js') }}"></script>
<script src="{{ mix('assets/js/custom.js') }}"></script>
<script src="{{ mix('assets/js/notification.js') }}"></script>
<script src="{{ mix('assets/js/set_user_status.js') }}"></script>
<script src="{{ mix('assets/js/set-user-on-off.js') }}"></script>

@yield('scripts')

</html>
