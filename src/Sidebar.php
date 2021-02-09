<?php

namespace MrTea\Concierge;

class Sidebar{
	protected $items;

	public function add($name, $options = [])
	{

	}

	public function remove($name)
	{

	}

	public function render()
	{
		return view('concierge::components.sidebar', ['items' => $this->items]);
	}
}