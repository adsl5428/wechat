<?php

namespace App\Http\Middleware;

use Closure;
use function dd;
use Illuminate\Support\Facades\Auth;
use function redirect;

class adminwechat
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
        $openid = session('wechat.oauth_user.id');
        $partner = \App\Http\Model\Partner::where('openid',$openid)->get(['account']);
        if ($partner[0]->account == 'admin' || $partner[0]->account == 'lijunjie')
            return $next($request);
        else    return redirect('/');
    }
}
