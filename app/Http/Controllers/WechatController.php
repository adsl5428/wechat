<?php

namespace App\Http\Controllers;

use App\Http\Model\Teluser;
use Illuminate\Http\Request;

use App\Http\Requests;

class WechatController extends Controller
{
    //
    public function serve()
    {
        $wechat = app('wechat');
        $userApi = $wechat->user;
        $wechat->server->setMessageHandler(function($message) use ($userApi){
            switch ($message->MsgType) {
                case 'event':
                    //return '收到事件消息';
                    $yuangong = Teluser::where('openid', $message->FromUserName)->firstOrFail();
                    return $yuangong->name.':'.$yuangong->tel."\n".$yuangong->name.':'.$yuangong->tel;
                    break;
                case 'text':
                    return $userApi->get($message->FromUserName)->nickname;
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });

        return $wechat->server->serve();

    }
}
