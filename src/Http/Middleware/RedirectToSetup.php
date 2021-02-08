<?php

namespace MrTea\Concierge\Http\Middleware;

use Closure;
use Route;
use MrTea\Concierge\Models\Administrator;


class RedirectToSetup
{
	protected $excludeRouteName = [
		'concierge.setup',
		'concierge.setup.create'
	];

    public function handle($request, Closure $next)
    {
		$response = $next($request);

        if(!Administrator::count() && !in_array(Route::currentRouteName(), $this->excludeRouteName)){
			return redirect(route('concierge.setup'));
		}

        return $response;
    }
}
