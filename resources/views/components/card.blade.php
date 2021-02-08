<div class="bg-white my-4 p-4 shadow">
	@if(isset($title) || isset($btns))
		<header class="pb-3 border-b flex justify-between items-center">
			@if(isset($title))
				<h3 class="font-medium text-lg">{{ $title }}</h3>
			@endif
		</header>
	@endif
    <div class="pt-4">
		{{ $slot }}
	</div>
</div>