<?php

namespace Nurmanhabib\LaravelMenu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-menu.php' => config_path('laravel-menu.php')
        ]);

        $this->mergeConfigFrom(__DIR__.'/../config/laravel-menu.php', 'laravel-menu');

        $this->app->singleton('menu', function ($app) {
            $menu = new Menu;

            foreach ($app['config']->get('laravel-menu.views', []) as $alias => $view) {
                $menu->registerView($alias, $view);
            }

            return $menu;
        });
    }

    public function register()
    {

    }
}
