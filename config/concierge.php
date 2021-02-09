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
			'title' => __('Dashboard'),
			'type' => 'route',
			'url' => 'concierge.dashboard'
		],
		[
			'title' => __('Concierge'),
			'type' => 'title'
		],
		[
			'title' => __('Administrators'),
			'type' => 'route',
			'url' => 'concierge.administrators'
		],
	]
];