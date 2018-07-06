<li>
  <a href="#">
    @if ($level == 'second')
      <i class="{{ $nav->getIcon() ?: 'fa fa-file-o' }}"></i> {{ $nav->getText() }}
    @else
      {{ $nav->getText() }}
    @endif
    <span class="fa arrow"></span>
  </a>
  @include('menus::sbadmin2.menu-2', ['menu' => $nav->getChild(), 'level' => $level])
</li>
