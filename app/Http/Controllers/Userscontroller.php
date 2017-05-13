<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class Userscontroller extends Controller
{

    public $wechat;

    public function __construct(Application $wechat)
    {
        $this->wehcat=$wechat;
    }

    public function users()
    {
        
        $users=$this->wechat->user->lists();

        return $users;
    }
}
