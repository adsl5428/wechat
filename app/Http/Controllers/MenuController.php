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

    public function index()
    {
        $menus = $this->menu->all();
        dd($menus);
    }
    public function createcurrent()
    {
        $buttons = [

                    [
                        "type" => "view",
                        "name" => "提交订单",
                        "url"  => env('APP_HOST', null)."loan1"
                    ],
                    [
                        "type" => "view",
                        "name" => "订单中心",
                        "url"  => env('APP_HOST', null)."order"
                    ],
                    [
                        "type" => "view",
                        "name" => "产品",
                        "url"  => env('APP_HOST', null)."goods"
                    ],

        ];
        $this->menu->add($buttons);
        echo '全部菜单创建成功';
    }
    public function createnew()
    {
        $buttons = [
            [
                "name" => "我的丰纳",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "我的信息",
                        "url"  => env('APP_HOST', null)."myinfo"
                    ],
                    [
                        "type" => "view",
                        "name" => "我的订单",
                        "url"  => env('APP_HOST', null)."myorder"
                    ],
                    [
                        "type" => "view",
                        "name" => "更多...",
                        "url"  => env('APP_HOST', null)."mymore"
                    ],
                ],

            ],
            [
                "name" => "提交订单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "房贷",
                        "url"  => env('APP_HOST', null)."loan/fang"
                    ],
                    [
                        "type" => "view",
                        "name" => "车贷",
                        "url"  => env('APP_HOST', null)."loan/che"
                    ],
                    [
                        "type" => "view",
                        "name" => "信贷",
                        "url"  => env('APP_HOST', null)."loan/xin"
                    ],
                ],
            ],
            [
                "name" => "其他",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "我要投诉",
                        "url"  => env('APP_HOST', null)."complain"
                    ],
                    [
                        "type" => "view",
                        "name" => "在线交谈",
                        "url"  => env('APP_HOST', null)."chatonline"
                    ],
                    [
                        "type" => "view",
                        "name" => "常见问题",
                        "url"  => env('APP_HOST', null)."question"
                    ],
                    [
                        "type" => "view",
                        "name" => "产品介绍",
                        "url"  => env('APP_HOST', null)."goods"
                    ],
                    [
                        "type" => "view",
                        "name" => "小游戏",
                        "url"  => env('APP_HOST', null)."games"
                    ],
                ],
            ],
        ];
        $this->menu->add($buttons);
        echo '全部菜单创建成功';
    }


    public function del()
    {
        $this->menu->destroy();
        return 'destroy all done';
    }

}
