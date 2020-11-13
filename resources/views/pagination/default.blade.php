@if ($paginator->hasPages())
    <nav class="pgn">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><a class="pgn__prev inactive">Prev</a></li>
            @else
                <li><a class="pgn__prev" href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pgn__num dots">…</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="pgn__num current">{{ $page }}</span></li>
                        @else
                            <li><a class="pgn__num" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="pgn__next" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            @else
                <li><a class="pgn__next inactive">Next</a></li>
            @endif
        </ul>
    </nav>
@endif
