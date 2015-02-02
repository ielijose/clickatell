<?php namespace Ielijose\Clickatell;

use Illuminate\Support\ServiceProvider;

class ClickatellServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ielijose/clickatell');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['clickatell'] = $this->app->share(function($app)
		{
			return new Clickatell;
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Clickatell', 'Ielijose\Clickatell\Facades\Clickatell');
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
