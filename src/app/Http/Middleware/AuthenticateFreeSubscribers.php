<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthenticateFreeSubscribers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param null                      $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (user()->isGrantPortalSubscribers()
        ){
            return $next($request);
        }

        return redirect()->route('pricing.plans');
    }
}
