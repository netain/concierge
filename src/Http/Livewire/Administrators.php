<?php

namespace MrTea\Concierge\Http\Livewire;

use Livewire\Component;

use MrTea\Concierge\Models\Administrator;

use MrTea\Concierge\Traits\Livewire\IsListable;
use MrTea\Concierge\Traits\Livewire\IsFormable;
use MrTea\Concierge\Traits\Livewire\IsDeletable;

use Illuminate\Support\Facades\Gate;

use Concierge;

class Administrators extends Component
{
	use IsListable, IsFormable, IsDeletable;
	protected $model = Administrator::class;
	protected $defaultValues = [
		'firstname' => '',
		'lastname' => '',
		'email' => '',
		'password' => '',
		'role' => 'guest',
		'locale' => 'en',
	];

	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $locale;
	public $avatar;
	public $role;
	public $new_password;
	public $new_password_confirmation;

	public function mount()
	{
		if(!Concierge::auth()->user()->hasPermissionTo('manage-admin')){
			abort(403);
		}
	}

	public function render()
	{	
		Concierge::role()->getAllRoles();
		return view('concierge::livewire.administrators')
        ->extends('concierge::_layout')
        ->section('content')
		->with($this->sendDataToView());
	}

	public function sendDataToView()
	{
		$data = [];
		$rowset = $this->model::orderBy('firstname')->orderBy('lastname');
		if(strlen($this->keyword) > 2){
			foreach(explode(' ', $this->keyword) as $term ){
				$rowset->where(function($query) use ($term){
					$query->where('firstname', 'LIKE', "%{$term}%")
					->orWhere('lastname', 'LIKE', "%{$term}%")
					->orWhere('email', 'LIKE', "%{$term}%")
					;
				});
			}			
		}

		if(!Concierge::auth()->user()->hasPermissionTo('see-super-admin')){
			$rowset->where('role', '!=', 'super-admin');
		}

		$data['rowset'] = $this->paginate($rowset);

		return $data;
	}

	public function getValidations(){
		$password	= 'required|min:6|confirmed';
		$email		= 'required|email|unique:administrators,email';

		if($this->editRow->id){
			$password	= 'nullable|min:6|confirmed';
			$email		= 'required|email|unique:administrators,email,' . $this->editRow->id;
		}

        return [
            'firstname' => 'required',
            'lastname' => 'required',
			'locale' => 'required',
			'role' => 'required',
            'email' => $email,
            'new_password' => $password,
        ];
	}
}