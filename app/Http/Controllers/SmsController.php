<?php

namespace App\Http\Controllers;
use iscms\Alisms\SendsmsPusher as Sms;
use Illuminate\Http\Request;

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
}
