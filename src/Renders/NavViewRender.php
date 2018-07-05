<?php

namespace Nurmanhabib\LaravelMenu\Renders;

use Nurmanhabib\Navigator\NavCollection;
use Nurmanhabib\Navigator\Renders\NavRender;

class NavViewRender implements NavRender
{
    /**
     * @var string
     */
    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function render(NavCollection $menu)
    {
        if (!view()->exists($this->view)) {
            return 'View [' . $this->view . '] not found';
        }

        return view($this->view, compact('menu'));
    }
}
