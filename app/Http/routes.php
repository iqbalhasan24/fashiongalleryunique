<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

$path_name = 'home';
if(\Request::path()=='home') {
    $path_name = 'home'; 
} elseif(\Request::path()=='partnership') {
    $path_name = 'partnership';     
} elseif(\Request::path()=='westcon-comstor-aws-cloud-portfolio') {
    $path_name = 'portfolio';
} elseif(\Request::path()=='training-enablement') {
    $path_name = 'training';
} elseif(\Request::path()=='engaging-end-customers') {
    $path_name = 'engaging';
} elseif(\Request::path()=='activition-on-boarding-and-support') {
    $path_name = 'support';
} 
\Session::put('path_name',$path_name); 
//dd(\Session::get('path_name'));

Route::get('/admin/login', [
    "as" => "user.admin.login",
    "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin'
]);
Route::get('/', [
    'as' => 'home',
    'uses' => 'WelcomeController@getWecomePage'
]);
Route::get('/home', [
    'as' => 'home',
    'uses' => 'WelcomeController@getWecomePage'
]);

Route::get('/partnership', [
    'middleware' => array('logged', 'can_see'),
    'as' => 'partnership',
    'uses' => 'WelcomeController@getpartnership'
]);

Route::get('/our-products', [
    // 'middleware' => array('logged', 'can_see'),
    'as' => 'portfolio',
    'uses' => 'WelcomeController@getportfolio'
]);

Route::get('/training-enablement', [
    'middleware' => array('logged', 'can_see'),
    'as' => 'training',
    'uses' => 'WelcomeController@gettraining'
]);

Route::get('/engaging-end-customers', [
    'middleware' => array('logged', 'can_see'),
    'as' => 'engaging',
    'uses' => 'WelcomeController@getengaging'
]);

Route::get('/about-us', [
    // 'middleware' => array('logged', 'can_see'),
    'as' => 'support',
    'uses' => 'WelcomeController@getsupport'
]);


Route::get('/admin/contact-us', [
    // 'middleware' => array('logged', 'can_see'),
    'as' => 'contact.form',
    'uses' => 'ContactController@create']);
Route::post('/admin/contact-us', [
    'middleware' => array('logged', 'can_see'),
    'as' => 'contact.store',
    'uses' => 'ContactController@store']);

Route::post('/media/getAllMedia', [
    'as' => 'media.getAllMedia',
    'uses' => 'TemplateController@getAllMedia'
]);

Route::post('/media/search', [
    'as' => 'media.search',
    'uses' => 'TemplateController@mediaPagination'
]);
Route::get('/media/mediaPagination', [
    'as' => 'media.search',
    'uses' => 'TemplateController@mediaPagination'
]);
Route::get('/media/userPagination', [
    'as' => 'media.user-wise-pagination',
    'uses' => 'TemplateController@search'
]);

/* User log Activities START */
Route::get('/admin/snippetlog', [
    'as' => 'admin.logactivity',
    'uses' => 'LogActivityController@postSnippetLogActivity'
]);

/* not in use */
Route::get('/admin/userUpload', [
    'as' => 'admin.userupload',
    'uses' => 'LogActivityController@postUserUpload'
]);
/*User log Activities END */
