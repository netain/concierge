<div class="bg-white my-4 p-4 shadow">
	@if(isset($title) || isset($btns))
		<header class="pb-3 border-b flex justify-between items-center">
			<div>
				@if(isset($title))
					<h3 class="font-medium text-lg">{{ $title }}</h3>
				@endif
			</div>

			@if (isset($btns))
				<div class="flex justify-end items-center">
					@foreach ($btns as $btn)
						@if (isset($btn['permission']))
							@hasPermissionTo($btn['permission'])
								<a {!! Concierge::html()->arrayToHtmlAttribs($btn['attributes']) !!}>{!! $btn['label'] !!}</a>
							@endhasPermissionTo
						@else
							<a {!! Concierge::html()->arrayToHtmlAttribs($btn['attributes']) !!}>{!! $btn['label'] !!}</a>
						@endif
						
					@endforeach
				</div>
			@endif
		</header>
	@endif
    <div class="{{ isset($title) || isset($btns) ? 'pt-4' : '' }}">
		{{ $slot }}
	</div>
</div>