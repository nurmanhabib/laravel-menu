<?php

namespace Nurmanhabib\LaravelMenu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
        $this->registerConainer();
        $this->registerHelpers();
        $this->registerViews();
    }

    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-menu.php' => config_path('laravel-menu.php')
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/laravel-menu.php', 'laravel-menu');
    }

    protected function registerConainer()
    {
        $this->app->singleton('menu', function ($app) {
            $menu = new Menu;

            foreach ($app['config']->get('laravel-menu.views', []) as $alias => $view) {
                $menu->registerView($alias, $view);
            }

            return $menu;
        });
    }

    protected function registerHelpers()
    {
        require_once __DIR__.'/../helpers/helpers.php';
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views/menus', 'menus');

        $this->publishes([
            __DIR__.'/../resources/views/menus' => resource_path('views/vendor/menus')
        ], 'views');
    }

    public function register()
    {

    }
}
