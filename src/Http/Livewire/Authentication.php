<?php

namespace MrTea\Concierge\Http\Livewire;

use Livewire\Component;
use Concierge;

class Authentication extends Component
{
	public $email;
	public $password;
	public $rememberMe;

	public function render(){
		return view('concierge::livewire.authentication')
        ->extends('concierge::_layout')
        ->section('content');
	}

	public function login(){
		$credentials = $this->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);

		if(Concierge::auth()->attempt($credentials, $this->rememberMe)){
			request()->session()->regenerate();

			return redirect()->intended($this->redirectTo());
		}

		$this->password = '';
		
		session()->flash('loginError', 'The provided credentials do not match our records.');
	}

	protected function redirectTo(){
		return route('concierge.dashboard');
	}
}