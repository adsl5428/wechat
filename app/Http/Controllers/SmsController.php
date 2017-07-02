<?php

namespace App\Http\Controllers;
use function compact;
use iscms\Alisms\SendsmsPusher as Sms;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use App\Http\Requests;
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
        $num = '钱传鹤大傻逼'; // 生成随机验证码
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
        if ($request->session()->get('project') == null)
            return redirect('order');
        $userId = 'ooFF4wtnbrrwTLhkj6iVqeUoNvxY';  //老李
//        $userId = 'ooFF4wrHkMyI6XbRUVLFKF8fVRjs';    //宏城
        $templateId = '8YiB6ZlA5GH-tKBopocY3RurVvr3UzSrhZuDPoSpxYQ';
        $url = '';
        $data = array(
            "first"  => "有新单子进来啦！",
            "keyword1"   => $request->session()->get('project'),
            "keyword2"  => $request->session()->get('partner'),
            "keyword3"  => date('m-d h:i',time()),
            "remark" => "请尽快审核",
        );
        $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
//        var_dump($result);
        $request->session()->forget('project');
        return view('msg.complete');
    }
}