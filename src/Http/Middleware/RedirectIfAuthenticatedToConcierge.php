<?php

namespace MrTea\Concierge\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Concierge;

class RedirectIfAuthenticatedToConcierge
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

        if (Concierge::auth()->check()) {
            return redirect(route('concierge.dashboard'));
        }

        return $next($request);
    }
}
