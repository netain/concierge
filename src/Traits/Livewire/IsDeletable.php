<?php
namespace MrTea\Concierge\Traits\Livewire;

trait IsDeletable {
	public $deleteRow;

	public function delete($id){
		$this->deleteRow = $this->model::findOrFail($id);
	}

	public function cancelDelete(){
		$this->deleteRow = null;
	}

	public function confirmDelete(){
		$this->deleteRow->delete();
		$this->cancelDelete();
	}
}
