<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthenticateAdmin
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
        if (user()->isAdmin()
            || user()->isSuperAdmin()
            || user()->isUserAdmins()
            || user()->isCMSAdmins()
            || user()->isSmartSearchAdmins()
            || user()->isContentAdmins()
            || user()->isGrantors()
        ){
            return $next($request);
        }
        // not logged in as an admin - logout and go home
        \Auth::logout();
        return redirect()->route('login');
    }
}
