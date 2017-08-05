<?php

namespace App\Http\Controllers;

use App\Http\Model\Chushen;
use App\Http\Model\Order;
use function compact;
use function dd;
use Illuminate\Support\Facades\URL;
use iscms\Alisms\SendsmsPusher as Sms;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use App\Http\Requests;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use function var_dump;
use function view;

class SmsController extends Controller
{
    public $guanlis = ['ooFF4wtnbrrwTLhkj6iVqeUoNvxY','ooFF4wtDFzOTBHOYRf0XZ_-PBx0U',
    'ooFF4wupK-IgZXGiU_pXmYs_3qE8','ooFF4wvQWMZYJJ47dBL6LLm15bTQ',
    'ooFF4wrHkMyI6XbRUVLFKF8fVRjs','ooFF4wkuR05RefvYxqn-N8hJSmug'];



    public function sendSms(Sms $sms)
    {
        $num = '钱传鹤'; // 生成随机验证码
//        dd("$num");
        $phone='18721100541';
        $name='丰纳金融';
        $smsParams = [
            'number' => "$num"
        ];
        $content= json_encode($smsParams);
        $code='SMS_67215910';
//        dd("$content");
        $result = $sms->send("$phone","$name","$content","$code");
        var_dump($result);
    }
    public $notice;
    public function __construct(Application $app)
    {
        $this->notice = $app->notice;
    }

    public function complete(Request $request)
    {
        $success =0;
        $fail = 0;
        if ($request->session()->get('project') == null)
            return redirect('order');
        $orderid = $request->session()->get('order_id');
//        $guanli = 'ooFF4wrHkMyI6XbRUVLFKF8fVRjs';    //宏城
        $templateId = '8YiB6ZlA5GH-tKBopocY3RurVvr3UzSrhZuDPoSpxYQ';
        $url = URL('myadmin/order',$orderid);
        $data = array(
            "first"  => "有新单子进来啦！",
            "keyword1"   => $request->session()->get('project'),
            "keyword2"  => $request->session()->get('partner'),
            "keyword3"  => date('m-d h:i',time()),
            "remark" => "请尽快审核,点击查看订单详情",
        );
        foreach ($this->guanlis as $guanli)
        {
            $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($guanli)->send();
            $msg = collect(array($result));
            if ( $msg->contains('errmsg','ok') && $msg->contains(   'errcode',0))
                $success++;
            else
                $fail++;
        }
        $url = '';
        $data = array(
            "first"  => "您的合伙人进件啦！",
            "keyword1"   => $request->session()->get('project'),
            "keyword2"  => $request->session()->get('partner'),
            "keyword3"  => date('m-d h:i',time()),
            "remark" => "",
        );
        $qianyue_openid = Order::where('id',$orderid)->get(['qianyue_openid'])->first()->qianyue_openid;

            $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)
                ->andReceiver($qianyue_openid)->send();
            $msg = collect(array($result));
            if ( $msg->contains('errmsg','ok') && $msg->contains(   'errcode',0))
                $success++;
            else
                $fail++;

        $request->session()->forget('project');
//        return view('msg.countmsg',compact('success','fail'));
        return view('msg.complete');

    }

    public function test()
    {
        $templateId = '8YiB6ZlA5GH-tKBopocY3RurVvr3UzSrhZuDPoSpxYQ';
        $url = "";
        $data = array(
            "first"  => "您的合伙人进件啦！",
            "keyword1"   => "测试",
            "keyword2"  => "测试",
            "keyword3"  => date('m-d h:i',time()),
            "remark" => " ",
        );
        $qianyue_openid = Order::where('id',11)->get(['qianyue_openid'])->first()->qianyue_openid;

        $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)
            ->andReceiver($qianyue_openid)->send();
        dd($result);
    }



    public function shenhe(Request $request)
    {
        $chushen = Chushen::create($request->all());
//        $oldchushen = Chushen::where('order_id',$request->get('order_id'))->get();
//
//        if (count($oldchushen) == 0)
//           $newchushen = Chushen::create($request->except('_token'));
//        else
//            Chushen::where('order_id',$request->get('order_id'))->update(['status'=>$request->get('status'),
//                'beizhu'=>$request->get('beizhu')]);

        $order = Order::find($request->get('order_id'));
        $order->status = $request->get('status');
        $order->save();
        $partneropenid = $order->openid;

        if ($request->get('status') == '拒绝')
            $url='';
        else if($request->get('status') == '请补充')
            $url=URL('order',[$request->get('order_id'),'upload']);
        else if($request->get('status') == '通过,请预约')
            $url=URL('order',[$request->get('order_id'),'yuyue']);
//        dd($request->all());
        else if ($request->get('status') == '放款')
            $url='';
        $templateId='_XsE0KqC4zElz4yBLllXMv1KoZEUituomV0mdDyy0m4';
        $data = [
            "first"  => "您的订单有新的进度了,请点击操作",
            "keyword1"   => $order->name,
            "keyword2"  => $order->money.'万',
            "keyword3"  => date('m-d h:i',time()),
            "keyword4"  =>$request->get('status'),
            "remark" => $request->get('beizhu'),
        ];


        $result1 = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($partneropenid)->send();

        $url='';
        $data = [
            "first"  => '合伙人:' .$order->partner_name. '订单有新进度了',
            "keyword1"   => $order->name,
            "keyword2"  => $order->money.'万',
            "keyword3"  => date('m-d h:i',time()),
            "keyword4"  =>$request->get('status'),
            "remark" => $request->get('beizhu'),
        ];
        $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)
            ->andReceiver($order->qianyue_openid)->send();



        $msg = collect(array($result1));
        if ( $msg->contains('errmsg','ok') && $msg->contains(   'errcode',0))
            return view('msg.ok');
        else
            return view('msg.nook');
        //        dd($result);
    }

    public function updateok($id)
    {//ooFF4wtDFzOTBHOYRf0XZ_-PBx0U  黄一
        //ooFF4wupK-IgZXGiU_pXmYs_3qE8 杨成
        //ooFF4wvQWMZYJJ47dBL6LLm15bTQ 秦
        $order = Order::find($id);

//        $guanli = 'ooFF4wrHkMyI6XbRUVLFKF8fVRjs';    //宏城
        $templateId = '8YiB6ZlA5GH-tKBopocY3RurVvr3UzSrhZuDPoSpxYQ';
        $url = URL('myadmin/order',$order->id);
        $data = array(
            "first"  => "有订单 补充材料 啦！",
            "keyword1"   => $order->project,
            "keyword2"  => $order->partner_name.'/'.$order->qianyue_name,
            "keyword3"  => date('m-d h:i',time()),
            "remark" => "请尽快审核,点击查看订单详情",
        );
        foreach ($this->guanlis  as $guanli)
            $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($guanli)->send();
//        var_dump($result);


        $url = '';
        $data = array(
            "first"  => "有订单 补充材料 啦！",
            "keyword1"   => $order->project,
            "keyword2"  => $order->partner_name.'/'.$order->qianyue_name,
            "keyword3"  => date('m-d h:i',time()),
            "remark" => "",
        );
        $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)
            ->andReceiver($order->qianyue_openid)->send();

        return view('msg.complete');
    }


}