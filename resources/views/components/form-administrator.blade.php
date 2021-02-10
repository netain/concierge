@php
	$options = [
		'lblSubmit' => isset($lblSubmit)? $lblSubmit : 'Update',
		'is_modal' => isset($is_modal) ? $is_modal : false,
		'attributes' => ['wire:submit.prevent' => 'submit'], 
	];
@endphp

@component('concierge::components.form', $options)
	<div class="flex flex-wrap -mx-2">
		<div class="w-1/2 pb-4 px-2">
			<label for="firstname" class="font-medium text-xs">{{ __('Firstname') }}</label>
			<input type="text" wire:model="firstname" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
			@if ($errors->has('firstname'))
				<p class="text-red-500 text-xs mt-1">{{ $errors->first('firstname') }}</p>
			@endif
		</div>
		<div class="w-1/2 pb-4 px-2">

			<label for="lastname" class="font-medium text-xs">{{ __('Lastname') }}</label>
			<input type="text" wire:model="lastname" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
			@if ($errors->has('lastname'))
				<p class="text-red-500 text-xs mt-1">{{ $errors->first('lastname') }}</p>
			@endif
		</div>
		<div class="w-1/2 pb-4 px-2">
			<label for="email" class="font-medium text-xs">{{ __('Email') }}</label>
			<input type="email" wire:model="email" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
			@if ($errors->has('email'))
				<p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
			@endif
		</div>
		<div class="w-1/2 pb-4 px-2">
			<label for="lang" class="font-medium text-xs">{{ __('Language') }}</label>
			<div class="mt-1 py-2">
				<input type="hidden" wire:model="locale" value="en" class="sr-only">English
			</div>
			@if ($errors->has('locale'))
				<p class="text-red-500 text-xs mt-1">{{ $errors->first('locale') }}</p>
			@endif
		</div>
	</div>
		@if (isset($role) && Concierge::auth()->user()->hasPermissionTo('assign-admin-role'))
			<div class="flex flex-wrap -mx-2">
				<div class="w-1/2 pb-4 px-2">
					<label for="role" class="font-medium text-xs">{{ __('Role') }}</label>
					{{-- <input type="email" wire:model="email" class="block w-full mt-1 p-2 appearance-none outline-none border font-light"> --}}
					<select wire:model="role" class="form-select block w-full mt-1 p-2 appearance-none outline-none border font-light">
						@foreach (Concierge::role()->getAllRoles() as $value => $label)
							<option value="{{ $value }}">{{ $label }}</option>
						@endforeach
					</select>
					@if ($errors->has('role'))
						<p class="text-red-500 text-xs mt-1">{{ $errors->first('role') }}</p>
					@endif
				</div>
			</div>
		@endif
	<div class="flex flex-wrap -mx-2">	
		<div class="w-1/2 pb-4 px-2">
			<label for="new_password" class="font-medium text-xs">{{ __('Password') }}</label>
			<input type="password" wire:model="new_password" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
			@if ($errors->has('new_password'))
				<p class="text-red-500 text-xs mt-1">{{ $errors->first('new_password') }}</p>
			@endif
		</div>
		<div class="w-1/2 pb-4 px-2">
			<label for="new_password_confirmation" class="font-medium text-xs">{{ __('Confirm password') }}</label>
			<input type="password" wire:model="new_password_confirmation" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
			@if ($errors->has('new_password_confirmation'))
				<p class="text-red-500 text-xs mt-1">{{ $errors->first('new_password_confirmation') }}</p>
			@endif
		</div>
	</div>
@endcomponent