<?php

namespace MrTea\Concierge\Http\Livewire;

use Livewire\Component;
use Concierge;

class Dashboard extends Component
{
	public function render(){
		return view('concierge::livewire.dashboard')
        ->extends('concierge::_layout')
        ->section('content');
	}
}