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

use App\Http\Controllers\Userscontroller;

Route::get('/test', function () {
    return Redirect::to('/');
});
Route::get('/', function () {
   return view('welcome');
});

Route::get('tag/create/{name}','TagController@create');    //创建标签
Route::get('tag/lists','TagController@lists');          //标签类表
Route::get('tag/addtotag/{id}/{tid}','TagController@addtotag'); //将 id 加入到  id为tid的标签中
Route::get('tag/deltotag/{id}/{tid}','TagController@deltotag'); //将 id 从 tid标签中删除
Route::get('tag/usersoftag/{tid}','TagController@usersoftag');  //得到 标签下的用户
Route::get('tag/usertags/{id}','TagController@usertags');       //得到用户属于哪个 标签



Route::get('admin/lists','AdminController@lists');

Route::get('/suijishu','UsersController@rand50');

Route::get('/gettel','UsersController@gettel');

Route::get('/sms','SmsController@sendSms');
Route::get('/menu','MenuController@menu');
Route::get('/addmenu/{id}','MenuController@addmenu');
Route::get('/testmenu/{id}','MenuController@testmenu');



Route::get('/getgroup', 'GroupController@getgroup');

Route::get('/active/{code}','UsersController@active');

Route::group(['middleware' => ['web']], function () {

    Route::get('/users','UsersController@users');
});

Route::get('/addpartner', 'UsersController@addpartner');

Route::post('/staffregister', 'UsersController@staffregister');


Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/login', 'UsersController@login');
    Route::get('/users/mail', 'UsersController@mail');
    Route::any('/users/register', 'UsersController@register');

    Route::get('/addstaff', 'UsersController@addstaff');
    Route::post('/staffregister', 'UsersController@staffregister');
});



/*
Route::group(['middleware' => ['web']], function () {
    Route::get('/users','Userscontroller@users');
});*/

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