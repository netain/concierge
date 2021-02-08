# ConciergeCMS

This is a startup CMS for Laravel and Livewire. The package includes:

- A custom Authentication (leaving default ```App\Models\User:class```)
- A custom Route
- A default style using TailwindCSS

# Installation

## Without Composer
1. Add service provider to `config/app.php` : 

```php
'providers' => [
	...,
	MrTea\Concierge\ConciergeServiceProvider::class
]
```
2. Run `php artisan migrate`

## With Composer (Not ready)

This package has not been released and will have to manually add the repo to your composer.json

1. Add repo directory to `composer.json`
   
```json
...
"repositories": [
   	...,
	{
   	  "type": "path",
   	  "url": "[PATH TO CONCIERGE]"
   	}
]
```

2. Run `composer require mrtea\concierge`
3. Run `php artisan migrate`

# TO DO

- [x] Create a middleware to check if it has an administrator.
- [x] Admin model for authentication
- [x] Create a login page
- [x] Create a middleware to detect if admin is authenticated
- [x] Create a middleware to redirect user to login is unauthenticated.
- [ ] Create a forget password form
- [ ] Send a reset password email
- [ ] Create a reset password
- [ ] Create UI design element (Form, layout)