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
        return view($this->view, compact('menu'));
    }
}
