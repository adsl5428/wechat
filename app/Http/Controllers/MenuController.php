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
        $this->menu->destroy();
        $buttons = [
            [
                "name" => "经纪人",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "产品",
                        "url"  => env('APP_HOST', null)."goods"
                    ],
                    [
                        "type" => "view",
                        "name" => "提交订单",
                        "url"  => env('APP_HOST', null)."loan1"
                    ],
                    [
                        "type" => "view",
                        "name" => "我的订单",
                        "url"  => env('APP_HOST', null)."order"
                    ],
                ],

            ],
            [
                "name" => "钱袋子",
                "sub_button" => [
                    [
                        "type" => "click",
                        "name" => "任务赚钱",
                        "key"  => "V1001_NOTHING2"
                    ],
                    [
                        "type" => "click",
                        "name" => "每日福利",
                        "key"  => "V1001_NOTHING"
                    ],
                    [
                        "type" => "click",
                        "name" => "推广赚钱",
                        "key"  => "V1001_NOTHING"
                    ],
                ],
            ],
            [
                "name" => "查询",
                "sub_button" => [
                    [
                        "type" => "click",
                        "name" => "老赖查询",
                        "key"  => "V1001_NOTHING"
                    ],
                    [
                        "type" => "view",
                        "name" => "征信查询",
                        "url"  => "http://www.pbccrc.org.cn/"
                    ],
                    [
                        "type" => "view",
                        "name" => "企业查询",
                        "url"  => "https://www.tianyancha.com/"
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
