<?php

if (!function_exists('menu')) {
    /**
     * @param string $name
     * @return \Nurmanhabib\LaravelMenu\Menu|\Nurmanhabib\LaravelMenu\LaravelNavigator
     */
    function menu($name = null)
    {
        return $name ? app('menu')->get($name) : app('menu');
    }
}
