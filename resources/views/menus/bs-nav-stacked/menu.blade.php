<ul class="nav nav-pills nav-stacked">
  @foreach ($menu->getItems() as $nav)
    @if ($nav->getType() == 'link')
      @include('menus::bs-nav-stacked.item')
    @endif
  @endforeach
</ul>
