<?php

namespace App\Http\Controllers;

use App\Http\Model\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    public function order()
    {
        $openid = session('wechat.oauth_user.id');
        $orders = Order::where('openid',$openid)->get(['id','status','name','money','teshu','project']) ;
//        $orders=[];
        return view('order',compact('orders'));
    }
}
