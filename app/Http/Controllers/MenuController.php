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
                "type" => "click",
                "name" => "获得电话",
                "key"  => "V1001_GET_TEL"
            ],
        ];
        $this->menu->add($buttons);
        echo '123';
    }
}
