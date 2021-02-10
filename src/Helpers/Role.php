<?php

namespace MrTea\Concierge\Helpers;
use Concierge;

class Role{

	public function can($name, $role){
		return in_array($name, $this->getPermissionsByRole($role));
	}

	protected function getPermissionsByRole($role, $tmpPermissions = []){
		$role = config('concierge.roles.'.$role);
		$permissions = array_merge($tmpPermissions, $role ? $role['permissions'] : []);

		if(isset($role['parent']) && $role['parent']){
			$permissions = $this->getPermissionsByRole($role['parent'], $permissions);
		}

		return $permissions;
	}

	public function getAllRoles(){
		$roles = [];

		foreach(config('concierge.roles') as $name => $role){
			$roles[$name] = __($role['label']);
		}

		if(isset($roles['super-admin']) && !$this->can('see-super-admin', $this->getUser()->role)){
			unset($roles['super-admin']);
		}

		return $roles;
	}

	public function getName($name){
		$role = config('concierge.roles.'.$name);

		return isset($role['label']) ? __($role['label']) : '';
	}

	protected function getUser()
	{
		return Concierge::auth()->user();
	}
}