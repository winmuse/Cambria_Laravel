<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
Route::get('activate', 'AuthController@verifyAccount');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/timeline', 'HomeController@timeline')->name('timeline');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/users_profile', 'HomeController@user_profile')->name('users_profile');
Route::get('/userprofile/{id}', 'HomeController@userprofile')->name('userprofile');

Route::post('/user/loveAction', 'HomeController@setLoveAction');
Route::post('/user/commentAction', 'HomeController@setCommentAction');

Route::post('new_creators/{user}/active-de-active', 'New_CreatorController@activeDeActiveUser')
    ->name('active-de-active-user');
Route::post('new_creators/{user}/update', 'New_CreatorController@update');
Route::delete('new_creators/{user}/archive', 'New_CreatorController@archiveUser');
Route::post('new_creators/restore', 'New_CreatorController@restoreUser');

Route::post('creators/{user}/active-de-active', 'CreatorController@activeDeActiveUser')
    ->name('active-de-active-user');
Route::post('creators/{user}/block-de-block', 'CreatorController@blockDeBlockUser')
    ->name('block-de-block-user');
Route::post('creators/{user}/ban-de-ban', 'CreatorController@banDeBanUser')
    ->name('ban-de-ban-user');
Route::post('creators/{user}/update', 'CreatorController@update');
Route::delete('creators/{user}/archive', 'CreatorController@archiveUser');
Route::post('creators/restore', 'CreatorController@restoreUser');

Route::post('users/{user}/active-de-active', 'UserController@activeDeActiveUser')
    ->name('active-de-active-user');
Route::post('users/{user}/block-de-block', 'UserController@blockDeBlockUser')
    ->name('block-de-block-user');
Route::post('users/{user}/ban-de-ban', 'UserController@banDeBanUser')
    ->name('ban-de-ban-user');
Route::post('users/{user}/update', 'UserController@update');
Route::delete('users/{user}/archive', 'UserController@archiveUser');
Route::post('users/restore', 'UserController@restoreUser');

Route::post('delete_creators/{user}/restore-de-restore', 'Delete_CreatorController@restoreDeRestoreUser')
    ->name('restore-de-restore-user');

Route::post('delete_users/{user}/restore-de-restore', 'Delete_UserController@restoreDeRestoreUser')
    ->name('restore-de-restore-user');

