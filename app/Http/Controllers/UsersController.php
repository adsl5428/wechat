<?php

namespace App\Http\Controllers;

use App\http\Model\User;
use function dump;
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
        $user = session('wechat.oauth_user');
        //dd($user->getId());
        $userid=User::findorfail(1);
        dd($userid->openid);
        //return view('login',compact('user'));

        //return $user->getNickname();
    }
}
