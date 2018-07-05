# Welcome to Laravel Menu!

Generate multi navigation menus with unique names, can be displayed anywhere. Custom templating. Support Laravel 5.

------

## Installation

#### <i class="icon-file"></i> Installation with Composer

Simply execute the following command

```
composer require nurmanhabib/laravel-menu
```



#### <i class="icon-file"></i> Register Service Provider and Facade

Add `Nurmanhabib\LaravelMenu\MenuServiceProvider` to the file in `config/app.php` in array with key `providers`.

```php
'providers' => [
    ...,
    ...,
    
    Nurmanhabib\LaravelMenu\MenuServiceProvider::class,
],
```



Add `Nurmanhabib\LaravelMenu\Facades\Menu` to the file in `config/app.php` in array with key `aliases`.


```php
'aliases' => [
    ...,
    ...,
  
    'Menu' => Nurmanhabib\LaravelMenu\Facades\Menu::class,
],
```

------

## Quick Example

You can create in the routes files, middleware, or service providers that you custom yourself as needed.

```php
<?php

Menu::make('sidebar', function () {
    Menu::link('Dashboard', route('home'), 'view-dashboard');

    Menu::dropdown('Users', function () {
        Menu::link('All', 'users');
        Menu::link('Add New User', 'users/create');
    }, 'accounts');

    Menu::link('Posts', 'posts', 'paper');
    
    Menu::dropdown('Settings', function () {
        Menu::link('Date and Time', 'settings/date-time');
        Menu::link('Other Setting', 'settings/other');
    }, 'wrench');
});
```


```php
<?php

Menu::make('account', function () {
    Menu::link('Me', 'me', 'view-dashboard');

    Menu::separate();

	Menu::link('Change Password', url('change-password'), 'view-dashboard');
    Menu::logout();
    
    // Alternative to
    // Menu::link('Logout', 'logout', 'signout')->setData(['method' => 'POST']);
});
```




#### Render to View

```html
{!! Menu::get('sidebar') !!}
```


You can also call with the `menu()` helpers


```html
{!! menu()->get('sidebar') !!}
```

or

```html
{!! menu('sidebar') !!}
```



## Custom View

To be able to customize the navigation with view

```php
Menu::get('sidebar')->setView('view.name');
```

Then you can customize `view.name` and receive `$menu` variable `Nurmanhabib\Navigator\NavCollection`

```html
<ul>
  @foreach ($menu->getItems() as $item)
    @if ($item->getType() == 'heading')
      <li class="text-muted">{{ $item->getText() }}</li>
    @elseif ($item->getType() == 'separator')
      <li class="text-muted">---</li>
    @else
      @if ($item->hasChild())
        <li class="has_sub">
          <a href="javascript:void(0)">
            <i class="={{ $item->getIcon() }}"></i> {{ $item->getText() }}
            <span class="menu-arrow"></span>
          </a>
          
          @include('view.name', ['menu' => $item->getChild()])
        </li>
      @else
        @if ($item->isActive())
          <li class="active">
            <a href="{{ $item->getUrl() }}">
              <i class="{{ $item->getIcon() }}"></i> {{ $item->getText() }}
            </a>
          </li>
        @else
          <li>
            <a href="{{ $item->getUrl() }}">
              <i class="{{ $item->getIcon() }}"></i> {{ $item->getText() }}
            </a>
          </li>
        @endif
      @endif
    @endif
  @endforeach
</ul>
```


## Custom Render

```php
use Nurmanhabib\LaravelMenu\Renders\NavViewRender;

Menu::get('sidebar')->setRender(new NavViewRender('view.name'));
```

------

### API

#### Nav

```php
$nav->getText();
$nav->getUrl();
$nav->getIcon();
$nav->isActive();
$nav->isVisible();
$nav->hasChild();
$nav->getChild();
```



#### NavCollection

```php
$collection->addHeading();
$collection->addHome();
$collection->addSeparator();
$collection->addLink('Text', 'link', 'icon');
$collection->addParent('Text Parent', callback($child), 'icon', '#');
$collection->add($nav);
$collection->getItems();
```
