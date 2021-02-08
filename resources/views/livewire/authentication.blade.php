<div class="w-screen h-screen flex items-center justify-center">
	<div class="container mx-auto px-2">
		<div class="flex -mx-2 justify-center">
			<div class="w-full md:w-1/2 px-2">
				<div class="shadow rounded-full w-1/3 mx-auto mb-8 overflow-hidden">
					<img src="{{ config('concierge.logo.login') }}" class="">
				</div>

				@if(Session::has('loginError'))
					@component('concierge::components.flash-message', ['color' => 'red'])
						<p>{{ Session::get('loginError') }}</p>
					@endcomponent
				@endif

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
								<label for="remember_me">
									<input type="checkbox" wire:model="rememberMe" value="1" id="remember_me" class="outline-none"> {{ __('Remember me') }}
								</label>
							</div>
							<div class="px-2">
								<a class="text-xs cursor-pointer">Forgot your password?</a>
							</div>
						</div>
					@endcomponent
				@endcomponent
			</div>
		</div>
	</div>
</div>