@if ($paginator->hasPages())
<div class="pager-section container-fluid">
    <ul class="pager">
        @if ($paginator->onFirstPage())
        <li class="disabled"><span>Previous</span></li>
        @else
        <li><a class="pager:number arrow" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="disabled"><span>{{ $element }}</span></li>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="pager:number pager:active"><span>{{ $page }}</span></li>
        @else
        <li ><a class="pager:number" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li><a class="pager:number arrow" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
        <li class="disabled"><span>Next</span></li>
        @endif
    </ul>
</div>

@endif