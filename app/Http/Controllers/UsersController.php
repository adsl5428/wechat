<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public $wechat;

    public function __construct(Application $wechat)
    {
        $this->wechat=$wechat;
    }

    public function users( )
    {
        $users=$this->wechat->user->lists();
        return $users;
    }
    public function login( )
    {
     $user = session('wechat.oauth_user'); // 拿到授权用户资料
     dd($user);
    }
}
