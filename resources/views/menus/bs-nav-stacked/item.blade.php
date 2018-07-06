@if ($nav->hasChild())
  {{-- No support parent --}}
@else
  @if ($nav->isActive())
    <li role="presentation" class="active"><a href="{{ $nav->getUrl() }}">{{ $nav->getText() }}</a></li>
  @else
    <li role="presentation"><a href="{{ $nav->getUrl() }}">{{ $nav->getText() }}</a></li>
  @endif
@endif
