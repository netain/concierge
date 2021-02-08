<?php

namespace MrTea\Concierge\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

// LIVEWIRE COMPONENTS
use Livewire;
use MrTea\Concierge\Http\Livewire\Authentication;
use MrTea\Concierge\Http\Livewire\Dashboard;

// MIDDLEWARE
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use MrTea\Concierge\Http\Middleware\RedirectToSetup;

// FACADES
use MrTea\Concierge\Concierge;

class ConciergeServiceProvider extends ServiceProvider
{
	public function register()
	{

	}

	public function boot()
	{
		$this->registerConfig();
		$this->registerRoutes();
		$this->registerViews();
		$this->registerMigrations();
		$this->registerAuthGuard();
		$this->registerPublish();
		$this->registerLivewireComponents();
		$this->registerMiddlewares();
		$this->registerFacades();
	}

	protected function registerConfig()
	{
		$this->mergeConfigFrom(__DIR__.'/../../config/concierge.php', 'concierge');
	}

	protected function registerPublish()
	{
		if ($this->app->runningInConsole()) {
			$this->publishes([ __DIR__.'/../../config/concierge.php' => config_path('concierge.php')], 'config');
			$this->publishes([ __DIR__.'/../../dist' => public_path('assets/concierge') ], 'assets');
		}
	}

	protected function registerRoutes(){
		Route::group(config('concierge.route'), function () {
			$this->loadRoutesFrom(__DIR__.'/../../routes/concierge.php');
		});
	}

	protected function registerViews()
	{
		$this->loadViewsFrom(__DIR__.'/../../resources/views', 'concierge');
	}

	protected function registerMigrations()
	{
		$this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
	}

	protected function registerAuthGuard()
	{
		$authConfig = $this->app['config']->get('auth');

		$authConfig['guards'] = array_merge($authConfig['guards'], config('concierge.auth.guards'));
		$authConfig['providers'] = array_merge($authConfig['providers'], config('concierge.auth.providers'));

		$this->app['config']->set('auth', $authConfig);
	}

	protected function registerLivewireComponents()
	{
		Livewire::component('concierge-authentication', Authentication::class);
		Livewire::component('concierge-dashboard', Dashboard::class);
	}

	protected function registerMiddlewares()
	{

		$kernel = $this->app->make(Kernel::class);
  		$kernel->pushMiddleware(RedirectToSetup::class);

		$router = $this->app->make(Router::class);
  		// $router->aliasMiddleware('redirectToSetup', RedirectToSetup::class);
	}

	protected function registerFacades()
	{
		$this->app->bind('concierge', function($app) {
			return new Concierge();
		});
	}
}