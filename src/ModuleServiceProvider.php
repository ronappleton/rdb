<?php

namespace RonAppleton\RDB;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register our remote database library
     */
    public function register()
    {
        $this->app->alias('RDB', RDBLibrary::class);

        $this->registerRDBLibrary();
    }

    /**
     * Register the RDB library instance.
     *
     * @return void
     */
    protected function registerRDBLibrary()
    {
        $this->app->bind('rdb', function () {
            return new RDBLibrary();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['RDB', RDBLibrary::class];
    }
}