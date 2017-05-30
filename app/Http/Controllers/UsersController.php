<?php

namespace App\Http\Controllers;

use App\http\model\Jigoudaima;

use App\Http\Model\Teluser;
use App\http\Model\User;

use function dd;
use function dump;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use const null;
use function var_dump;
use function view;

class UsersController extends Controller
{
    public $wechat;
    public $openid1;
    public function __construct(Application $wechat)
    {
        $this->wechat=$wechat;
//        $user = ;
        //$this->openid1=session('wechat.oauth_user')->getId();
    }

    public function gettel()
    {

        $yuangong = Teluser::where('openid', 'o6PEYwAhVw7FVSndRLALm9lKOIC8')->firstOrFail();
        return $yuangong->name.':'.$yuangong->tel.'<br>'.$yuangong->name.':'.$yuangong->tel;

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
    public function addpartner()
    {

    }
    public function addstaff()
    {
        $user = session('wechat.oauth_user');
        return view('test');
        $userinfo = Teluser::where('openid',$user->getId())->get();
        if ($userinfo->isEmpty())
        {
            return view('test');
        }
        else{
            return view('test');
        }
    }
    public function staffregister(Request $request)
    {
        //$user = session('wechat.oauth_user');
        $userinfo = Teluser::where('tel', $request->tel)->first();
        dd($userinfo);
        if ($userinfo == null)
        {
            $data = [
                'status' => 0,
                'msg' => '请先入职登记手机！',
            ];
        }
        else if ($userinfo->openid != null)
        {
            $data = [
                'status' => 0,
                'msg' => '此手机已被登记！',
            ];
        }
        else
        {
            $data = [
            'status' => 1,
            'msg' => 'login',
              ];
            $userinfo->openid = $user->getId();
            $userinfo->save();

            //TagController::addtotag($userinfo->openid);
        }
        return $data;
    }

}
