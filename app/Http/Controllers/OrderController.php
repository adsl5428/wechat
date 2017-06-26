<?php

namespace App\Http\Controllers;

use App\Http\Model\Order;
use App\Http\Model\Partner;
use Illuminate\Http\Request;

use App\Http\Requests;
use function var_dump;

class OrderController extends Controller
{
    public function order()
    {
        $openid = session('wechat.oauth_user.id');
        $orders = Order::where('openid',$openid)->get(['id','status','name','money','teshu','project']) ;
//        $orders=[];
        return view('order',compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);
        $pictures = Order::find($id)->pictures;
//        dd($order);
        return view('xiangxi',compact('order','pictures'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
//            dd(Input::except('_token'));
//            $orders = Order::where('idcard',$request->idcard)->get();
//            if ($userinfo != null && $userinfo->project == $request->session()->get('project')){
//                $data = [
//                    'status' => 0,
//                    'msg' => '此身份证已在此项目进件',
//                ];
//            return $data;}
//            dd($request->except('_token'));
            if($request->session()->get('project') == null)
            {            $data = [
                'status' => 1,
                'msg' => 'loan1',
            ];return $data;}
            $openid = session('wechat.oauth_user.id');
            $partner = Partner::where('openid',$openid)->firstOrFail();    //取一条
            $order = Order::create($request->except('_token'));
            $order->qianyue_name = $partner->qianyue;
            $order->partner_name = $partner->name;
            $order->status = 1;                 //步骤1 提交 借款人 身份信息
            $order->openid = $openid;
            $order->project = $request->session()->get('project');
            $order->save();
            $data = [
                'status' => 1,
                'msg' => 'loan3',
            ];
            $request->session()->put('status', '1');
            $request->session()->put('partner',$order->partner_name.'/'.$order->qianyue_name);
            $request->session()->put('teshu', $order->teshu);  //
            $request->session()->put('order_id', $order->id);  //
            return $data;
        }
    }
    public function update(Request $request)
    {
        if ($request->isMethod('post'))
        {

//            dd(Input::except('_token'));
//            $orders = Order::where('idcard',$request->idcard)->get();
//            if ($userinfo != null && $userinfo->project == $request->session()->get('project')){
//                $data = [
//                    'status' => 0,
//                    'msg' => '此身份证已在此项目进件',
//                ];
//            return $data;}
//            dd($request->except('_token'));
            $openid = session('wechat.oauth_user.id');
            $id = $request->get('id');
//            $partner = Partner::where('openid',$openid)->where('id',$id)->firstOrFail();
//            dd($partner);
            $order = Order::where('openid',$openid)->where('id',$id)->firstOrFail(); //是否为本人提交
//            dd($order);
            $order->qingkuang = $request->get('qingkuang');
            $order->teshu = $request->get('teshu');
            $order->save();
            $data = [
                'status' => 1,
                'msg' => '../edit2',
            ];
            $request->session()->put('status', '1');
            $request->session()->put('teshu', $order->teshu);  //
            $request->session()->put('order_id', $id);  //
            return $data;
        }
    }
}
