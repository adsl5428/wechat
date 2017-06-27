<?php

namespace App\Http\Controllers;

use App\Http\Model\Picture;
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
    public function picture(Request $request)
    {
        if ($request->isMethod('post'))
        {
//            dd($request->get('order'));
//            $request->session()->put('picture', '1');
//            dd($request->get('order'));
            if ($request->get('name')=='laoli'){
                $orderid = $request->get('order');
            $pictures= Picture::where('order_id',$request->get('order'))->get(['path']);
            return view('help.picture',compact('pictures','orderid'));
            }
            else return 'ok';
        }
        return view('help.picturelogin');
    }
}
