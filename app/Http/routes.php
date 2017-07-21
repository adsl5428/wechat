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
//'middleware'=>['web','myadmin'],

Route::any('/myadmin', 'Myadmin\MyadminController@login');

Route::group(['middleware' => 'myadmin','prefix' => 'myadmin'], function () {
    Route::post('/shenhe', 'SmsController@shenhe');
});

Route::group(['middleware' => 'myadmin','prefix' => 'myadmin','namespace' => 'Myadmin'], function () {

    Route::get('/orderpc/{id}', 'MyadminController@showpc');
    Route::get('/logout', 'MyadminController@logout');
    Route::get('/push', 'MyadminController@push');
    Route::get('orders','MyadminController@orders');
    Route::get('api/order/start/{start}/size/{end}','MyadminController@paginate');
});
//Route::get('myadmin/order/{id?}','Myadmin\MyadminController@order');
//Route::get('myadmin/api/order/start/{start}/size/{end}','Myadmin\MyadminController@paginate');

Route::group(['middleware' => 'myadmin'], function () {

Route::get('/menu/create','MenuController@create');
Route::get('/menu','MenuController@index');
Route::get('/menu/del','MenuController@del');
});

Route::get('demo/{id}','SmsController@demo');    //创建标签

Route::get('/welcome', function () {
    return url('uploads','123456');
   return view('welcome');
});
Route::get('moban','SmsController@test');    //创建标签

Route::get('tag/create/{name}','TagController@create');    //创建标签
Route::get('tag/lists','TagController@lists');          //标签类表
Route::get('tag/addtotag/{id}/{tid}','TagController@addtotag'); //将 id 加入到  id为tid的标签中
Route::get('tag/deltotag/{id}/{tid}','TagController@deltotag'); //将 id 从 tid标签中删除
Route::get('tag/usersoftag/{tid}','TagController@usersoftag');  //得到 标签下的用户
Route::get('tag/usertags/{id}','TagController@usertags');       //得到用户属于哪个 标签
Route::get('tag/delete/{id}','TagController@delete');       //得到用户属于哪个 标签


Route::get('admin/lists','AdminController@lists');
Route::any('picture','AdminController@picture');
Route::get('/suijishu','UsersController@rand50');

Route::get('/gettel','UsersController@gettel');

Route::get('/sms','SmsController@sendSms');





Route::get('/getgroup', 'GroupController@getgroup');

Route::get('/active/{code}','UsersController@active');

Route::group(['middleware' => ['web']], function () {

    Route::get('/users','UsersController@users');
});

Route::any('/test', 'LoanController@test');
Route::any('/test2', 'LoanController@test2');
Route::any('/order', 'OrderController@order');
Route::get('/order/{id}', 'OrderController@show');

Route::any('/test2', 'LoanController@test2');
Route::post('/del', 'LoanController@del');
//Route::any('/loan1', 'LoanController@loan1');
//Route::any('/loan3', 'LoanController@loan3');
//Route::any('/loan2', 'LoanController@loan2');

Route::post('/staffregister', 'UsersController@staffregister');

Route::get('/back', 'UsersController@back');

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {

    Route::get('/login', 'UsersController@login');
    Route::get('/users/mail', 'UsersController@mail');
    Route::any('/users/register', 'UsersController@register');

    Route::get('/addstaff', 'UsersController@addstaff');
    Route::get('/addpartner', 'UsersController@addpartner');
    Route::post('/staffregister', 'UsersController@staffregister');
    Route::post('/partnerregister', 'UsersController@partnerregister');

});
//Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
Route::group(['middleware' => [ 'wechat.oauth']], function () {
//Route::group(['middleware' => ['web', 'wechat.oauth','partn']], function () {

    Route::get('/myadmin/order/{id}', 'Myadmin\MyadminController@show');


    Route::any('/loan1/{id?}', 'LoanController@loan1');
    Route::any('/loan3', 'LoanController@loan3');
    Route::get('/loan2', 'LoanController@loan2');
    Route::get('/loan22', 'LoanController@loan22');
    Route::post('/loan2', 'OrderController@create');

    Route::get('/edit1/{id?}', 'LoanController@edit1');
    Route::post('/edit1', 'OrderController@update');
    Route::get('/edit2', 'LoanController@edit2');

    Route::any('/order/{id}/upload', 'OrderController@buchongupdate');
    Route::any('/order/{id}/yuyue', 'OrderController@yuyue');
    Route::post('/order/{id}/updateok', 'SmsController@updateok');


});
Route::group(['middleware' => [ 'wechat.oauth','myadminwechat'],'prefix' => 'myadmin'], function () {

    Route::post('/mshenhe', 'SmsController@shenhe');

});



Route::get('/nopower', function () {
    return view('msg.nopower');
});

Route::get('/complete', 'SmsController@complete') ;

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