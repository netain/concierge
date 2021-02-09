<?php

namespace MrTea\Concierge\Http\Livewire;

use Livewire\Component;
use Concierge;

use MrTea\Concierge\PasswordReset;


class Authentication extends Component
{
	public $email;
	public $password;
	public $rememberMe;

	public $showForm = 'login';

	protected function resetErrorMessages()
	{
		$this->resetErrorBag();
		$this->resetValidation();
	}

	public function render()
	{
		return view('concierge::livewire.authentication')
        ->extends('concierge::_layout')
        ->section('content');
	}

	public function login()
	{
		$credentials = $this->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);

		if(Concierge::auth()->attempt($credentials, $this->rememberMe)){
			request()->session()->regenerate();

			return redirect()->intended($this->redirectTo());
		}

		$this->password = '';
		
		session()->flash('message', ['type' => 'error', 'msg' => 'The provided credentials do not match our records.']);
	}

	protected function redirectTo()
	{
		return route('concierge.dashboard');
	}

	public function showForm($form)
	{
		$this->showForm = $form;
		$this->resetErrorMessages();
	}

	public function requestResetPassword()
	{
		$data = $this->validate(['email' => 'required|email']);
		$status = Concierge::passwordReset()->sendResetLink($this->email);

		session()->flash('message', ['type' => $status == PasswordReset::RESET_LINK_SENT ? 'success' : 'error' , 'msg' => __($status) ]);
	}
}