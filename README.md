# ConciergeCMS

This is a startup CMS for Laravel and Livewire. The package includes:

- A custom Authentication (leaving default ```App\Models\User:class```)
- A custom Route
- A default style using TailwindCSS

Note that this package has not been released on packagist.

# Installation

1. Add service provider to `config/app.php` : 
   
	```php
	'providers' => [
		...,
		MrTea\Concierge\ConciergeServiceProvider::class
	]
	```

2. Add alias to `config/app.php` : 
   
   ```php
	'aliases' => [
		...,
		MrTea\Concierge\Facades\Concierge::class
	]
	```

3. Run `php artisan migrate`

## Config file

If you want to modify the Concierge config file, you can publish the config file:

```bash
php artisan vendor:publish --provider='MrTea\Concierge\Providers\ConciergeServiceProvider' --tag='config'
```

## Assets

To publish the css and js :

```bash
php artisan vendor:publish --provider='MrTea\Concierge\Providers\ConciergeServiceProvider' --tag='assets'
```

To add in your blade:

### CSS

```html
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href="{{ asset('assets/concierge/libs/font-awesome/css/all.min.css') }}" rel="stylesheet">
@livewireStyles
<link rel="stylesheet" href="{{ asset('assets/concierge/css/app.css') }}">
```

### JS

```html
@livewireScripts
<script src="{{ asset('assets/concierge/js/app.js') }}"></script>
@stack('scripts')
```

# TO DO

- [x] Create a middleware to check if it has an administrator.
- [x] Admin model for authentication
- [x] Create a login page and logout
- [x] Create a middleware to detect if admin is authenticated
- [x] Create a middleware to redirect user to login is unauthenticated.
- [x] Create a forget password form
- [x] Send a reset password email
- [x] Create a reset password
- [x] Create UI design element (Form, layout)
- [x] Create a Sidebar that can be set in config file
- [x] Edit Profile
- [x] Manage Administrators
- [x] Role management
- [ ] Create a function to add item to sidebar menu
- [ ] Add package to packagist to be able to install via composer
- [ ] Documentation