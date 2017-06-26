<?php

namespace App\Http\Controllers;
use iscms\Alisms\SendsmsPusher as Sms;
use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use App\Http\Requests;

class SmsController extends Controller
{

    public function sendSms(Sms $sms)
    {
        $temp=array ('number'=>"110");
        $phone='18721100541';
        $name=1;
        $content= json_encode($temp);
        $code='SMS_3910275';
        dd("$content");
        //return $sms->send("$phone","$name","$content","$code");
    }
    public $notice;
    public function __construct(Application $app)
    {
        $this->notice = $app->notice;
    }
    public function complete(Request $request)
    {
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
        return view('msg.complete');
    }
}