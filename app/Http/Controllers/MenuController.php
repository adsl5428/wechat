<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
    public $menu;

    public function __construct(Application $app)
    {
        $this->menu = $app->menu;
    }

    public function menulist()
    {
        $menus = $this->menu->all();
        dd($menus);
    }
    public function menu()
    {
        $buttons = [
            [
            "type" => "view",
            "name" => "加入丰纳",
            "url"  => "http://fnjr.chonghui.net.cn/addpartner"
            ],
            [
                "type" => "view",
                "name" => "签约产品",
                "url"  => "http://fnjr.chonghui.net.cn/goods"
            ],
        ];
        $this->menu->add($buttons);
        echo 'done';
    }

    public function addjinglimenu($tag_id)   //主管 菜单
    {
        $matchRule = [
            "tag_id"=>$tag_id
        ];
        $buttons = [
            [
                "type" => "click",
                "name" => "经理",
                "key"  => "V1001_JINGLI"
            ],
        ];

        $this->menu->add($buttons, $matchRule);
        echo '经理';
    }

    public function addzhuguanmenu($tag_id)   //主管 菜单
    {
        $matchRule = [
            "tag_id"=>$tag_id
        ];
        $buttons = [
            [
                "type" => "click",
                "name" => "主管",
                "key"  => "V1001_ZHUGUN"
            ],
        ];

        $this->menu->add($buttons, $matchRule);
        echo '主管';
    }

    public function addmenu($tag_id)   //专员菜单
    {
        $matchRule = [
            "tag_id"=>$tag_id
        ];
        $buttons = [
            [

                "type" => "click",
                "name" => "获得电话",
                "key"  => "V1001_GET_TEL"
            ],
        ];

        $this->menu->add($buttons, $matchRule);
        echo '渠道专员';
    }

    public function addmenupartner($tag_id)    //合伙人 菜单
    {
        $matchRule = [
            "tag_id"=>$tag_id
        ];
        $buttons = [
            [
                "type" => "view",
                "name" => "提交订单",
                "url"  => "http://fnjr.chonghui.net.cn/loan1"
            ],
            [
                "type" => "view",
                "name" => "订单中心",
                "url"  => "http://fnjr.chonghui.net.cn/order"
            ],
            [
                "type" => "view",
                "name" => "签约产品",
                "url"  => "http://fnjr.chonghui.net.cn/goods"
            ],
        ];
        $this->menu->add($buttons, $matchRule);
        echo '合伙人';
    }
    public function testmenu($userId)
    {
        return $this->menu->test($userId);
    }
    public function delmenu()
    {
        $this->menu->destroy();
        return 'destroy done';
    }

}
