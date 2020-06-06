@if ($item->getType() == 'heading')
    <li class="nav-header">{{ strtoupper($item->getText()) }}</li>
@else
    @if ($item->hasChild())
        <li class="nav-item has-treeview {{ $item->isActive() ? 'menu-open' : '' }}">
            <a href="{{ $item->getUrl() }}" class="nav-link {{ $item->isActive() ? 'active' : '' }}">
                <i class="nav-icon {{ $item->getIcon() ?: 'fas fa-th' }}"></i>
                <p>
                    {{ $item->getText() }}
                    <i class="right fas fa-angle-left"></i>
                    @if ($badge = $item->getData('badge'))
                        <span class="right badge badge-{{ Arr::get($badge, 'type', 'info') }}">{{ Arr::get($badge, 'text') }}</span>
                    @endif
                </p>
            </a>
            @include('menus.admin-lte.menus-dropdown', ['items' => $item->getChild()->getItems()])
        </li>
    @else
        <li class="nav-item">
            @if ($item->getData('method') == 'POST')
                @php($formId = uniqid('form-'))
                <a href="{{ $item->getUrl() }}"
                   class="nav-link {{ $item->isActive() ? 'active' : '' }}"
                   onclick="event.preventDefault();
                            document.getElementById('{{ $formId }}').submit();"
                >
                    <i class="nav-icon {{ $item->getIcon() ?: 'fas fa-th' }}"></i>
                    <p>
                        {{ $item->getText() }}
                        @if ($badge = $item->getData('badge'))
                            <span class="right badge badge-{{ Arr::get($badge, 'type', 'info') }}">{{ Arr::get($badge, 'text') }}</span>
                        @endif
                    </p>
                </a>
                <form id="{{ $formId }}" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            @else
                <a href="{{ $item->getUrl() }}" class="nav-link {{ $item->isActive() ? 'active' : '' }}">
                    <i class="nav-icon {{ $item->getIcon() ?: 'fas fa-th' }}"></i>
                    <p>
                        {{ $item->getText() }}
                        @if ($badge = $item->getData('badge'))
                            <span class="right badge badge-{{ Arr::get($badge, 'type', 'info') }}">{{ Arr::get($badge, 'text') }}</span>
                        @endif
                    </p>
                </a>
            @endif
        </li>
    @endif
@endif
