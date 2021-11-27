<link rel="stylesheet" href="css/paginator.css">
@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">

            {{-- Top Page Link --}}
            @if ($paginator -> onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="/book">&laquo;</a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&lt;&nbsp;Prev</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;&nbsp;Prev</a>
                </li>
            @endif

            {{-- Page Navigation --}}
            <div class="page-nav">
                {{$paginator->currentPage()}}&nbsp;/&nbsp;{{$paginator->lastPage()}}
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next&nbsp;&gt;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">Next&nbsp;&gt;</span>
                </li>
            @endif

            {{--Last Page Link--}}
            @if($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{$paginator->url($paginator->lastPage())}}">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
