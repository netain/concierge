@extends('concierge::_layout')


@section('content')
	@component('concierge::components.container')
		<div class="flex -mx-2 justify-center">
			<div class="w-full px-2">
				@component('concierge::components.card', ['title' => 'Installation Completed!'])
					<p class="mb-4">The admin account has successfully been created. You can now log into Concierge.</p>

					<footer class="flex justify-end items-center pt-4 mt-4 border-t">
						<a href="{{ route('concierge.authenticate') }}" class="text-white bg-gray-500 hover:bg-gray-600 px-4 py-2">Login</a>
					</footer>
				@endcomponent
			</div>
		</div>
	@endcomponent
@endsection