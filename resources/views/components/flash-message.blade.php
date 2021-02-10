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
			@break
		@default
			@component('concierge::components.message', ['color' => 'green'])
				<p>{{ Session::get('message.msg') }}</p>
			@endcomponent
			@break
	@endswitch
@endif
