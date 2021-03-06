<?php

namespace App\Http\Middleware;

use Closure;

class Partner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = session('wechat.oauth_user');

        //查找是否有这个openid
        $userinfo = \App\Http\Model\Partner::where('openid',$user->getId())->first();
        if($userinfo == null || $userinfo->status == 0)
            return redirect('/addpartner');
        return $next($request);
    }
}
