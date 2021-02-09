@php
	switch ($size) {
		case 'sm':
			$width = "w-1/4";
			break;
		case 'lg':
			$width = "w-full";
			break;
		default:
			$width = "w-1/2";
			break;
	}
@endphp

<div class="modal fixed inset-0 overflow-auto flex justify-center">
	@component('concierge::components.container')
		<div class="mx-auto {{$width}}">
			@component('concierge::components.card', ['title' => isset($title) && $title ? $title : null ])
				{{$slot}}
			@endcomponent
		</div>
	@endcomponent
</div>