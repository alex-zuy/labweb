<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use App\Visit;

class VisitorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->ajax()) {
            $visit = new Visit();
            $visit->page = parse_url($request->fullUrl(), PHP_URL_PATH);
            $visit->ip = $request->ip();
            $visit->host = $request->getHost();
            $visit->user_agent = Agent::browser() . ' ' . Agent::version(Agent::browser());
            $visit->save();
        }

        return $next($request);
    }
}
