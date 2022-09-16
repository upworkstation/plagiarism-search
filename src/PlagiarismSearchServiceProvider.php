<?php

namespace Michaelgatuma\PlagiarismSearch;

use Illuminate\Support\ServiceProvider;

class PlagiarismSearchServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'michaelgatuma');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'michaelgatuma');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/plagiarism-search.php', 'plagiarism-search');

        // Register the service the package provides.
        $this->app->singleton('plagiarism-search', function ($app) {
            return new PlagiarismSearch;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['plagiarism-search'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/plagiarism-search.php' => config_path('plagiarism-search.php'),
        ], 'plagiarism-search.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/michaelgatuma'),
        ], 'plagiarism-search.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/michaelgatuma'),
        ], 'plagiarism-search.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/michaelgatuma'),
        ], 'plagiarism-search.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
