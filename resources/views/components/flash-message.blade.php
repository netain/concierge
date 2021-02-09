@if(Session::has('message'))
	@switch(Session::get('message.type'))
		@case('error')
				@component('concierge::components.message', ['color' => 'red'])
					<p>{{ Session::get('message.msg') }}</p>
				@endcomponent
			@break
		@case('info')
			@component('concierge::components.message', ['color' => 'yellow'])
				<p>{{ Session::get('message.msg') }}</p>
			@endcomponent
			<div class="border-2 border-yellow-300 bg-yellow-100 p-4 text-yellow-700">
				<p>{{ Session::get('message.msg') }}</p>
			</div>
			@break
		@default
			@component('concierge::components.message', ['color' => 'green'])
				<p>{{ Session::get('message.msg') }}</p>
			@endcomponent
			@break
	@endswitch
@endif