Route::resource('roles', 'RoleController');
Route::post('roles/{role}/update', 'RoleController@update');   
Route::resource('reported-users', 'ReportUserController');
Route::group(['middleware' => ['user.activated', 'auth']], function () {
    
    Route::get('/file_upload', 'HomeController@file_upload')->name('file_uplod');
    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::post('/settings', 'SettingsController@update')->name('settings.update');


    Route::resource('new_creators', 'New_CreatorController');
    Route::resource('creators', 'CreatorController');
    Route::resource('delete_creators', 'Delete_CreatorController');
    Route::resource('monthly_subscriptions', 'Monthly_SubscriptionController');
    Route::resource('users', 'UserController');
    Route::resource('delete_users', 'Delete_UserController');
    Route::resource('admin_payment', 'Admin_PaymentController');
    Route::resource('creator_payment', 'Creator_PaymentController');
        
    //view routes
    Route::get('/conversations', 'ChatController@index')->name('conversations');
    Route::get('/edit_profile', 'UserController@getProfile')->name('edit_profile');
    Route::group(['namespace' => 'API'], function () {
        Route::get('logout', 'Auth\LoginController@logout');

        //get all user list for chat
        Route::get('users-list', 'UserAPIController@getUsersList');
        Route::get('get-users', 'UserAPIController@getUsers');
        Route::delete('remove-profile-image', 'UserAPIController@removeProfileImage');
        /** Change password */
        Route::post('change-password', 'UserAPIController@changePassword');
        Route::get('conversations/{ownerId}/archive-chat', 'UserAPIController@archiveChat');

        Route::get('get-profile', 'UserAPIController@getProfile');
        Route::post('profile', 'UserAPIController@updateProfile')->name('update.profile');
        Route::post('newpost', 'UserAPIController@newPost')->name('update.newpost');
        Route::post('newaccount', 'UserAPIController@newAccount')->name('update.newaccount');
        Route::post('updatemonthly', 'UserAPIController@updateMonthly')->name('update.updatemonthly');

        Route::post('deletePost', 'UserAPIController@deletePost');
        //subscribeaccount
        Route::post('subscribe', 'UserAPIController@subscribe')->name('update.subscribe');
        //follow
        Route::post('follow', 'UserAPIController@follow')->name('update.follow');
        Route::post('update-last-seen', 'UserAPIController@updateLastSeen');

        Route::post('send-message',
            'ChatAPIController@sendMessage')->name('conversations.store')->middleware('sendMessage');
        Route::get('users/{id}/conversation', 'UserAPIController@getConversation');
        Route::get('conversations-list', 'ChatAPIController@getLatestConversations');
        Route::get('archive-conversations', 'ChatAPIController@getArchiveConversations');
        Route::post('read-message', 'ChatAPIController@updateConversationStatus');
        Route::post('file-upload', 'ChatAPIController@addAttachment')->name('file-upload');
        Route::post('image-upload', 'ChatAPIController@imageUpload')->name('image-upload');
        Route::get('conversations/{userId}/delete', 'ChatAPIController@deleteConversation');
        Route::post('conversations/message/{conversation}/delete', 'ChatAPIController@deleteMessage');
        Route::post('conversations/{conversation}/delete', 'ChatAPIController@deleteMessageForEveryone');
        Route::get('/conversations/{conversation}', 'ChatAPIController@show');
        Route::post('send-chat-request', 'ChatAPIController@sendChatRequest')->name('send-chat-request');
        Route::post('accept-chat-request', 'ChatAPIController@acceptChatRequest')->name('accept-chat-request');
        Route::post('decline-chat-request', 'ChatAPIController@declineChatRequest')->name('decline-chat-request');

        /** Web Notifications */
        Route::put('update-web-notifications', 'UserAPIController@updateNotification');

        /** BLock-Unblock User */
        Route::put('users/{user}/block-unblock', 'BlockUserAPIController@blockUnblockUser');
        Route::get('blocked-users', 'BlockUserAPIController@blockedUsers');

        /** My Contacts */
        Route::get('my-contacts', 'UserAPIController@myContacts')->name('my-contacts');

        /** Groups API */
        Route::post('groups', 'GroupAPIController@create');
        Route::post('groups/{group}', 'GroupAPIController@update');
        Route::get('groups', 'GroupAPIController@index');
        Route::get('groups/{group}', 'GroupAPIController@show');
        Route::put('groups/{group}/add-members', 'GroupAPIController@addMembers');
        Route::delete('groups/{group}/members/{user}', 'GroupAPIController@removeMemberFromGroup');
        Route::delete('groups/{group}/leave', 'GroupAPIController@leaveGroup');
        Route::delete('groups/{group}/remove', 'GroupAPIController@removeGroup');
        Route::put('groups/{group}/members/{user}/make-admin', 'GroupAPIController@makeAdmin');
        Route::put('groups/{group}/members/{user}/dismiss-as-admin', 'GroupAPIController@dismissAsAdmin');
        Route::get('users-blocked-by-me', 'BlockUserAPIController@blockUsersByMe');

        Route::get('notification/{notification}/read', 'NotificationController@readNotification');
        Route::get('notification/read-all', 'NotificationController@readAllNotification');

        //set user custom status route
        Route::post('set-user-status', 'UserAPIController@setUserCustomStatus')->name('set-user-status');
        Route::get('clear-user-status', 'UserAPIController@clearUserCustomStatus')->name('clear-user-status');
        
        //report user
        Route::post('report-user', 'ReportUserController@store')->name('report-user.store');
    });
});

// Route::group(['middleware' => ['role:Admin', 'auth', 'user.activated']], function () {
//     Route::resource('users', 'UserController');
    
//     Route::post('users/{user}/active-de-active', 'UserController@activeDeActiveUser')
//         ->name('active-de-active-user');
//     Route::post('users/{user}/update', 'UserController@update');
//     Route::delete('users/{user}/archive', 'UserController@archiveUser');
//     Route::post('users/restore', 'UserController@restoreUser');

//     Route::resource('roles', 'RoleController');
//     Route::post('roles/{role}/update', 'RoleController@update');   
//     Route::resource('reported-users', 'ReportUserController');
// });

Route::group(['middleware' => ['web']], function () {

    Route::get('login/{provider}', 'Auth\SocialAuthController@redirect');
    Route::get('login/{provider}/callback', 'Auth\SocialAuthController@callback');
});
