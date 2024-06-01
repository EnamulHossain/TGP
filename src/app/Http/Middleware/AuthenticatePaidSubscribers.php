<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthenticatePaidSubscribers
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
        if (user()->isGrantPortalPaidSubscribers()
        ){
            return $next($request);
        }

        return redirect()->route('pricing.plans');
    }
}

