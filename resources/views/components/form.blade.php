@php
	$dataAttributes = [
		'action' => isset($action) ? $action : '',
		'method' => isset($method) ? $method : 'post',
	];

	if(isset($attributes) && is_array($attributes)){
		$dataAttributes = array_merge($dataAttributes, $attributes);
	}

	$attributesHtml = implode(' ', array_map(function($key) use ($dataAttributes){ 
		return "{$key}=\"{$dataAttributes[$key]}\""; 
	}, array_keys($dataAttributes)));
@endphp

<form {!! $attributesHtml !!}>
	@csrf
	{{ $slot }}
	<footer class="flex justify-end items-center pt-4 mt-4 border-t">
		@if (isset($is_modal) && $is_modal)
			<a wire:click.prevent="cancelEdit" class="mr-4 px-4 py-2 cursor-pointer">Close</a>
		@endif
		@include('concierge::components.form.submit', ['label' => isset($lblSubmit) ? $lblSubmit : 'Submit'])
	</footer>
</form>