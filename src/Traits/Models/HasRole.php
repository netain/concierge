<?php
namespace MrTea\Concierge\Traits\Models;
use Concierge;

trait HasRole {
	
	public function isSuperAdmin()
	{
		return $this->role == 'super-admin';
	}

	public function hasPermissionTo($permission)
	{
		return Concierge::role()->can($permission, $this->attributes['role']) || $this->isSuperAdmin();
	}

	public function getRoleNameAttribute()
	{
		return Concierge::role()->getName($this->attributes['role']);
	}
}
