<?php

namespace Pete\LaravelImport;

use Illuminate\Support\ServiceProvider;

class LaravelImportServiceProvider extends ServiceProvider
{
    public function register()
    {	
        $this->app->singleton('wordpress-plus-laravel', function ($app) {
            return new LaravelImport;
        });	
    }

    public function boot()
    {
        
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');
		$this->loadViewsFrom(__DIR__.'/views', 'wordpress-plus-laravel-plugin');
		
        if ($this->app->runningInConsole()) {
            $this->commands([
				Console\AdaptLaravelImport::class,
            ]);
        }
		
    }
}
