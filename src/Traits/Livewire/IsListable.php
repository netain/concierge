<?php
namespace MrTea\Concierge\Traits\Livewire;

use Illuminate\Pagination\Paginator;

trait IsListable {
	public $keyword;
	public $page = 1;
	public $nbPerPage = 25;

	public function paginate($rowset){

        Paginator::currentPageResolver(function () {
            return $this->page;
		});
		
		return $rowset->paginate($this->nbPerPage);
	}

	public function gotoPage($page){
		$this->page = $page;
	}

	public function previousPage(){
		$this->page--;
	}

	public function nextPage(){
		$this->page++;
	}
}