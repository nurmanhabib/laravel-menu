<?php

namespace Nurmanhabib\LaravelMenu;

use Nurmanhabib\LaravelMenu\Modifiers\NavFullUrl;
use Nurmanhabib\LaravelMenu\Renders\NavViewRender;
use Nurmanhabib\Navigator\Items\Nav;
use Nurmanhabib\Navigator\NavCollection;
use Nurmanhabib\Navigator\Navigator;

class LaravelNavigator extends Navigator
{
    public function __construct(NavCollection $menu)
    {
        parent::__construct($menu);

        $this->setView(menu()->getDefaultView());
    }

    public function setView($view)
    {
        $view = app('menu')->getView($view);

        $this->menu->setRenderer(new NavViewRender($view));

        return $this;
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
