<?php

namespace MrTea\Concierge;

use MrTea\Concierge\Helpers\Sidebar;
use MrTea\Concierge\Helpers\PasswordReset;
use MrTea\Concierge\Helpers\Role;
use MrTea\Concierge\Helpers\Html;

class Concierge{

	protected $sidebar;
	protected $passwordReset;
	protected $permission;
	protected $html;

	public function __construct()
	{
		$this->initHelpers();
	}

	public function auth()
	{
		return auth(config('concierge.auth.guard'));
	}

	protected function initHelpers()
	{
		$this->sidebar = new Sidebar();
		$this->passwordReset = new PasswordReset();
		$this->role = new Role();
		$this->html = new Html();
	}

	public function sidebar()
	{
		return $this->sidebar;
	}

	public function passwordReset()
	{
		return $this->passwordReset;
	}

	public function role()
	{
		return $this->role;
	}

	public function html()
	{
		return $this->html;
	}
}