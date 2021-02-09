<?php

namespace MrTea\Concierge\Http\Livewire;

use Livewire\Component;

use MrTea\Concierge\Models\Administrator;

use MrTea\Concierge\Traits\Livewire\IsListable;
use MrTea\Concierge\Traits\Livewire\IsFormable;
use MrTea\Concierge\Traits\Livewire\IsDeletable;

class Administrators extends Component
{
	use IsListable, IsFormable, IsDeletable;
	protected $model = Administrator::class;
	protected $defaultValues = [
		'firstname' => '',
		'lastname' => '',
		'email' => '',
		'password' => '',
		'locale' => 'en',
	];

	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $locale;
	public $avatar;
	public $new_password;
	public $new_password_confirmation;

	public function render()
	{
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
            'email' => $email,
            'new_password' => $password,
        ];
	}
}