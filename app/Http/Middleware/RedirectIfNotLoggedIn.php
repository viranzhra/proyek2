<?php

namespace App\Http\Middleware;

// RedirectIfNotLoggedIn.php

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotLoggedIn
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('admin.login.form');
        }

        return $next($request);
    }
}

