<?php

namespace MrTea\Concierge\Http\Controllers;

use MrTea\Concierge\Models\Administrator;
use Concierge;
class LogoutController extends Controller
{
	public function index()
	{
		Concierge::auth()->logout();
		request()->session()->invalidate();
		request()->session()->regenerateToken();
		
		return redirect(route('concierge.authenticate'));
	}
}