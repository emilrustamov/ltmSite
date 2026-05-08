@if ($jobPositions->hasPages())
    <div class="portfolio-pagination">
        <nav class="portfolio-pagination__nav" aria-label="Job positions pagination">
            <ul class="portfolio-pagination__list">
                @if ($jobPositions->onFirstPage())
                    <li class="portfolio-pagination__item disabled">
                        <span class="portfolio-pagination__link portfolio-pagination__link--arrow">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </span>
                    </li>
                @else
                    <li class="portfolio-pagination__item">
                        <a class="portfolio-pagination__link portfolio-pagination__link--arrow" href="{{ $jobPositions->previousPageUrl() }}" rel="prev">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </a>
                    </li>
                @endif

                @foreach ($jobPositions->getUrlRange(1, $jobPositions->lastPage()) as $page => $url)
                    @php
                        $isEdgePage = $page <= 2 || $page >= $jobPositions->lastPage() - 1;
                        $isNearCurrent = abs($page - $jobPositions->currentPage()) <= 2;
                    @endphp

                    @if ($page == $jobPositions->currentPage())
                        <li class="portfolio-pagination__item active">
                            <span class="portfolio-pagination__link">{{ $page }}</span>
                        </li>
                    @elseif ($isEdgePage || $isNearCurrent)
                        <li class="portfolio-pagination__item">
                            <a class="portfolio-pagination__link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif ($page == 3 || $page == $jobPositions->lastPage() - 2)
                        <li class="portfolio-pagination__item dots">
                            <span class="portfolio-pagination__link">…</span>
                        </li>
                    @endif
                @endforeach

                @if ($jobPositions->hasMorePages())
                    <li class="portfolio-pagination__item">
                        <a class="portfolio-pagination__link portfolio-pagination__link--arrow" href="{{ $jobPositions->nextPageUrl() }}" rel="next">
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


