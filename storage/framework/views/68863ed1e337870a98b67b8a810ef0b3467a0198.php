<!DOCTYPE html>
<html>
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(getAppName()); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('title'); ?> - <?php echo e(getAppName()); ?>">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/coreui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/icheck/skins/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/jquery.toast.min.css')); ?>">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

    <script src="<?php echo e(mix('assets/js/jquery.min.js')); ?>"></script>

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <!-- <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script> -->
    
    <script>
        let webNotificationRoute = '<?php echo e(url('update-web-notifications')); ?>/';
        let currentUserId = '<?php echo e(getLoggedInUserId()); ?>';
        let isSubscribedBefore = '<?php echo e(!is_null(Auth::user()->is_subscribed) ? true : false); ?>';

        let oneSignalAppId = '<?php echo e(config('onesignal.app_id')); ?>';
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function () {
            OneSignal.init({
                appId: oneSignalAppId,
            });

            // if push is disabled in DB then disable it in OneSignal too.
            let isPushEnabled = '<?php echo e(Auth::user()->is_subscribed); ?>';
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
    <link rel="stylesheet" href="<?php echo e(asset('css/emojionearea.min.css')); ?>">
    <!-- google font -->
    <link href="//fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
    <!-- font awesome version 4.7 -->
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/font-awesome.css')); ?>">
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/landing-page-style.css')); ?>">
    <?php echo $__env->yieldContent('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('assets/css/style.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <div class="header__bar">
        <a href="#" data-toggle="modal" data-target="#AlertView" class="header__link"><i class="fa fa-video-camera"></i></a>
    </div>
    <div class="header__logo-brand">
                <!-- <img src="<?php echo e(getLogoUrl()); ?>" alt="logo-image" class="header__logo"> -->
                <span class="header__brand-name"><?php echo e(getAppName()); ?></span>
    </div>
    <div class="header__bar">
        <a href="#" data-toggle="modal" data-target="#AlertView" class="header__link"><i class="fa fa-search"></i></a>
    </div>
    <div class="header__collapsible ml-auto align-items-center" id="collapsedNav">
            <nav>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(   Auth::user()-> user==1 && Auth::user()-> is_system !=1): ?>
                        <a href="<?php echo e(url('/home')); ?>" class="header__link <?php echo e(Request::is('home*') ? 'active' : ''); ?>"><i class="fa fa-home"></i></a>
                        <a href="<?php echo e(url('/conversations')); ?>" class="header__link <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>"><i class="fa fa-comment"></i></a>
                        <a href="<?php echo e(url('/timeline')); ?>" class="header__link <?php echo e(Request::is('timeline*') ? 'active' : ''); ?>"><i class="fa fa-clock-o"></i></a>
                        <a href="<?php echo e(url('/users_profile')); ?>" class="header__link <?php echo e(Request::is('users_profile*') ? 'active' : ''); ?>"><i class="fa fa-user"></i></a>
                        
                    <?php elseif( Auth::user()-> user==2): ?>
                        <a href="#" data-toggle="modal" data-target="#AlertView" class="header__link"><i class="fa fa-video-camera"></i></a>
                        <a href="<?php echo e(url('/home')); ?>" class="header__link <?php echo e(Request::is('home*') ? 'active' : ''); ?>"><i class="fa fa-home"></i></a>
                        <a href="<?php echo e(url('/conversations')); ?>" class="header__link <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>"><i class="fa fa-comment"></i></a>
                        <a href="<?php echo e(url('/file_upload')); ?>" class="header__link <?php echo e(Request::is('file_upload*') ? 'active' : ''); ?>"><i class="fa fa-plus-circle"></i></a>
                        <a href="<?php echo e(url('/timeline')); ?>" class="header__link <?php echo e(Request::is('timeline*') ? 'active' : ''); ?>"><i class="fa fa-clock-o"></i></a>
                        <a href="<?php echo e(url('/profile')); ?>" class="header__link <?php echo e(Request::is('profile*') ? 'active' : ''); ?>"><i class="fa fa-user"></i></a>
                    <?php elseif( Auth::user()-> user==1 && Auth::user()-> is_system==1): ?>
                        <a href="<?php echo e(url('/home')); ?>" class="header__link <?php echo e(Request::is('home*') ? 'active' : ''); ?>"><i class="fa fa-home"></i></a>
                        <a href="<?php echo e(url('/conversations')); ?>" class="header__link <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>"><i class="fa fa-comment"></i></a>
                        <a href="<?php echo e(url('/timeline')); ?>" class="header__link <?php echo e(Request::is('timeline*') ? 'active' : ''); ?>"><i class="fa fa-clock-o"></i></a>
                        <a href="<?php echo e(url('/users_profile')); ?>" class="header__link <?php echo e(Request::is('users_profile*') ? 'active' : ''); ?>"><i class="fa fa-user"></i></a>
                        <a href="<?php echo e(url('/creators')); ?>" class="header__link <?php echo e(Request::is('creators*') ? 'active' : ''); ?>"><i class="fa fa-gear"></i></a>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(Route::has('login')): ?>
                        <a href="<?php echo e(route('login')); ?>" class="header__link <?php echo e(Request::is('login*') ? 'active' : ''); ?>"><?php echo e(__('messages.login')); ?></a>
                    <?php endif; ?>
                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>" class="header__link <?php echo e(Request::is('register*') ? 'active' : ''); ?>"><?php echo e(__('messages.register')); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            </nav>
    </div>

    <!-- <ul class="nav navbar-nav ml-auto">
        
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
                <?php echo e((htmlspecialchars_decode(Auth::user()->name))??''); ?>

                <img class="img-avatar" src="<?php echo e(Auth::user()->photo_url); ?>" alt="cambria">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong><?php echo e(__('messages.account')); ?></strong>
                </div>              
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal"><i
                            class="fa fa-lock"></i><?php echo e(__('messages.change_password')); ?></a>
                <a class="dropdown-item" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i><?php echo e(__('messages.logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
        </li>
    </ul> -->
</header>

<div class="app-body">  
    <?php echo $__env->make('layouts.change_password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<?php echo $__env->make('chat.templates.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.file-upload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.set_custom_status_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<footer class="app-footer">
    <!-- <div>
        <a href=""><?php echo e(getAppName()); ?></a>
        <span>&copy; 2019 - <?php echo e(date('Y')); ?> <?php echo e(getCompanyName()); ?>.</span>
    </div> -->
    <div class="footer__bar">
        <!-- <div class="ml-auto align-items-center" id="collapsedNav"> -->
                <!-- <nav> -->
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(   Auth::user()-> user==1 && Auth::user()-> is_system !=1): ?>
                            <a href="<?php echo e(url('/home')); ?>" class="footer__link <?php echo e(Request::is('home*') ? 'active' : ''); ?>"><i class="fa fa-home"></i></a>
                            <a href="<?php echo e(url('/conversations')); ?>" class="footer__link <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>"><i class="fa fa-comment"></i></a>
                            <a href="<?php echo e(url('/timeline')); ?>" class="footer__link <?php echo e(Request::is('timeline*') ? 'active' : ''); ?>"><i class="fa fa-clock-o"></i></a>
                            <a href="<?php echo e(url('/users_profile')); ?>" class="footer__link <?php echo e(Request::is('users_profile*') ? 'active' : ''); ?>"><i class="fa fa-user"></i></a>
                            
                        <?php elseif( Auth::user()-> user==2): ?>
                            <a href="<?php echo e(url('/home')); ?>" class="footer__link <?php echo e(Request::is('home*') ? 'active' : ''); ?>"><i class="fa fa-home"></i></a>
                            <a href="<?php echo e(url('/conversations')); ?>" class="footer__link <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>"><i class="fa fa-comment"></i></a>
                            <a href="<?php echo e(url('/file_upload')); ?>" class="footer__link <?php echo e(Request::is('file_upload*') ? 'active' : ''); ?>" ><i class="fa fa-plus-circle"></i></a>
                            <a href="<?php echo e(url('/timeline')); ?>" class="footer__link <?php echo e(Request::is('timeline*') ? 'active' : ''); ?>"><i class="fa fa-clock-o"></i></a>
                            <a href="<?php echo e(url('/profile')); ?>" class="footer__link <?php echo e(Request::is('profile*') ? 'active' : ''); ?>"><i class="fa fa-user"></i></a>
                        <?php elseif( Auth::user()-> user==1 && Auth::user()-> is_system==1): ?>
                            <a href="<?php echo e(url('/home')); ?>" class="footer__link <?php echo e(Request::is('home*') ? 'active' : ''); ?>"><i class="fa fa-home"></i></a>
                            <a href="<?php echo e(url('/conversations')); ?>" class="footer__link <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>"><i class="fa fa-comment"></i></a>
                            <a href="<?php echo e(url('/timeline')); ?>" class="footer__link <?php echo e(Request::is('timeline*') ? 'active' : ''); ?>"><i class="fa fa-clock-o"></i></a>
                            <a href="<?php echo e(url('/users_profile')); ?>" class="footer__link <?php echo e(Request::is('users_profile*') ? 'active' : ''); ?>"><i class="fa fa-user"></i></a>
                            <a href="<?php echo e(url('/creators')); ?>" class="footer__link <?php echo e(Request::is('settings*') ? 'active' : ''); ?>"><i class="fa fa-user"></i></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(Route::has('login')): ?>
                            <a href="<?php echo e(route('login')); ?>" class="footer__link <?php echo e(Request::is('login*') ? 'active' : ''); ?>"><?php echo e(__('messages.login')); ?></a>
                        <?php endif; ?>
                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="footer__link <?php echo e(Request::is('register*') ? 'active' : ''); ?>"><?php echo e(__('messages.register')); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                <!-- </nav> -->
        <!-- </div> -->
    </div>
</footer>
</body>
<!-- jQuery 3.1.1 -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="<?php echo e(mix('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/coreui.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/jquery.toast.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/sweetalert2.all.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/moment-timezone.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/icheck/icheck.min.js')); ?>"></script>
<script src="https://www.jsviews.com/download/jsviews.min.js"></script>
<script src="<?php echo e(asset('js/emojionearea.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/emojione.min.js')); ?>"></script>
<?php echo $__env->yieldContent('page_js'); ?>
<script>
    let setLastSeenURL = '<?php echo e(url('update-last-seen')); ?>';
    let pusherKey = '<?php echo e(config('broadcasting.connections.pusher.key')); ?>';
    let pusherCluster = '<?php echo e(config('broadcasting.connections.pusher.options.cluster')); ?>';
    let messageDeleteTime = '<?php echo e(config('configurable.delete_message_time')); ?>';
    let changePasswordURL = '<?php echo e(url('change-password')); ?>';
    let deletePostURL = '<?php echo e(url('deletePost')); ?>';
    let baseURL = '<?php echo e(url('/')); ?>';
    let conversationsURL = '<?php echo e(route('conversations')); ?>';
    let notifications = JSON.parse(JSON.stringify(<?php echo json_encode(getNotifications()); ?>));
    let loggedInUserId = '<?php echo e(Auth::id()); ?>';
    let loggedInUserStatus = '<?php echo Auth::user()->userStatus; ?>';
    if (loggedInUserStatus != '') {
        loggedInUserStatus = JSON.parse(JSON.stringify(<?php echo Auth::user()->userStatus; ?>));
    }
    let setUserCustomStatusUrl = '<?php echo e(route('set-user-status')); ?>';
    let clearUserCustomStatusUrl = '<?php echo e(route('clear-user-status')); ?>';
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
<script src="<?php echo e(mix('assets/js/app.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/custom.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/notification.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/set_user_status.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/set-user-on-off.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</html>
<?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/home/app.blade.php ENDPATH**/ ?>