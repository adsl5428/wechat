<?php

namespace App\Http\Controllers\Myadmin;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use const null;
use function redirect;

class MyadminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $name = $request->get('name');
            $password = $request->get('password');
            if ($name=='admin'  &&  $password=='admin'){
//                $request->session()->put('status','login');
//                $orders = Order::simplePaginate(20);
                return redirect('myadmin/order');
            }
            else return '测试成功:您输入了 '.$name.' 和 '.$password;
        }
        return view('myadmin.login');
    }
    public function order($id =null)
    {
        if ($id == null)
        {
            $orders = Order::simplePaginate(2);
            return view('myadmin.order',compact('orders'));
        }
        else
        {
//            $orders = Order::all();
//            dd($orders);
//            return view('myadmin.order',compact('orders'));
        }
    }
    public function picture($id)
    {

    }
}
