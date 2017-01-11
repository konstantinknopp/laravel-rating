<?php

namespace Unikat\LaravelRating;

use Illuminate\Support\ServiceProvider;

class RatingServiceProvider extends ServiceProvider
{
    
    protected $defer = false;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands('command.rating.migration');
        $this->app->bind('command.rating.migration', function ($app) {
            return new MigrationCommand();
        }, true);
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    public function provides()
    {
        return [
            'command.rating.migration',
        ];
    }
}
