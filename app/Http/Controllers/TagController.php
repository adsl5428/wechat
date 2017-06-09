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

    public function create($name)       //创建
    {
        $this->tag->create($name);
        $tags = $this->tag->lists();
        dd($tags); // “标签1”
    }

    protected function lists()          //标签 列表
    {
        $tags = $this->tag->lists();
        dd($tags);
    }

    public function addtotag($openid,$tid)  //某人 加入 到某标签
    {
        $openIds = [$openid,$openid];
        $this->tag->batchTagUsers($openIds, $tid);
    }


    public function deltotag($openid,$tid)  //某人 从 某标签删除
    {
        $openIds = [$openid,$openid];
        $this->tag->batchUntagUsers($openIds, $tid);
    }

    public function usersoftag($tid)        //标签内 有什么人
    {
        return $this->tag->usersOfTag($tid, $nextOpenId = '');
    }

    public function usertags($openid)       //某人在某标签
    {
        return $this->tag->userTags($openid);
    }

    public function delete($tid)            //删除标签
    {
        return $this->tag->delete($tid);

    }

}
