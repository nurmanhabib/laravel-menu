<li class="nav-item">
    <a href="{{ $item->getUrl() }}" class="nav-link {{ $item->isActive() ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ $item->getText() }}</p>
    </a>
</li>
