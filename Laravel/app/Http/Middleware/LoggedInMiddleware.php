<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class LoggedInMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
            return redirect('/login');

        return $next($request);
    }
}
