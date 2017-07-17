<?php

namespace App\Http\Controllers\Myadmin;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Model\Partner;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use function isEmpty;
use const null;
use function redirect;
use function session;
use function var_dump;
use function view;

class MyadminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $name = $request->get('name');
            $password = $request->get('password');
            $user = Partner::where('account',$name)->where('password',$password)->first();
//            dd($user->id);
//            if ($name=='admin'  &&  $password=='admin'){
            if ( $user==null )
                return '测试成功:您输入了 '.$name.' 和 '.$password;
            else
            {
                $request->session()->put('login', 'true');
//                Auth::loginUsingId ($user->id);
//                return view('myadmin.order');
                return redirect('myadmin/order');
            }
        }
        return view('myadmin.login');
    }
    public function order()
    {
        return view('myadmin.order');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('login');
        return redirect('/myadmin');
    }
    public function show($id)
    {
        $openid = session('wechat.oauth_user.id');
        $partner = Partner::where('openid',$openid)->get(['account']);
        if ($partner[0]->account != 'admin')
            return view('msg.nopower');

        $order = Order::find($id);
        $pictures = Order::find($id)->pictures;
        return view('xiangxi',compact('order','pictures'));
    }


    public function paginate($start,$size)
    {
        $orders = Order::latest()->skip($start)->take($size)->
        get(['id','name','money','idcard','teshu','partner_name','qianyue_name','qingkuang']);
        $neworders = collect();

//        $count = count($orders);
//        for ($i=0;$i<$count;$i++)
//        {
//            $pictures = $orders[$i]->pictures()->get();
//            $order = collect($orders[$i]);
//            foreach ($pictures as $picture) {
//
//            }
//
//            $order->put('pictures',$pictures);
//            $neworders->push($order);
//        }
        foreach ($orders as $order) {
            $pictures = $order->pictures()->get();
            $temporder = collect($order);
            $temppictures = collect();
            foreach ($pictures as $picture) {
                $temppictures->push($picture->path);

            }
             $temporder->put('pictures',$temppictures);

            $neworders->push($temporder);
        }
        return $neworders->toArray();
    }
}
