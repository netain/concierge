<?php

namespace MrTea\Concierge\Http\Controllers;

use MrTea\Concierge\Models\Administrator;
use Concierge;
use MrTea\Concierge\PasswordReset;

class ResetPasswordController extends Controller
{
	public function index()
	{	
		$user = Concierge::passwordReset()->getUserByToken(request()->only(['token', 'email']));
		$error = false;

		if(!$user || !Concierge::passwordReset()->validateToken($user)){
			$error = __(PasswordReset::INVALID_TOKEN);
		}

		return view('concierge::reset-password', compact(['error']));
	}

	public function resetPassword(){
		request()->validate([
			'new_password' => 'required|min:6|confirmed',
			'token'		   => 'required',
			'email'		   => 'required',
		]);

		$user = Concierge::passwordReset()->getUserByToken(request()->only(['token', 'email']));
		$user->new_password = request()->get('new_password');
		$user->save();

		session()->flash('message', ['type' => 'success' , 'msg' => __(PasswordReset::PASSWORD_RESET) ]);

		return redirect(route('concierge.authenticate'));
	}
}