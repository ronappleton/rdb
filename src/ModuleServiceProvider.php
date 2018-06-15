<?php

namespace RonAppleton\RDB;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        parent::__construct($app);
        $this->app = $app;
    }

    public function boot()
    {
    }

    public function register()
    {
    }

    /**
     * Register the RDB library instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->bind('rdb', function () {
            return new RDBLibrary();
        });
    }
}