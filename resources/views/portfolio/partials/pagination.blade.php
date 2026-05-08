@if ($portfolios->hasPages())
    <div class="portfolio-pagination">
        <nav class="portfolio-pagination__nav" aria-label="Portfolio pagination">
            <ul class="portfolio-pagination__list">
                @if ($portfolios->onFirstPage())
                    <li class="portfolio-pagination__item disabled">
                        <span class="portfolio-pagination__link portfolio-pagination__link--arrow">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </span>
                    </li>
                @else
                    <li class="portfolio-pagination__item">
                        <a class="portfolio-pagination__link portfolio-pagination__link--arrow" href="{{ $portfolios->previousPageUrl() }}" rel="prev">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </a>
                    </li>
                @endif

                @foreach ($portfolios->getUrlRange(1, $portfolios->lastPage()) as $page => $url)
                    @php
                        $isEdgePage = $page <= 2 || $page >= $portfolios->lastPage() - 1;
                        $isNearCurrent = abs($page - $portfolios->currentPage()) <= 2;
                    @endphp

                    @if ($page == $portfolios->currentPage())
                        <li class="portfolio-pagination__item active">
                            <span class="portfolio-pagination__link">{{ $page }}</span>
                        </li>
                    @elseif ($isEdgePage || $isNearCurrent)
                        <li class="portfolio-pagination__item">
                            <a class="portfolio-pagination__link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif ($page == 3 || $page == $portfolios->lastPage() - 2)
                        <li class="portfolio-pagination__item dots">
                            <span class="portfolio-pagination__link">…</span>
                        </li>
                    @endif
                @endforeach

                @if ($portfolios->hasMorePages())
                    <li class="portfolio-pagination__item">
                        <a class="portfolio-pagination__link portfolio-pagination__link--arrow" href="{{ $portfolios->nextPageUrl() }}" rel="next">
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </li>
                @else
                    <li class="portfolio-pagination__item disabled">
                        <span class="portfolio-pagination__link portfolio-pagination__link--arrow">
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif

