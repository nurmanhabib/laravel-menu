<?php

namespace Nurmanhabib\LaravelMenu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('menu', function ($app) {
            return new Menu;
        });
    }
}
