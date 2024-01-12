@if ($paginator->hasPages())
<ul>
    @foreach ($elements as $element)
        @if (is_string($element))
            <li>
                <span aria-current="page" class="page-numbers current">{{ $element }}</span>
            </li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active">
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ $url}}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach
</ul>
@endif
