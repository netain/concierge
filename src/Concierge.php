<?php

namespace MrTea\Concierge;

use MrTea\Concierge\Sidebar;
use MrTea\Concierge\PasswordReset;

class Concierge{

	protected $sidebar;
	protected $passwordReset;

	public function __construct()
	{
		$this->initSidebar();
		$this->initResetPassword();
	}

	public function auth()
	{
		return auth(config('concierge.auth.guard'));
	}

	protected function initSidebar()
	{
		$this->sidebar = new Sidebar();
	}

	protected function initResetPassword()
	{
		$this->passwordReset = new PasswordReset();
	}

	public function sidebar()
	{
		return $this->sidebar;
	}

	public function passwordReset()
	{
		return $this->passwordReset;
	}
}