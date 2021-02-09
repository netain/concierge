<?php

namespace MrTea\Concierge\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use Concierge;

class Profile extends Component
{
	use WithFileUploads;

	public $firstname;
	public $lastname;
	public $email;
	public $password;
	public $locale;
	public $avatar;
	public $new_password;
	public $new_password_confirmation;

	public function mount()
	{
		foreach(Concierge::auth()->user()->toArray() as $attribute => $value){
			$this->{$attribute} = $value;
		}
	}
	public function render()
	{
		return view('concierge::livewire.profile')
        ->extends('concierge::_layout')
        ->section('content');
	}

	public function submit()
	{
		$data = $this->validateData();

		Concierge::auth()->user()->fill($data)->save();

		$this->new_password = null;
		$this->new_password_confirmation = null;
		session()->flash('message', ['type' => 'success' , 'msg' => 'Profile updated!' ]);
	}

	protected function validateData()
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
			'locale' => 'required',
            'email' => 'required|email|unique:administrators,email,' . Concierge::auth()->user()->id,
            'new_password' => 'nullable|min:6|confirmed',
        ];

        return $this->validate($rules);
    }
}