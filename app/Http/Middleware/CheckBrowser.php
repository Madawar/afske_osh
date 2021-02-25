<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class CheckBrowser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent();
        $browser = $agent->browser();
        if (!$request->is('browser')) {
            //dd($browser);
            if (!in_array($browser, ['Firefox', 'Chrome'])) {
                return redirect('browser');
            }
        }


        return $next($request);
    }
}
