@extends('concierge::_layout')


@section('content')
	<div class="flex items-center justify-center h-screen w-screen">
		@component('concierge::components.container')
			<div class="flex justify-center">
				<div class="w-full md:w-1/2 px-2">
					<div class="shadow rounded-full w-1/3 mx-auto mb-8 overflow-hidden">
						<img src="{{ config('concierge.logo.login') }}" class="">
					</div>

					@if(!$error)
						@include('concierge::components.flash-message')

						@component('concierge::components.card', ['title' => 'New password'])
							@component('concierge::components.form', [
								'attributes' => [
									'action' => route('concierge.reset.password.update'),
								],
								'lblSubmit' => 'Reset password'
							])
								<div class="flex flex-wrap -mx-2">
									<div class="w-full pb-4 px-2">
										<label for="new_password" class="font-medium text-xs">{{ __('New password') }}</label>
										<input type="password" name="new_password" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
										@if ($errors->has('new_password'))
											<p class="text-red-500 text-xs mt-1">{{ $errors->first('new_password') }}</p>
										@endif
									</div>
									<div class="w-full pb-4 px-2">
										<label for="new_password_confirmation" class="font-medium text-xs">{{ __('Confirm new password') }}</label>
										<input type="password" name="new_password_confirmation" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
										@if ($errors->has('new_password_confirmation'))
											<p class="text-red-500 text-xs mt-1">{{ $errors->first('new_password_confirmation') }}</p>
										@endif
									</div>
								</div>

								<div class="flex justify-end items-center -mx-2 mb-8">
									<div class="px-2">
										<a class="text-xs cursor-pointer" href="{{ route('concierge.authenticate') }}">Return to login</a>
									</div>
								</div>

								<input type="hidden" name="token" value="{{ request()->get('token') }}">
								<input type="hidden" name="email" value="{{ request()->get('email') }}">
							@endcomponent
						@endcomponent
					@else
						@component('concierge::components.message', ['color' => 'red'])
							<p>{{ $error }}</p>
						@endcomponent
					@endif
				</div>
			</div>
		@endcomponent
	</div>
@endsection