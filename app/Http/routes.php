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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/h', function () {
    return 123;
});
Route::any('/wechat', 'WechatController@serve');


//Route::group(['prefix'=>'admin','namespace'=>'Admin'], function () {
//    Route::get('index', 'IndexController@index');
//    Route::get('info', 'IndexController@info');
//    Route::get('quit', 'LoginController@quit');
//    Route::any('pass', 'IndexController@pass');
//
//    Route::post('cate/changeorder', 'CategoryController@changeOrder');
//    Route::resource('category', 'CategoryController');
//
//    Route::resource('article', 'ArticleController');
//
//    Route::any('upload', 'CommonController@upload');
//
//});