<?php

namespace App\Http\Controllers;

use App\http\model\Jigoudaima;

use App\Http\Model\Teluser;
use App\http\Model\User;

use function dump;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public $wechat;

    public function __construct(Application $wechat)
    {
        $this->wechat=$wechat;
    }

    public function gettel()
    {

        $yuangong = Teluser::where('openid', 'o6PEYwAhVw7FVSndRLALm9lKOIC8')->firstOrFail();
        return $yuangong;

    }
    public function rand()
    {
        $len = 12;
        $chars=null;
        if (is_null($chars)){
            //$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $chars = "abcdefghijklmnpqrstuvwxyz0123456789";

        }
        mt_srand(10000000*(double)microtime());
        for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
            $str .= $chars[mt_rand(0, $lc)];
        }
        return $str;
    }
    public function rand50()
    {
//        $len = 12;
//        $chars=null;
//        for ($zz = 50;$zz>0;$zz--)
//        {
//        $jigoudaima = new Jigoudaima();
//        $jigoudaima->daima = $this->rand();
//        $jigoudaima->save();
//        }
        return '测试结束 无此模块';
    }

    public function users( )
    {
        $users=$this->wechat->user->lists();
        return $users;
    }

    public function mail( )
    {
        $name = '王小帅2';
        Mail::queue('mail',['name'=>$name],function($message){
            $to = '343739868@qq.com';
            $message ->to($to)->subject('邮件测试');
        });


//        Mail::raw('你好，我是PHP程序！', function ($message) {
//            $to = '343739868@qq.com';
//            $message ->to($to)->subject('纯文本信息邮件测试');
//        });
    }
    public function active()
    {

    }
    public function register(Request $request )
    {
           return  url('/active/'.$this->rand());
//        if ($request->isMethod('post')) {   //post
//            $email = $request->email;
//            if (stristr($email, '@fnjr2017.com') == false) {
//                return '非本公司';
//            } else {
//                return '本公司工作人员';
//
//            }
//        }

        return view ('register');       //get
    }
    public function login( )
    {
        $user = session('wechat.oauth_user');

        //查找是否有这个openid
        $userinfo = User::where('openid',$user->getId())->get();

        if ($userinfo->first()) {
            if($userinfo[0]['email'] == null)
                return redirect('users/register'); //转到注册页
           if ( $userinfo[0]['status'] == 0)
               return '您已注册,请登录 '.$userinfo[0]['email'] . ' 点击链接激活账户';

        }
        //return 1;

        //return view('login',compact('$replys'));

        //return $user->getNickname();
    }
}
