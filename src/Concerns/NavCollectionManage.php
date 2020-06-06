<?php

namespace Nurmanhabib\LaravelMenu\Concerns;

use Nurmanhabib\Navigator\Items\Nav;
use Nurmanhabib\Navigator\NavCollection;

trait NavCollectionManage
{
    /**
     * @var array
     */
    protected $navStack = [];

    public function setCurrent(NavCollection $navigator)
    {
        $this->navStack[] = $navigator;

        return $this;
    }

    public function clearCurrent()
    {
        array_pop($this->navStack);

        return $this;
    }

    /**
     * @return NavCollection
     */
    public function getCurrent()
    {
        return end($this->navStack);
    }

    public function logout($text = 'Logout', $url = 'logout', $icon = null)
    {
        return $this->link($text, $url, $icon, 'POST');
    }

    public function link($text, $url = '#', $icon = null, $method = 'GET')
    {
        return $this->getCurrent()->addLink($text, $url, $icon)->setData(compact('method'));
    }

    public function heading($text)
    {
        return $this->getCurrent()->addHeading($text);
    }

    public function home($text = 'Home', $url = '#', $icon = null)
    {
        return $this->getCurrent()->addHome($text, $url, $icon);
    }

    public function separator()
    {
        return $this->getCurrent()->addSeparator();
    }

    public function dropdown($text, callable $callback, $icon = null, $url = '#')
    {
        return $this->parent($text, $callback, $icon, $url);
    }

    public function parent($text, callable $callback, $icon = null, $url = '#')
    {
        $parent = $this->getCurrent()->addParent($text, function () {}, $icon, $url);

        $this->setCurrent($child = $parent->getChild());

        $callback($child);

        $this->clearCurrent();

        return $parent;
    }

    public function add(Nav $nav)
    {
        return $this->getCurrent()->add($nav);
    }
}
