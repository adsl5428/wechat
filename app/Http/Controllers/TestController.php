<?php

namespace App\Http\Controllers;

use App\Http\Model\Order;
use App\Http\Model\Partner;
use function dd;
use Illuminate\Http\Request;

use App\Http\Requests;
use function var_dump;

class TestController extends Controller
{

    public function addopenid()
    {

        Partner::where('qianyue','岳凯')->update(['qianyue'=>'岳凯凯']);
//            dd($yuangong->openid);

        $names = ['王亚南','刘薇','许丹','朱小亮',
            '戈现丽','王军','陈臣','朱怡然','唐高凤','孙宇浩','陈宏图','岳凯凯',
            '黄一','李俊杰','杨诚','黄进华','钱传鹤','姚伟','许敏'];
        foreach ($names as $name)
        {
            $yuangong = Partner::where('name', $name)->first();
//            dd($yuangong->openid);
            $a = Partner::where('qianyue',$name)->update(['qianyue_openid'=>$yuangong->openid]);
            $a = Order::where('qianyue_name',$name)->update(['qianyue_openid'=>$yuangong->openid]);
            var_dump($a);
        }
    }
    public function changyuekaikai()
    {
        Partner::where('qianyue','岳凯')->update(['qianyue'=>'岳凯凯']);
    }

}
