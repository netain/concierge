<li>
	<a href="{{ route($url) }}" class="{{ Route::currentRouteName() == $url ? 'font-medium' : '' }}">{{ $title }}</a>
</li>
