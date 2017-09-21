<?php

namespace Nurmanhabib\LaravelMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Nurmanhabib\LaravelMenu\Concerns\NavCollectionManage;
use Nurmanhabib\Navigator\Activators\RequestActivator;
use Nurmanhabib\Navigator\Items\Nav;
use Nurmanhabib\Navigator\Modifiers\NavFullUrl;
use Nurmanhabib\Navigator\NavCollection;
use Nurmanhabib\Navigator\Navigator;
use Nurmanhabib\Navigator\Renders\NavRender;

class Menu
{
    use NavCollectionManage;

    /**
     * @var Collection
     */
    protected $navigators;

    protected $renders;

    protected $globalActivator;

    /**
     * Menu constructor.
     * @param array $navigators
     */
    public function __construct($navigators = [])
    {
        $this->navigators = new Collection($navigators);
        $this->renders = new Collection;
    }

    /**
     * @param string $name
     * @param callable $callback
     * @return Navigator
     */
    public function make($name = 'default', callable $callback)
    {
        $navigator = new Navigator($menu = new NavCollection);
        $navigator->setActivator(new RequestActivator(request()));

        $this->navigators->put($name, $navigator);

        $this->setCurrent($menu);

        $callback($menu);

        $this->clearCurrent();

        return $navigator;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        return $this->navigators;
    }

    /**
     * @param string $name
     * @param callable|null $callback
     * @return Navigator
     */
    public function get($name = 'default', callable $callback = null)
    {
        $navigator = $this->navigators->get($name);

        $navigator->transform(function (Nav $nav) {
            return new NavFullUrl($nav);
        });

        if ($callback) {
            $callback($navigator->getOriginalMenu());
        }

        return $navigator;
    }

    public function render($name = 'default')
    {
        return $this->get($name)->render();
    }
}
