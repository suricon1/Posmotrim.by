@php
    $pattern = ['~/page-\d+\.html\?page=\d+~', '~.html\?page=\d+~'];
@endphp

@if ($paginator->hasPages())
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{--<li class="disabled">Назад</li>--}}
            @else
                @if($paginator->currentPage() == 2)
                    <li><a class="page-link" href="{{ preg_replace($pattern, '', $paginator->previousPageUrl()) }}.html" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>
                @else
                    <li><a class="page-link" href="{{ preg_replace($pattern, '/page-'.($paginator->currentPage()-1), $paginator->previousPageUrl()) }}.html" rel="prev"><i class="fa fa-angle-double-left"></i></a></li>
                @endif
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><a href="#">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                        @else
                            @if ($page == 1)
                                <li><a class="page-link" href="{{ preg_replace($pattern, '', $url) }}.html">{{ $page }}</a></li>
                            @else
                                <li><a class="page-link" href="{{ preg_replace($pattern, '/page-'.$page, $url) }}.html">{{ $page }}</a></li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="page-link" href="{{ preg_replace($pattern, '/page-'.($paginator->currentPage()+1), $paginator->nextPageUrl()) }}.html" rel="next"><i class="fa fa-angle-double-right"></i></a></li>
            @else
                {{--<li class="disabled">Вперед</li>--}}
            @endif
        </ul>
@endif