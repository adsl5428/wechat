<?php

namespace App\Http\Controllers;

use function dd;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;
use function var_dump;

class AdminController extends Controller
{
    public $user;
    public function __construct(Application $app)
    {
        $this->user = $app->user;
    }

    public function lists()
    {
        var_dump('hello');
        dd($this->user->lists());
    }
}
