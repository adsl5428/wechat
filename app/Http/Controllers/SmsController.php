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
    public function demo($id)
    {
        if ($id==1)
            return view('demo.one');
        if ($id==2)
        {$names[3] =['房产证',104,'fang-chan'] ;return view('demo.two',compact('names'));}
        if ($id=='complete')
        {return view('demo.complete');}
        if ($id=='3-s')   //成功
        {$state = ['方案','','hide'];return view('demo.three',compact('state'));}
        if ($id=='3-f')
        {$state = ['拒绝','hide',''];return view('demo.three',compact('state'));}

        if ($id=='4')
        {$state = ['拒绝','hide',''];return view('demo.four',compact('state'));}
        if ($id=='5')
        {return view('demo.five');}
        if ($id=='6')
        {return view('demo.six');}
        if ($id=='7')
        {return view('demo.seven');}
    }

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
    {//ooFF4wtDFzOTBHOYRf0XZ_-PBx0U  黄一
        //ooFF4wupK-IgZXGiU_pXmYs_3qE8 杨成
        //ooFF4wvQWMZYJJ47dBL6LLm15bTQ 秦

        if ($request->session()->get('project') == null)
            return redirect('order');
        $userIds = ['ooFF4wtnbrrwTLhkj6iVqeUoNvxY','ooFF4wtDFzOTBHOYRf0XZ_-PBx0U',
            'ooFF4wupK-IgZXGiU_pXmYs_3qE8','ooFF4wvQWMZYJJ47dBL6LLm15bTQ',
            'ooFF4wrHkMyI6XbRUVLFKF8fVRjs'];  //老李
//        $userId = 'ooFF4wrHkMyI6XbRUVLFKF8fVRjs';    //宏城
        $templateId = '8YiB6ZlA5GH-tKBopocY3RurVvr3UzSrhZuDPoSpxYQ';
        $url = URL('myadmin/order',$request->session()->get('order_id'));
        $data = array(
            "first"  => "有新单子进来啦！",
            "keyword1"   => $request->session()->get('project'),
            "keyword2"  => $request->session()->get('partner'),
            "keyword3"  => date('m-d h:i',time()),
            "remark" => "请尽快审核,点击查看订单详情",
        );
        foreach ($userIds as $userId)
         $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
//        var_dump($result);
        $request->session()->forget('project');
        return view('msg.complete');
    }
    public function shenhe(Request $request)
    {
//        $chushen = Chushen::create($request->all());
        $oldchushen = Chushen::where('order_id',$request->get('order_id'))->get();

        if (count($oldchushen) == 0)
           $newchushen = Chushen::create($request->except('_token'));
        else
            Chushen::where('order_id',$request->get('order_id'))->update(['status'=>$request->get('status'),
                'beizhu'=>$request->get('beizhu')]);

        $order = Order::find($request->get('order_id'));
        $order->status = $request->get('status');
        $order->save();
        $userId = $order->openid;

        if ($request->get('status') == '拒绝')
            $url='';
        else if($request->get('status') == '请补充')
            $url=URL('order',[$request->get('order_id'),'upload']);
        else if($request->get('status') == '通过,请预约')
            $url=URL('order',[$request->get('order_id'),'yuyue']);
//        dd($request->all());
        $templateId='_XsE0KqC4zElz4yBLllXMv1KoZEUituomV0mdDyy0m4';
        $data = [
            "first"  => "您的订单有新的进度了,请点击操作",
            "keyword1"   => $order->name,
            "keyword2"  => $order->money.'万',
            "keyword3"  => date('m-d h:i',time()),
            "keyword4"  =>'初审,'.$request->get('status'),
            "remark" => $request->get('beizhu'),
        ];
        $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
        $msg = collect($result);
        if ($msg->has('errmsg') && $msg->get('errmsg')=='ok' && $msg->get('errcode')==0)
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
        $userIds = ['ooFF4wtnbrrwTLhkj6iVqeUoNvxY','ooFF4wtDFzOTBHOYRf0XZ_-PBx0U',
            'ooFF4wupK-IgZXGiU_pXmYs_3qE8','ooFF4wvQWMZYJJ47dBL6LLm15bTQ',
            'ooFF4wrHkMyI6XbRUVLFKF8fVRjs'];  //老李
//        $userId = 'ooFF4wrHkMyI6XbRUVLFKF8fVRjs';    //宏城
        $templateId = '8YiB6ZlA5GH-tKBopocY3RurVvr3UzSrhZuDPoSpxYQ';
        $url = URL('myadmin/order',$order->id);
        $data = array(
            "first"  => "有订单 补充材料 啦！",
            "keyword1"   => $order->project,
            "keyword2"  => $order->partner_name.'/'.$order->qianyue_name,
            "keyword3"  => date('m-d h:i',time()),
            "remark" => "请尽快审核,点击查看订单详情",
        );
        foreach ($userIds as $userId)
            $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
//        var_dump($result);
        return view('msg.complete');
    }


}