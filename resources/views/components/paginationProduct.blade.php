<ul class="pagination">
    <!-- Nút Previous -->
    @if ($products->previousPageUrl())
        <li class="page-item">
            <a class="page-number" href="{{ $products->previousPageUrl() }}">
                <i class="fa-solid fa-angle-left"></i>
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-number">
                <i class="fa-solid fa-angle-left"></i>
            </span>
        </li>
    @endif

    <!-- Các nút trang -->
    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
            <a class="page-number" href="{{ $url }}">{{ $page }}</a>
        </li>
    @endforeach

    <!-- Nút Next -->
    @if ($products->nextPageUrl())
        <li class="page-item">
            <a class="page-number" href="{{ $products->nextPageUrl() }}">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-number">
                <i class="fa-solid fa-angle-right"></i>
            </span>
        </li>
    @endif
</ul>
