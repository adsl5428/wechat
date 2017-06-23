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
    public function test()
    {
        $userId = 'ooFF4wrHkMyI6XbRUVLFKF8fVRjs';
        $templateId = '8YiB6ZlA5GH-tKBopocY3RurVvr3UzSrhZuDPoSpxYQ';
        $url = 'http://www.baidu.com';
        $data = array(
            "first"  => "恭喜你测试成功！",
            "keyword1"   => "一抵",
            "keyword2"  => "王斌/黄进华",
            "keyword3"  => "就在刚才",
            "remark" => "请尽快处理",
        );
        $result = $this->notice->uses($templateId)->withUrl($url)->andData($data)->andReceiver($userId)->send();
        var_dump($result);
    }
}