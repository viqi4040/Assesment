<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PolioWorkerMiddleware {
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->role === 'polio_worker') {
            return $next($request);
        }

        return redirect('/'); // Redirect to the home page or any other route
    }
}
