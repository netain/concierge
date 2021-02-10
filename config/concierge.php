<?php 
return [
	'route' => [
		'prefix' => 'concierge',
		'as' => 'concierge.',
		'middleware' => ['web']
	],

	'auth' => [
		'guard' => 'concierge',
		'guards' => [
			'concierge' => [
				'driver' => 'session',
				'provider' => 'administrators',
			]
		],
		
		'providers' => [
			'administrators' => [
				'driver' => 'eloquent',
				'model' => MrTea\Concierge\Models\Administrator::class,
			]
		],
	],

	'logo' => [
		'login' => '/assets/concierge/img/logo-placeholder.png',
		'nav'	=> '/assets/concierge/img/logo-placeholder.png'
	],

	'sidebar' => [
		[
			'title' => 'Dashboard',
			'type' => 'route',
			'url' => 'concierge.dashboard'
		],
		[
			'title' => 'Concierge',
			'type' => 'title'
		],
		[
			'title' => 'Administrators',
			'type' => 'route',
			'url' => 'concierge.administrators'
		],
	],

	'roles' => [
		'admin' => []
	]
];