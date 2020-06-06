<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($menu->getItems() as $item)
            @include('menus.admin-lte.item')
        @endforeach
    </ul>
</nav>
