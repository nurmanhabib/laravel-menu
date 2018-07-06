<ul class="nav" id="side-menu">
  @foreach ($menu->getItems() as $nav)
    @if ($nav->getType() == 'heading')
      @include('menus::sbadmin2.heading', compact('nav'))
    @elseif ($nav->getType() == 'separator')
      @include('menus::sbadmin2.heading', compact('nav'))
    @else
      @include('menus::sbadmin2.item', compact('nav'))
    @endif
  @endforeach
</ul>
