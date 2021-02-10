<aside id="sidebar" class="fixed right-0 top-0 h-full bg-white shadow overflow-auto">
	<div class="p-4">
		<div class="py-4 border-b">
			<div class="mx-auto mb-4 rounded-full bg-gray-900 text-white font-bold text-4xl uppercase avatar flex justify-center items-center">
				{{ Concierge::auth()->user()->avatar }}
			</div>
			<div class="text-center text-md">
				Ciao <strong>{{ Concierge::auth()->user()->firstname }}</strong>!
			</div>
			<div class="text-center text-xs flex items-center justify-center">
				@hasPermissionTo('edit-profile')
					<a href="{{ route('concierge.profile') }}">Profile</a>
					<div class="mx-2">|</div>
				@endhasPermissionTo

				@include('concierge::components.logout')
			</div>
		</div>
		<ul class="py-4">
			@if ($items->count())
				@foreach ($items as $item)
					@include('concierge::components.sidebar.'. $item['type'], $item)
				@endforeach
			@endif
		</ul>
	</div>
</aside>