<?php

namespace MrTea\Concierge;

class Concierge{

	public function auth(){
		return auth(config('concierge.auth.guard'));
	}
}