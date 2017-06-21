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

    public function menu()
    {
        $buttons = [
            [
                "name"       => "加入",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "员工",
                        "url"  => "http://fnjr.chonghui.net.cn/addstaff"
                    ],
                    [
                        "type" => "view",
                        "name" => "合伙人",
                        "url"  => "http://fnjr.chonghui.net.cn/addpartner"
                    ],
                ],
            ],
            [
                "type" => "view",
                "name" => "首页",
                "url"  => "http://fnjr.chonghui.net.cn/"
            ],
        ];
        $this->menu->add($buttons);
        echo '123';
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
                "name"       => "小工具",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "城市房价评估",
                        "url"  => "http://wx.surea.com/MobileView/Viss/Appr.htm?code=041UE7gJ0GWCIj2zQFcJ0JK6gJ0UE7gh&state=STATE&winzoom=1"
                    ],
                    [
                        "type" => "view",
                        "name" => "城市房价评估",
                        "url"  => "http://wx.surea.com/MobileView/Viss/Appr.htm?code=041UE7gJ0GWCIj2zQFcJ0JK6gJ0UE7gh&state=STATE&winzoom=1"
                    ],
                ],
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
        return $this->menu->destroy();
    }

}
