<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

Route::prefix('admin')->namespace('Backend')->group(function () {
  Route::match(['get', 'post'], '/', 'AdminController@login');

  Route::group(['middleware' => 'admin'], function () {
    Route::match(['get', 'post'], '/account', 'AdminController@account');
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/logout', 'AdminController@logout');
    Route::post('/check-password', 'AdminController@checkPassword');
    //projects
    Route::get('/index/projects', 'ProjectController@index');
    Route::match(['get', 'post'], '/create/project', 'ProjectController@create');
    Route::match(['get', 'post'], '/edit/project/{id}', 'ProjectController@edit');
    Route::get('/delete/project/{id}', 'ProjectController@delete');
    Route::post('/change-status/project', 'ProjectController@changeStatus');
    Route::post('/delete-all/projects', 'ProjectController@deleteAll');
    //news
    Route::get('/index/news', 'NewController@index');
    Route::match(['get', 'post'], '/create/new', 'NewController@create');
    Route::match(['get', 'post'], '/edit/new/{id}', 'NewController@edit');
    Route::get('/delete/new/{id}', 'NewController@delete');
    Route::post('/change-status/new', 'NewController@changeStatus');
    Route::post('/delete-all/news', 'NewController@deleteAll');
    //////
    Route::get('/index/contacts', 'ContactController@index');
    Route::get('/edit/contact/{id}', 'ContactController@edit');
    Route::get('/delete/contact/{id}', 'ContactController@delete');
    Route::post('/change-status/contact', 'ContactController@changeStatus');
    Route::post('/delete-all/contacts', 'ContactController@deleteAll');
  });
});
Route::namespace('Frontend')->group(function () {
  Route::get('/', 'HSoftController@dashboard');

  ///////////////////

  Route::post('/dashboard/register', 'UserController@register');
  Route::post('/dashboard/login', 'UserController@login');
  Route::post('/dashboard/check-phone-number', 'UserController@checkPhone');
  /////////////////////////////
  Route::post('/dashboard/contact', 'ContactController@contact');
  Route::post('/dashboard/check-code', 'UserController@checkCode');
  Route::post('/dashboard/change-password', 'UserController@changePassword');
  //////////////////
  Route::group(['middleware' => 'auth'], function () {
    Route::match(['get', 'post'], '/dashboard/user', 'UserController@index');
    Route::get('/edit/user', 'UserController@edit');
    Route::get('/dashboard/logout', 'UserController@logout');
    //////////////////////////
    Route::get('/dashboard/terms', 'HSoftController@term');
    Route::get('/dashboard/about-us', 'HSoftController@aboutUs');
    Route::get('/detail/infor', 'HSoftController@detailInfor');
    ////////////////////
    Route::get('/dashboard/news', 'NewController@index');
    Route::get('/detail/new/{id}', 'NewController@detail');
    ///////////////////
    Route::get('/dashboard/projects', 'ProjectController@index');
    Route::get('/detail/project/{id}', 'ProjectController@detail');
    ///////////////////
    Route::post('/dashboard/comments', 'CommentController@comments');
    Route::post('/dashboard/check-reading', 'UserController@checkReading');
  });
});
