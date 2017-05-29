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
                        "url"  => "http://106.14.4.239/addstaff"
                    ],
                    [
                        "type" => "view",
                        "name" => "合伙人",
                        "url"  => "http://106.14.4.239/addpartner"
                    ],
                ],
            ],
            [
                "type" => "view",
                "name" => "首页",
                "url"  => "http://106.14.4.239//"
            ],
        ];
        $this->menu->add($buttons);
        echo '123';
    }

    public function addmenu($tag_id)
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
        echo '123';
    }

}
