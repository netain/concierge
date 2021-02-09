<?php
namespace MrTea\Concierge\Traits\Livewire;

trait IsFormable {
	public $editRow;

	public function edit($id = null)
	{
		$this->resetErrorMessages();
		$this->editRow = $id ? $this->model::findOrFail($id) : new $this->model($this->getDefaultValues());
		$this->setFormData();
	}

	protected function setFormData(){
		foreach($this->editRow->toArray() as $attribute => $value){
			$this->{$attribute} = $value;
		}
	}

	public function cancelEdit()
	{
		$this->resetErrorMessages();
		$this->editRow = null;
	}

	public function submit()
	{
		$data = $this->validate($this->getValidations());
		$this->editRow->fill($data)->save();
		if(method_exists($this, 'afterSave')){
			$this->afterSave();
		}

		session()->flash('message', ['type' => 'success' , 'msg' => 'The item has successfully been saved!' ]);
		$this->edit($this->editRow->id);
	}

	protected function resetErrorMessages()
	{
		$this->message = null;
		$this->resetErrorBag();
		$this->resetValidation();
	}

	protected function getDefaultValues()
	{
		return isset($this->defaultValues) ? $this->defaultValues : [];
	}
}