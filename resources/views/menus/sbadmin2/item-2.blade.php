@if ($nav->hasChild())
  @include('menus::sbadmin2.parent', ['level' => 'third'])
@else
  <li>
    <a href="{{ $nav->getUrl() }}" class="{{ $nav->isActive() ? 'active' : '' }}">
      {{ $nav->getText() }}
    </a>
  </li>
@endif
