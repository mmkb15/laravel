@if ($paginator->hasPages())
<ul class="wg-pagination">
    @if ($paginator->onFirstPage())
        <li><span><i class="icon-chevron-left"></i></span></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}"><i class="icon-chevron-left"></i></a></li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <li><span>{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                <li class="{{ $page == $paginator->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="icon-chevron-right"></i></a></li>
    @else
        <li><span><i class="icon-chevron-right"></i></span></li>
    @endif
</ul>
@endif
