<?php

namespace MrTea\Concierge;

class Sidebar{
	public function render()
	{
		return view('concierge::components.sidebar', ['items' => collect(config('concierge.sidebar'))]);
	}
}