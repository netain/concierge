@extends('concierge::_layout')


@section('content')
	<div class="container mx-auto px-2">
		<div class="flex -mx-2 justify-center">
			<div class="w-full px-2">
				@component('concierge::components.card', ['title' => 'Installation'])
					<p class="mb-4">To begin, create an admin account.</p>

					@component('concierge::components.form', ['action' => route('concierge.setup.create'), 'lblSubmit' => 'Create'])
						<div class="flex flex-wrap -mx-2">
							<div class="w-1/2 pb-4 px-2">
								<label for="firsname" class="font-medium text-xs">{{ __('Firstname') }}</label>
								<input type="text" name="firstname" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
								@if ($errors->has('firstname'))
									<p class="text-red-500 text-xs mt-1">{{ $errors->first('firstname') }}</p>
								@endif
							</div>
							<div class="w-1/2 pb-4 px-2">
								<label for="firsname" class="font-medium text-xs">{{ __('Lastname') }}</label>
								<input type="text" name="lastname" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
								@if ($errors->has('lastname'))
									<p class="text-red-500 text-xs mt-1">{{ $errors->first('lastname') }}</p>
								@endif
							</div>
							<div class="w-1/2 pb-4 px-2">
								<label for="email" class="font-medium text-xs">{{ __('Email') }}</label>
								<input type="email" name="email" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
								@if ($errors->has('email'))
									<p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
								@endif
							</div>
							<div class="w-1/2 pb-4 px-2">
								<label for="lang" class="font-medium text-xs">{{ __('Language') }}</label>
								<div class="mt-1 py-2">
									<input type="hidden" name="locale" value="en" class="sr-only">English
								</div>
								@if ($errors->has('locale'))
									<p class="text-red-500 text-xs mt-1">{{ $errors->first('locale') }}</p>
								@endif
							</div>
							<div class="w-1/2 pb-4 px-2">
								<label for="new_password" class="font-medium text-xs">{{ __('Password') }}</label>
								<input type="password" name="new_password" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
								@if ($errors->has('new_password'))
									<p class="text-red-500 text-xs mt-1">{{ $errors->first('new_password') }}</p>
								@endif
							</div>
							<div class="w-1/2 pb-4 px-2">
								<label for="new_password_confirmation" class="font-medium text-xs">{{ __('Confirm password') }}</label>
								<input type="password" name="new_password_confirmation" class="block w-full mt-1 p-2 appearance-none outline-none border font-light">
								@if ($errors->has('new_password_confirmation'))
									<p class="text-red-500 text-xs mt-1">{{ $errors->first('new_password_confirmation') }}</p>
								@endif
							</div>
						</div>
					@endcomponent
				@endcomponent
			</div>
		</div>
	</div>
@endsection