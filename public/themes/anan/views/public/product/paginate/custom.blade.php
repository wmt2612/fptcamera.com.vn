@if ($paginator->hasPages())
    <nav class="woocommerce-pagination">
        <ul class='page-numbers'>
            @foreach ($elements as $element)
                @if (is_string($element))
                <li><span aria-current="page"
                        class="page-numbers current">{{ $element }}</span>
                </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span aria-current="page" class="page-numbers current">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a class="page-numbers" href="{{ $url}}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
