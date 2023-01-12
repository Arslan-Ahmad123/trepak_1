<style>
    .pagination {
      /* background-color:black !important; */
      box-shadow:1px 5px 10px lightgray;
      border-radius:30px;
    }
    .page-item.active .page-link{
        z-index: 3;
        color: #fff !important  ;
        background-color: #00ACD6 !important;
        border-radius: 50%;
        padding: 6px 12px;
    }
    .page-link{
        z-index: 3;
        color: #00ACD6 !important;
        background-color: #fff;
        border-radius: 50%;
        border:none;
        padding: 6px 12px !important;
    }
    .page-item:first-child .page-link{
        border-radius: 50% !important;
    }
    .page-item:last-child .page-link{
        border-radius: 50% !important;   
    }
    .pagination li{
        padding: 3px;
    }
    .disabled .page-link{
        color: #212529 !important;
        opacity: 0.5 !important;
    }
</style>
@if ($paginator->hasPages())
<nav aria-label="Page navigation example" id="custom-pagniation">
    <ul class="pagination justify-content-center p-3">
        @if ($paginator->onFirstPage())
            {{-- <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li> --}}
        @else
            <li class="page-item prev"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
        @endif
      
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            {{-- <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li> --}}
        @endif
    </ul>
@endif