<div>
	@component('concierge::components.container')
		@include('concierge::components.page-title', ['title' => 'Profile'])
		@include('concierge::components.flash-message')
		@component('concierge::components.card')
			@include('concierge::components.form-administrator')
		@endcomponent
	@endcomponent
</div>