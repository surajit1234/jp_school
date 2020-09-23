<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', 'HomeController@index')->name('home');
//Admin Routes
Route::group(['prefix'=>'secure-panel'], function() {    
    Route::get('/','Admin\AuthController@showLoginForm')->name('show.admin.login');
    Route::get('/login','Admin\AuthController@showLoginForm')->name('show.admin.login');
    Route::post('/login','Admin\AuthController@login')->name('admin.login.submit');
    Route::post('/logout','Admin\AuthController@logout')->name('admin.logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
    Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset.token');
    Route::post('password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.request');
});

Route::group(['prefix'=>'secure-panel','middleware' => ['admin']], function() {  
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');  
    //Admin
    Route::get('/admins', 'Admin\AdminController@index')->name('admin.admin.index');
    Route::get('/admin/profile', 'Admin\AdminController@showProfile')->name('admin.admin.profile');
    Route::post('/admin/update-profile', 'Admin\AdminController@updateProfile')->name('admin.admin.update-profile');
    Route::post('/admin/change-password', 'Admin\AdminController@changePassword')->name('admin.admin.change-password');

    Route::get('/site-settings', 'Admin\SiteSettingsController@index')->name('admin.settings.index');
    Route::post('/site-settings/update/{id}', 'Admin\SiteSettingsController@update')->name('admin.settings.update');
    
    //Page Contents
    Route::get('/page-contents', 'Admin\PageContentController@index')->name('admin.page_contents.index');
    Route::get('/page-contents/edit/{id}', 'Admin\PageContentController@edit')->name('admin.page_contents.edit');
    Route::post('/page-contents/update/{id}', 'Admin\PageContentController@update')->name('admin.page_contents.update');
    Route::post('/page-contents/upload_image', 'Admin\PageContentController@uploadImage')->name('admin.page_contents.tiny_mce.image_upload');
    Route::get('/page-contents/delete/{id}', 'Admin\PageContentController@destroy')->name('admin.page_contents.delete');

    //Email Templates
    Route::get('/admin/email-templates', 'Admin\EmailTemplateController@index')->name('admin.email_templates.index');
    Route::get('/admin/email-templates/edit/{id}', 'Admin\EmailTemplateController@edit')->name('admin.email_templates.edit');
    Route::post('/admin/email-templates/update/{id}', 'Admin\EmailTemplateController@update')->name('admin.email_templates.update');
    Route::post('/admin/email-templates/upload_image', 'Admin\EmailTemplateController@uploadImage')->name('admin.email_templates.tiny_mce.image_upload');

    //Banners
    Route::get('/banners', 'Admin\BannerController@index')->name('admin.banners.index');
    Route::get('/site-banners/create', 'Admin\BannerController@create')->name('admin.banners.create');
    Route::post('/site-banners/store', 'Admin\BannerController@store')->name('admin.banners.store');
    Route::get('/site-banners/edit/{id}', 'Admin\BannerController@edit')->name('admin.banners.edit');
    Route::post('/site-banners/update/{id}', 'Admin\BannerController@update')->name('admin.banners.update');
    Route::get('/site-banners/delete/{id}', 'Admin\BannerController@destroy')->name('admin.banners.delete');
    Route::post('/site-banners/upload-file', 'Admin\BannerController@uploadFile')->name('admin.banners.upload_file');
});    
