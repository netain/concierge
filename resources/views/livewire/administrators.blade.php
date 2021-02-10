<div>
	@component('concierge::components.container')
		@include('concierge::components.page-title', ['title' => 'Administrators'])

		@component('concierge::components.card', [
			'btns' => [
				[
					'label' => 'Create<i class="fas fa-plus ml-2"></i>',
					'permission' => 'create-admin',
					'attributes' => [
						'class' => 'ml-2 cursor-pointer text-sm flex items-center text-white bg-gray-700 hover:bg-gray-900 px-2 py-1',
						'wire:click.prevent' => 'edit'
					]
				]
			]
		])

		<div class="pb-4 w-1/4">
			<input type="search" wire:model="keyword" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
		</div>
		@if ($rowset->count())
			<table class="table-auto w-full">
				<thead>
					<tr>
						<th class="text-left p-2">Fullname</th>
						<th class="text-left p-2">Role</th>
						<th class="text-left p-2">Email</th>
						<th class="text-right p-2">Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($rowset as $k => $row)
						<tr class="{{ $k % 2 == 1 ? 'bg-gray-100' : '' }} border">
							<td class="p-2">
								{!! $row->fullname !!}
							</td>
							<td class="p-2">
								{!! $row->role_name !!}
							</td>
							<td class="p-2">
								{!! $row->email !!}
							</td>
							<td valign="middle" class="p-2">
								<div class="flex flex-wrap justify-end items-center">
									@if(Concierge::auth()->user()->id == $row->id)
										<a wire:click.prevent="edit({{$row->id}})" class="ml-2 cursor-pointer text-sm flex items-center text-white bg-blue-700 hover:bg-blue-900 px-2 py-1">Edit<i class="fas fa-edit ml-2"></i></a>
									@else
										@hasPermissionTo('update-admin')
											<a wire:click.prevent="edit({{$row->id}})" class="ml-2 cursor-pointer text-sm flex items-center text-white bg-blue-700 hover:bg-blue-900 px-2 py-1">Edit<i class="fas fa-edit ml-2"></i></a>
										@endhasPermissionTo
										
										@hasPermissionTo('delete-admin')
											<a wire:click.prevent="delete({{$row->id}})" class="ml-2 cursor-pointer text-sm flex items-center text-white bg-red-700 hover:bg-red-900 px-2 py-1">Delete<i class="fas fa-trash ml-2"></i></a>
										@endhasPermissionTo
									@endif
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{ $rowset->links('concierge::components.pagination') }}
				
		@else
			@component('concierge::components.message', ['color' => 'yellow'])
				<p>No Item found.</p>
			@endcomponent
		@endif	
			
		@endcomponent
	@endcomponent

	@if($editRow)
		@component('concierge::components.modal', ['size' => 'md', 'title' => $editRow->id ? 'Edit administrator' : 'Create administrator'])
			@include('concierge::components.flash-message')
			@include('concierge::components.form-administrator', ['is_modal' => true, 'lblSubmit' => $editRow->id ? 'Update' : 'Create'])
		@endcomponent
	@endif

	@if($deleteRow)
		@component('concierge::components.modal', ['size' => 'md', 'title' => 'Confirm delete'])
			Are you sure you would like to delete this administrator?
			<div class="mt-8 pt-4 border-t flex justify-end items-center">
				<a wire:click.prevent="cancelDelete" class="mr-4 px-4 py-2 cursor-pointer">Cancel</a>
				<a wire:click.prevent="confirmDelete" class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 cursor-pointer">Delete</a>
			</div>
		@endcomponent
	@endif
</div>