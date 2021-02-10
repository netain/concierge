@if (isset($permission))
	@hasPermissionTo($permission)
		<li>
			<a href="{{ route($url) }}" class="{{ Route::currentRouteName() == $url ? 'font-medium' : '' }}">{{ __($title) }}</a>
		</li>
	@endhasPermissionTo
@else
<li>
	<a href="{{ route($url) }}" class="{{ Route::currentRouteName() == $url ? 'font-medium' : '' }}">{{ __($title) }}</a>
</li>
@endif
