<ul>
  @foreach ($menu->getItems() as $nav)
    @if ($nav->getType() == 'heading')
      @include('menus::simple.heading', compact('nav'))
    @elseif ($nav->getType() == 'separator')
      @include('menus::simple.heading', compact('nav'))
    @else
      @include('menus::simple.item', compact('nav'))
    @endif
  @endforeach
</ul>
