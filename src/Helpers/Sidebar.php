<?php

namespace MrTea\Concierge\Helpers;

class Sidebar{
	public function render()
	{
		return view('concierge::components.sidebar', ['items' => collect(config('concierge.sidebar'))]);
	}
}