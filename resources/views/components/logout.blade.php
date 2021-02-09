<form action="{{ route('concierge.logout') }}" method="post">
	@csrf
	<button type="submit" class="appearance-none outline-none font-light">Logout</button>
</form>