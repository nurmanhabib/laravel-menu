@if ($nav->hasChild())
  @include('menus::simple.parent')
@else
  @if ($nav->isActive())
    <li><strong><a href="{{ $nav->getUrl() }}">{{ $nav->getText() }}</a></strong></li>
  @else
    <li><a href="{{ $nav->getUrl() }}">{{ $nav->getText() }}</a></li>
  @endif
@endif
