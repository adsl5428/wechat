<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class GroupController extends Controller
{
    public $group;

    public function __construct(Application $app)
    {
        $this->group = $app->user_group;
    }

    public function getgroup()
    {
        dd($this->group->lists());
    }

    public function addgroup($name)
    {
        $this->group->create($name);
    }
}
