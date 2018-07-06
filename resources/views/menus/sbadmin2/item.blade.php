@if ($nav->hasChild())
  @include('menus::sbadmin2.parent', ['level' => 'second'])
@else
  <li>
    <a href="{{ $nav->getUrl() }}" class="{{ $nav->isActive() ? 'active' : '' }}">
      <i class="{{ $nav->getIcon() ?: 'fa fa-file-o' }}"></i> {{ $nav->getText() }}
    </a>
  </li>
@endif
