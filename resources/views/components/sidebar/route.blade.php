<li>
	<a href="{{ route($url) }}" class="{{ Route::currentRouteName() == $url ? 'font-medium' : '' }}">{{ __($title) }}</a>
</li>
