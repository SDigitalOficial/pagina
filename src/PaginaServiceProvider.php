<?php

namespace DigitalsiteSaaS\Pagina;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class PaginaServiceProvider extends ServiceProvider
{
	
	 public function register()
	{
		$this->app->bind('pagina', function($app) {
			return new Pagina;

		});
	}

	public function boot()
	{

	

		require_once __DIR__ . '/Http/helpers.php';
		require __DIR__ . '/Http/routes.php';


		$this->loadViewsFrom(__DIR__ . '/../views', 'pagina');

		$this->publishes([

			__DIR__ . '/migrations/2015_07_25_000000_create_usuario_table.php' => base_path('database/migrations/2015_07_25_000000_create_usuario_table.php'),

			]);


	}

}

