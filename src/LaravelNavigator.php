<?php

namespace Nurmanhabib\LaravelMenu;

use Nurmanhabib\LaravelMenu\Modifiers\NavFullUrl;
use Nurmanhabib\LaravelMenu\Renders\NavViewRender;
use Nurmanhabib\Navigator\Items\Nav;
use Nurmanhabib\Navigator\Navigator;

class LaravelNavigator extends Navigator
{
    public function setView($view)
    {
        $view = app('menu')->getView($view);

        return $this->setRender(new NavViewRender($view));
    }

    public function renderView($view)
    {
        return $this->render(new NavViewRender($view));
    }

    public function getMenu()
    {
        $this->transform(function (Nav $nav) {
            return new NavFullUrl($nav);
        });

        return parent::getMenu();
    }
}
