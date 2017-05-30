<?php

namespace App\Http\Controllers;

use function dd;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{
    public $tag;

    public function __construct(Application $app)
    {
        $this->tag = $app->user_tag;
    }

    public function create($name)
    {
        $this->tag->create($name);
        $tags = $this->tag->lists();
        dd($tags); // “标签1”
    }
    protected function lists()
    {
        $tags = $this->tag->lists();
        dd($tags);
    }

    public function addtotag($openid)
    {
        $openIds = [$openid,];
        $this->tag->batchTagUsers($openIds, 100);
    }

}
