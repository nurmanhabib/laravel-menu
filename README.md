# Welcome to Navigator!

Generate multi menu navigasi dengan nama yang unik, dapat ditampilkan dimana saja. Custom templating. Support Laravel 5.

------

## Instalasi

#### <i class="icon-file"></i> Install dengan Composer

Cukup sederhana, jalankan perintah berikut.

```
composer require nurmanhabib/laravel-menu
```



#### <i class="icon-file"></i> Tambahkan Service Provider

Tambahkan `Nurmanhabib\LaravelMenu\MenuServiceProvider` ke dalam file di `config/app.php` pada array `providers`.

```php
'providers' => [
    ...,
    ...,
    
    Nurmanhabib\LaravelMenu\MenuServiceProvider::class,
],
```



#### Tambahkan Aliases Facade Menu

```php
'aliases' => [
    ...,
    ...,
  
    'Menu' => Nurmanhabib\LaravelMenu\Facades\Menu::class,
],
```

------

## Contoh Penggunaan

Anda dapat membuat di dalam file routes, middleware, atau service provider yang Anda custom sendiri sesuai dengan kebutuhan

```php
<?php

Menu::make('sidebar', function () {
    Menu::link('Dashboard', url('/'), 'view-dashboard');

    Menu::dropdown('Guru dan Karyawan', function () {
        Menu::link('Guru', 'teachers');
        Menu::link('Karyawan', 'employees');
    }, 'accounts');

    Menu::link('Peserta Didik', 'students', 'accounts');
    Menu::dropdown('Konfigurasi', function () {
        Menu::link('Kurikulum', 'kurikulum');
    }, 'wrench');
});
```



#### Render to View

```html
{!! Menu::get('sidebar') !!}
```



#### Custom Render

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
