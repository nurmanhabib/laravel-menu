<li>
  @if ($nav->isActive())
    <strong><a href="{{ $nav->getUrl() }}">{{ $nav->getText() }}</a></strong>
  @else
    <a href="{{ $nav->getUrl() }}">{{ $nav->getText() }}</a>
  @endif
  @include('menus::simple.menu', ['menu' => $nav->getChild()])
</li>
