<?php

namespace MrTea\Concierge;

use Illuminate\Support\Str;
use Carbon\Carbon;

use MrTea\Concierge\Models\Administrator as User;
use MrTea\Concierge\Notifications\ResetPasswordNotification;

class PasswordReset{
	/**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const RESET_LINK_SENT = 'passwords.sent';

    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const PASSWORD_RESET = 'passwords.reset';

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = 'passwords.user';

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = 'passwords.token';

    /**
     * Constant representing a throttled reset attempt.
     *
     * @var string
     */
    const RESET_THROTTLED = 'passwords.throttled';

	/**
	 * Set expiring token in second
	 */
	protected $tokenExpired =  60 * 30; // 30 Minutes
	
	public function sendResetLink($email)
	{
		$user = $this->getUser($email);

		if(!$user){
			return self::INVALID_USER;
		}

		if($user->passwordReset){
			if($this->validateToken($user)){
				return self::RESET_THROTTLED;
			}
			$user->passwordReset->delete();
		}

		$token = Str::random(40);

		$user->passwordReset()->create([
			'token' => $token ,
			'created_at' => now()
		]);

		$user->notify(new ResetPasswordNotification($token, $user->email));
		
		return self::RESET_LINK_SENT;
	}

	public function validateToken($user)
	{
		$createdAt = Carbon::parse($user->passwordReset->created_at);
		$now = Carbon::now();

		return $this->tokenExpired > $now->diffInSeconds($createdAt);
	}

	public function resetPassword($email, $password)
	{

		return self::PASSWORD_RESET;
	}

	public function getUser($email){
		return User::where('email', $email)->first();
	}

	public function getUserByToken($data){
		$email = $data['email'];
		$token = $data['token'];

		$user = User::where('email', $email)->whereHas('passwordReset', function($q) use ($token){
			$q->where('token', $token);
		})->first();

		return $user;
	}
}