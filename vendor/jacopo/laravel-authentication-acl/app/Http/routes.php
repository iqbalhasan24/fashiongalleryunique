<?php

use Illuminate\Session\TokenMismatchException;

/*
  |--------------------------------------------------------------------------
  | Public side (no auth required)
  |--------------------------------------------------------------------------
  |
 */

/**
 * User login and logout
 */

Route::group(['middleware' => ['web']], function () {

    Route::get('/admin/login', [
        "as" => "user.admin.login",
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin'
    ]);
    Route::get('/login', [
        "as" => "user.login",
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin'
    ]);
    Route::get('/user/logout', [
        "as" => "user.logout",
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getLogout'
    ]);
    Route::post('/user/login', [
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@postAdminLogin',
        "as" => "user.login.process"
    ]);
    Route::get('/user/login', [
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin',
        "as" => "user.login.process"
    ]);
    Route::get('/users/login', [
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin',
        "as" => "user.login.process"
    ]);
    Route::post('/users/login', [
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@postAdminLogin',
        "as" => "user.login.process"
    ]);
    Route::post('/login', [
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin',
        "as" => "user.login"
    ]);

    /**
     * Password recovery
     */
    Route::get('/user/change-password', [
        "as" => "user.change-password",
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getChangePassword'
    ]);
    Route::get('/user/recovery-password', [
        "as" => "user.recovery-password",
        "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getReminder'
    ]);
    Route::post('/user/change-password/', [
        'uses' => 'LaravelAcl\Authentication\Controllers\AuthController@postChangePassword',
        "as" => "user.reminder.process"
    ]);

    Route::get('/user/change-password-success', [
        "uses" => function () {
            return view('laravel-authentication-acl::client.auth.change-password-success');
        },
        "as" => "user.change-password-success"
            ]
    );
    Route::post('/user/reminder', [
        'uses' => 'LaravelAcl\Authentication\Controllers\AuthController@postReminder',
        "as" => "user.reminder"
    ]);
    Route::get('/user/reminder-success', [
        "uses" => function () {
            return view('laravel-authentication-acl::client.auth.reminder-success');
        },
        "as" => "user.reminder-success"
    ]);

    /**
     * User signup
     */
    Route::post('/user/signup', [
        'uses' => 'LaravelAcl\Authentication\Controllers\UserController@postSignup',
        "as" => "user.signup.process"
    ]);
    Route::get('/user/signup', [
        'uses' => 'LaravelAcl\Authentication\Controllers\UserController@signup',
        "as" => "user.signup"
    ]);
    Route::post('captcha-ajax', [
        "before" => "captcha-ajax",
        'uses' => 'LaravelAcl\Authentication\Controllers\UserController@refreshCaptcha',
        "as" => "user.captcha-ajax.process"
    ]);
    Route::get('/user/email-confirmation', [
        'uses' => 'LaravelAcl\Authentication\Controllers\UserController@emailConfirmation',
        "as" => "user.email-confirmation"
    ]);
    Route::get('/user/signup-success', [
        "uses" => 'LaravelAcl\Authentication\Controllers\UserController@signupSuccess',
        "as" => "user.signup-success"
    ]);

    /*
      |--------------------------------------------------------------------------
      | Admin side (auth required)
      |--------------------------------------------------------------------------
      |
     */
    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {
        /**
         * dashboard
         */
        Route::get('/admin/users/dashboard', [
            'as' => 'dashboard.default',
            'uses' => 'LaravelAcl\Authentication\Controllers\DashboardController@base'
        ]);
        Route::get('/admin/let-us-do', [
            'as' => 'dashboard.letusdo',
            'uses' => 'LaravelAcl\Authentication\Controllers\DashboardController@letUsDo'
        ]);
        Route::get('/admin/users/dashboard/pdf', [
            'as' => 'dashboard.pdf',
            'uses' => 'LaravelAcl\Authentication\Controllers\DashboardController@pdf'
        ]);
        Route::get('/admin/users/dashboard/index', [
            'as' => 'dashboard.index',
            'uses' => 'LaravelAcl\Authentication\Controllers\DashboardController@index'
        ]);
        Route::get('/admin/users/dashboard/index2', [
            'as' => 'dashboard.index2',
            'uses' => 'LaravelAcl\Authentication\Controllers\DashboardController@index'
        ]);


        /**
         * user
         */
        Route::get('/admin/users/list', [
            'as' => 'users.list',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@getList'
        ]);
        Route::get('/admin/users/edit', [
            'as' => 'users.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editUser'
        ]);
        Route::post('/admin/users/edit', [
            'as' => 'users.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@postEditUser'
        ]);
        Route::get('/admin/users/delete', [
            'as' => 'users.delete',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@deleteUser'
        ]);
        Route::post('/admin/users/groups/add', [
            'as' => 'users.groups.add',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@addGroup'
        ]);
        Route::post('/admin/users/groups/delete', [
            'as' => 'users.groups.delete',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@deleteGroup'
        ]);
        Route::post('/admin/users/editpermission', [
            'as' => 'users.edit.permission',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editPermission'
        ]);
        Route::get('/admin/users/profile/edit', [
            'as' => 'users.profile.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editProfile'
        ]);
        Route::post('/admin/users/profile/edit', [
            'as' => 'users.profile.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@postEditProfile'
        ]);
        Route::post('/admin/users/profile/addField', [
            'as' => 'users.profile.addfield',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@addCustomFieldType'
        ]);
        Route::post('/admin/users/profile/deleteField', [
            'as' => 'users.profile.deletefield',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@deleteCustomFieldType'
        ]);
        Route::post('/admin/users/profile/avatar', [
            'as' => 'users.profile.changeavatar',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@changeAvatar'
        ]);
        Route::get('/admin/users/profile/self', [
            'as' => 'users.selfprofile.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editOwnProfile'
        ]);
        Route::post('/admin/profile_delete', [
            'as' => 'users.profileDelete',
            'uses' => 'LaravelAcl\Authentication\Controllers\CompanyProfileController@deleteProfile'
        ]);
        Route::get('/admin/company_profile', [
            'as' => 'users.companyProfile',
            'uses' => 'LaravelAcl\Authentication\Controllers\CompanyProfileController@companyProfile'
        ]);
        Route::get('/admin/company_profile?modal=yes', [
            'as' => 'users.letsdo',
            'uses' => 'LaravelAcl\Authentication\Controllers\CompanyProfileController@companyProfile'
        ]);

        Route::post('/admin/company_profile/edit', [
            'as' => 'users.company_profile.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\CompanyProfileController@EditCompanyProfile'
        ]);

        /**
         * groups
         */
        Route::get('/admin/groups/list', [
            'as' => 'groups.list',
            'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@getList'
        ]);
        Route::get('/admin/groups/edit', [
            'as' => 'groups.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@editGroup'
        ]);
        Route::post('/admin/groups/edit', [
            'as' => 'groups.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@postEditGroup'
        ]);
        Route::get('/admin/groups/delete', [
            'as' => 'groups.delete',
            'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@deleteGroup'
        ]);
        Route::post('/admin/groups/editpermission', [
            'as' => 'groups.edit.permission',
            'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@editPermission'
        ]);

        /**
         * permissions
         */
        Route::get('/admin/permissions/list', [
            'as' => 'permission.list',
            'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@getList'
        ]);
        Route::get('/admin/permissions/edit', [
            'as' => 'permission.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@editPermission'
        ]);
        Route::post('/admin/permissions/edit', [
            'as' => 'permission.edit',
            'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@postEditPermission'
        ]);
        Route::get('/admin/permissions/delete', [
            'as' => 'permission.delete',
            'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@deletePermission'
        ]);

        Route::get('/admin/media/category_list', [
            'as' => 'media.category_list',
            'uses' => 'LaravelAcl\Authentication\Controllers\MediaController@getMediaCategoryList'
        ]);
        Route::get('/admin/media/categories/new', [
            'as' => 'media.categories',
            'uses' => 'LaravelAcl\Authentication\Controllers\MediaController@newMediaCategory'
        ]);
        Route::post('/admin/mediacategories/addCategory', [
            'as' => 'media.newCategory',
            'uses' => 'LaravelAcl\Authentication\Controllers\MediaController@postMediaCategory'
        ]);
        Route::get('/admin/media/categories/edit', [
            'as' => 'media.editCategory',
            'uses' => 'LaravelAcl\Authentication\Controllers\MediaController@editMediaCategory'
        ]);
        Route::post('/admin/media/categories/edit', [
            'as' => 'media.psotEditMediaCategory',
            'uses' => 'LaravelAcl\Authentication\Controllers\MediaController@postEditMediaCategory'
        ]);
        Route::get('/admin/media/categories/delete', [
            'as' => 'media.category_delete',
            'uses' => 'LaravelAcl\Authentication\Controllers\MediaController@deleteMediaCategory'
        ]);
    });
});
//////////////////// Automatic error handling //////////////////////////

if (Config::get('acl_base.handle_errors')) {
    App::error(function (RuntimeException $exception, $code) {
        switch ($code) {
            case '404':
                return view('laravel-authentication-acl::client.exceptions.404');
                break;
            case '401':
                return view('laravel-authentication-acl::client.exceptions.401');
                break;
            case '500':
                return view('laravel-authentication-acl::client.exceptions.500');
                break;
        }
    });

    App::error(function (TokenMismatchException $exception) {
        return view('laravel-authentication-acl::client.exceptions.500');
    });
}