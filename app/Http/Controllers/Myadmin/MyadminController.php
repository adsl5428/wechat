<?php

namespace App\Http\Controllers\Myadmin;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Model\Partner;
use App\Http\Model\Picture;
use function dd;
use function GuzzleHttp\Promise\is_fulfilled;
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
                return redirect('myadmin/orders');
            }
        }
        return view('myadmin.login');
    }
    public function orders()
    {
        return view('myadmin.orders');
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
        if ($partner[0]->account != 'admin' && $partner[0]->account != 'lijunjie')
            return view('msg.nopower');

        $order = Order::find($id);
        $pictures = Order::find($id)->pictures;
        return view('myadmin.xiangxi',compact('order','pictures'));
    }

    public function showpc($id)
    {
        $order = Order::find($id);
        $pictures = Order::find($id)->pictures;
        return view('myadmin.xiangxi',compact('order','pictures'));
    }


    public function caozuo($id)
    {
        $order = Order::find($id);
        return view('myadmin.caozuo','order');
    }

    public function pictures($id)
    {
        $pictures= Picture::where('order_id',$id)->get(['path']);
//        dd($pictures);
        return view('myadmin.picture',compact('pictures','id'));
    }
    public function paginate($start,$size)
    {
        $orders = Order::latest()->skip($start)->take($size)->
        get(['id','name','money','idcard','teshu','partner_name','qianyue_name','qingkuang','project','created_at']);
//        $neworders = collect();
//
//        foreach ($orders as $order) {
//            $pictures = $order->pictures()->get();
//            $temporder = collect($order);
//            $temppictures = collect();
//            foreach ($pictures as $picture) {
//                $temppictures->push($picture->path);
//
//            }
//             $temporder->put('pictures',$temppictures);
//            $neworders->push($temporder);
//        }

        return $orders->tojson();
    }
    public function count()
    {
        $names = ['王亚南','刘薇','许丹','朱小亮','许敏',
            '戈现丽','王军','陈臣','朱怡然','唐高凤','姚伟','孙宇浩','陈宏图','岳凯',
            '黄一','李俊杰','杨诚','黄进华','钱传鹤'];
        foreach ($names as $name)
        {
            $qianyue = Partner::where('status','0')->where('qianyue',$name)->count();
            $zhuce = Partner::where('qianyue',$name)->get()->count();
            var_dump($name.$qianyue.'/'.$zhuce.'<br />');
        }
    }
    //'朱怡然', '许敏'
    public function countname()
    {
        $names = ['王亚南','刘薇','许丹','朱小亮',
            '戈现丽','王军','陈臣','唐高凤','姚伟','孙宇浩','陈宏图','岳凯',
            '黄一','李俊杰','杨诚','黄进华','钱传鹤'];
        foreach ($names as $name)
        {
            $qianyue = Partner::where('status','0')->where('qianyue',$name)->count();
            $zhuce = Partner::where('qianyue',$name)->get()->count();
            $nozhuces = Partner::where('status','0')->get(['name','code']);
            var_dump($name.'-------------'.$qianyue.'/'.$zhuce.'<br />');
            foreach ($nozhuces as $nozhuce) {
                var_dump($nozhuce->name.'----'.$nozhuce->code.'<br />');
            }
        }
    }
    public function countname8()
    {
        $names = ['王亚南','刘薇','许丹','朱小亮',
            '戈现丽','王军','陈臣','唐高凤','姚伟','孙宇浩','陈宏图','岳凯',
            '黄一','李俊杰','杨诚','黄进华','钱传鹤'];
        foreach ($names as $name)
        {
            $qianyue = Partner::where('status','0')->where('qianyue',$name)
                ->where('created_at', '>', '2017-08-1')->where('created_at', '<', '2017-08-31')->count();
            $zhuce = Partner::where('qianyue',$name)
                ->where('created_at', '>', '2017-08-1')->where('created_at', '<', '2017-08-31')->get()->count();
            $nozhuces = Partner::where('status','0')
                ->where('qianyue',$name)->where('created_at', '>', '2017-08-1')->where('created_at', '<', '2017-08-31')->get(['name','code']);
            var_dump($name.'-------------'.$qianyue.'/'.$zhuce.'<br />');
            foreach ($nozhuces as $nozhuce) {
                var_dump($nozhuce->name.'----'.$nozhuce->code.'<br />');
            }
        }
    }
    public function ttt1()
    {

        $message=     [
            'errcode' => 0,
            'errmsg' => 'ok',
            'msgid' => 431279482,
        ];
        $msg = collect($message);
        if ($msg->has('errmsg') && $msg->get('errmsg')=='ok' && $msg->get('errcode')==0)
            return view('msg.ok');
//        dd($msg);
    }
}
