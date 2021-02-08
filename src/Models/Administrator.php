<?php

namespace MrTea\Concierge\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Hash;

class Administrator extends Authenticatable
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'firstname',
		'lastname',
		'email',
		'password',
		'locale',
		'avatar',
		'new_password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * ATTRIBUTES
	 */
	public function getAvatarAttribute(){
		return substr($this->firstname, 0, 1) . substr($this->lastname, 0, 1);
	}
	
	public function getFullnameAttribute(){
		return $this->firstname . ' ' . $this->lastname; 
	}

	public function setNewPasswordAttribute($password){
		if($password){
			$this->password = Hash::make($password);
		}
	}
}
