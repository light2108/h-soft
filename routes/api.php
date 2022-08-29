<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api')->group(function(){

    Route::prefix('admin')->group(function(){
        Route::post('/login', 'AdminController@login');
        Route::group(['middleware'=>'auth:a-api'],function(){
            Route::match(['get', 'post'], '/account', 'AdminController@account');
            Route::get('/dashboard', 'AdminController@dashboard');
            Route::get('/logout', 'AdminController@logout');
            Route::post('/check-password', 'AdminController@checkPassword');
            ///////////////////////
            Route::get('/users', 'UserController@index');
            Route::get('/user/{id}', 'UserController@user');

            //////////////////////////////
            Route::get('/projects', 'ProjectController@index');
            Route::get('/create/project', 'ProjectController@create');
            Route::match(['get', 'post'], '/edit/project/{id}', 'ProjectController@edit');
            Route::get('/delete/project/{id}', 'ProjectController@delete');
            //////////////////////////////
            // Route::post('/comment/project/{project_id}', 'CommentController@comment');
            Route::get('/comments', 'CommentController@index');
            /////////////////////////////
            Route::get('/news', 'NewController@index');
            Route::get('/create/new', 'NewController@create');
            Route::match(['get', 'post'], '/edit/new/{id}', 'NewController@edit');
            Route::get('/delete/new/{id}', 'NewController@delete');

            Route::get('/contacts', 'ContactController@index');
        });
    });
    //////////////////////////////////
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::post('/check-phone-number', 'UserController@checkPhone');
    Route::post('/check-code', 'UserController@checkCode');
    Route::post('/change-password', 'UserController@changePassword');
    Route::post('/contacts', 'ContactController@contact');
    Route::group(['middleware'=>'auth:api'], function(){
        Route::post('create/user', 'UserController@create');
        Route::get('/edit/user', 'UserController@edit');
        //////////////////////////
        Route::get('/terms', 'HSoftController@term');
        Route::get('/above-us', 'HSoftController@aboutUs');
        Route::get('/detail/infor', 'HSoftController@detailInfor');
        ////////////////////
        Route::get('/news', 'NewController@news');
        Route::get('/detail/new/{id}', 'NewController@detail');
        ///////////////////
        Route::get('/projects', 'ProjectController@projects');
        Route::get('/detail/project/{id}', 'ProjectController@detail');
        ///////////////////
        Route::post('/comments', 'CommentController@comments');
        //////////////////////////

        Route::get('/logout', 'UserController@logout');
    });
});
