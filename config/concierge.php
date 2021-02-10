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
			'type' => 'title',
			'permission' => 'manage-admin'
		],
		[
			'title' => 'Administrators',
			'type' => 'route',
			'url' => 'concierge.administrators',
			'permission' => 'manage-admin'
		],
	],

	'roles' => [
		'super-admin' => [
			'label' => 'Super-Admin',
			'parent' => 'admin',
			'permissions' => [
				'assign-super-admin',
				'see-super-admin',
			],
		],
		'admin' => [
			'parent' => 'guest',
			'label' => 'Administrator',
			'permissions' => [
				'manage-admin',
				'create-admin',
				'update-admin',
				'delete-admin',
				'assign-admin-role'
			]
		],
		'guest' => [
			'label' => 'Guest',
			'permissions' => [
				'edit-profile'
			]
		],
	]
];