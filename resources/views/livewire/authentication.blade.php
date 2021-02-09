<div class="w-screen h-screen flex items-center justify-center">
	@component('concierge::components.container')
		<div class="flex -mx-2 justify-center">
			<div class="w-full md:w-1/2 px-2">
				<div class="shadow rounded-full w-1/3 mx-auto mb-8 overflow-hidden">
					<img src="{{ config('concierge.logo.login') }}" class="">
				</div>

				@include('concierge::components.flash-message')
				@switch($showForm)
					@case('password')
						
						@if(Session::get('message.type') !== 'success')
							@component('concierge::components.card', ['title' => 'Forgot your password'])
								<p class="mb-4">To reset your password, enter your email</p>

								@component('concierge::components.form', [
									'attributes' => [
										'action' => route('concierge.setup.create'),
										'wire:submit.prevent' => 'requestResetPassword'
									],
									'lblSubmit' => 'Submit'
								])
									<div class="flex flex-wrap -mx-2">
										<div class="w-full pb-4 px-2">
											<label for="email" class="font-medium text-xs">{{ __('Email') }}</label>
											<input type="email" wire:model="email" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
											@if ($errors->has('email'))
												<p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
											@endif
										</div>
									</div>

									<div class="flex justify-end items-center -mx-2 mb-8">
										<div class="px-2">
											<a class="text-xs cursor-pointer" wire:click.prevent="showForm('login')">Return to login</a>
										</div>
									</div>
								@endcomponent
							@endcomponent
						@endif
						@break
					@default
						@component('concierge::components.card')
							@component('concierge::components.form', [
								'attributes' => [
									'action' => route('concierge.setup.create'),
									'wire:submit.prevent' => 'login'
								],
								'lblSubmit' => 'Login'
							])
								<div class="flex flex-wrap -mx-2">
									<div class="w-1/2 pb-4 px-2">
										<label for="email" class="font-medium text-xs">{{ __('Email') }}</label>
										<input type="email" wire:model="email" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
										@if ($errors->has('email'))
											<p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
										@endif
									</div>
									<div class="w-1/2 pb-4 px-2">
										<label for="new_password" class="font-medium text-xs">{{ __('Password') }}</label>
										<input type="password" wire:model="password" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
										@if ($errors->has('password'))
											<p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
										@endif
									</div>
								</div>

								<div class="flex justify-between items-center -mx-2 mb-8">
									<div class="px-2">
										<label for="remember_me" class="text-sm">
											<input type="checkbox" wire:model="rememberMe" value="1" id="remember_me" class="outline-none"> {{ __('Remember me') }}
										</label>
									</div>
									<div class="px-2">
										<a class="text-xs cursor-pointer" wire:click.prevent="showForm('password')">Forgot your password?</a>
									</div>
								</div>
							@endcomponent
						@endcomponent
						@break
						
				@endswitch
			</div>
		</div>
	@endcomponent
</div>