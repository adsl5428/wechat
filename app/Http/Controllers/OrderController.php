<?php

namespace App\Http\Controllers;

use App\Http\Model\Order;
use App\Http\Model\Partner;
use App\Http\Model\Picture;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
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
            $order->qianyue_openid = $partner->qianyue_openid;
            $order->partner_name = $partner->name;
            $order->status = 1;                 //步骤1 提交 借款人 身份信息
            $order->openid = $openid;
            $order->project = $request->session()->get('project');
            $order->save();
            $data = [
                'status' => 1,
                'msg' => 'loan3',
            ];
            $request->session()->put('status', '初审');
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
    public function buchongupdate(Request $request,$id)
    {

        $openid = session('wechat.oauth_user.id');
        $order = Order::where('openid', $openid)->where('id', $id)->firstOrFail(); //是否为本人提交
        if ($request->isMethod('post')) {
            $file = $request->file('file');
            if ($file->isValid()) {
                $entension = $file->getClientOriginalExtension(); //上传文件的后缀.
                $newName = $request->leixing . date('-mdHis-Y-') . mt_rand(100, 999) . '.' . $entension;
                Storage::put($newName, file_get_contents($file->getRealPath()));
                $path = 'uploads/' . $newName;
//                dd(Input::get('type1'));
                $temp = [
                    'order_id' => $id,
                    'path' => $newName,
                    'type' => $request->get('type1') - 100,
                ];
//                dd($temp);
                $pictur = Picture::create($temp);

                $data = [
                    'eg' => $pictur->id,
                    'path' => $path,
                ];

                return $data;
            }
        }

        $names[3] = ['房产证', 104, 'fang-chan'];
        $names[7] = ['补充材料', 108, 'bu-chong'];
        $pictures = Order::find($id)->pictures;
//        dd($pictures);
        return view('edit.edit2', compact('names', 'pictures','id'));
    }
    public function yuyue(Request $request,$id)
    {
        $openid = session('wechat.oauth_user.id');
        $order = Order::where('openid', $openid)->where('id', $id)->firstOrFail(); //是否为本人提交
        if ($request->isMethod('post')) {
            dd($request->all());
        }

        $order = Order::find($id);
        $pictures = Order::find($id)->pictures;
//        dd($order);
        return view('yuyue',compact('order','pictures'));
    }
    public function goods()
    {
        $paths = [
            '/images/goods1.png',
            '/images/goods2.png',
            '/images/goods3.png',
            '/images/goods4.png',
            '/images/goods5.png',
            '/images/goods6.png',
            '/images/goods7.png',
        ];
        return view('goodspicture',compact('paths'));
    }

}
