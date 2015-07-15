<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    protected $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->is_admin) {
            return $next($request);
        }
        else {
            return response('You must be admin in order to visit this page', 403);
        }
    }
}
