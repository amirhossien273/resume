@if ($paginator->hasPages())
    <div class="row align-items-center">
        <div class="col-md-6 col-12 mb-3 mb-md-0">
            <div class="d-flex align-items-center">
                <span class="me-2">نمایش:</span>
                <form action="{{ url()->current() }}" method="get" class="me-3">
                    <select onchange="this.form.submit()"
                            class="form-select form-select-sm"
                            name="perPage"
                            style="width: 80px">
                        <option value="15" {{ $paginator->perPage() == 15 ? 'selected' : '' }}>15</option>
                        <option value="25" {{ $paginator->perPage() == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $paginator->perPage() == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $paginator->perPage() == 100 ? 'selected' : '' }}>100</option>
                    </select>

                    @foreach(request()->except(['page', 'perPage']) as $parameter => $parameter_value)
                        @if(!is_array($parameter_value))
                            <input type="hidden" name="{{ $parameter }}" value="{{ $parameter_value }}">
                        @else
                            @foreach($parameter_value as $key => $value)
                                <input type="hidden" name="{{ $parameter }}[{{ $key }}]" value="{{ $value }}">
                            @endforeach
                        @endif
                    @endforeach
                </form>
                <span class="text-muted">
                    نمایش {{ $paginator->firstItem() }} تا {{ $paginator->lastItem() }} از {{ $paginator->total() }} نتیجه
                </span>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm justify-content-center justify-content-md-end mb-0">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->toArray()['first_page_url'] }}">
                                <i class="fas fa-chevron-double-right"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page < $paginator->currentPage()-2 || $page > $paginator->currentPage()+2)
                                    @continue
                                @elseif ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->toArray()['last_page_url'] }}">
                                <i class="fas fa-chevron-double-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endif
