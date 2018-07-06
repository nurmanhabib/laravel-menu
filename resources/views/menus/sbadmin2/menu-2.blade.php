<ul class="nav nav-{{ $level }}-level">
  @foreach ($menu->getItems() as $nav)
    @if ($nav->getType() == 'link')
      @include('menus::sbadmin2.item-2')
    @endif
  @endforeach
</ul>
