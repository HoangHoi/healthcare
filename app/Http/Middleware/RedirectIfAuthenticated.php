<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return $this->redirectIfAuthenticatedWithGuard($guard);
        }

        return $next($request);
    }

    protected function redirectIfAuthenticatedWithGuard($guard)
    {
        $routeRedirectName = 'home';
        switch ($guard) {
            case 'admin':
                $routeRedirectName = 'admin.doctors.index';
                break;
            case 'user':
                $routeRedirectName = 'home';
                break;
        }
        return redirect()->route($routeRedirectName);
    }
}
