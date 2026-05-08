<div class="grid_portfolio section" data-lang="{{ $lang }}">
    @forelse($portfolios as $portf)
        <a href="/{{ $lang }}/portfolio/{{ $portf->slug }}" class="grid-item relative project-link" data-id="{{ $portf->id }}">
            @php
                $imageVersion = $portf->updated_at?->timestamp ?? $portf->id;
            @endphp
            <div class="columnPort relative content">
                @if ($portf->getFirstMediaUrl('portfolio-images', 'webp'))
                    <img data-src="{{ $portf->getFirstMediaUrl('portfolio-images', 'webp') }}?v={{ $imageVersion }}" alt="{{ $portf->translation($lang)?->title ?? 'Image' }}" loading="lazy" class="lazyload">
                @else
                    <img src="{{ asset('assets/images/proformat.png') }}" alt="{{ $portf->translation($lang)?->title ?? 'Placeholder image' }}" loading="lazy">
                @endif
                <div class="content">
                    <div>
                        @php
                            $categoryNames = $portf->categories
                                ->map(function($category) use ($lang) {
                                    return $category->translation($lang)?->name ?? $category->slug ?? '';
                                })
                                ->filter()
                                ->take(2);
                        @endphp
                        <div class="portfolio-meta">
                            @if($categoryNames->isNotEmpty())
                                <div class="portfolio-category">{{ $categoryNames->implode(', ') }}</div>
                            @endif
                            <div class="portfolio-status">
                                <span class="not-viewed-label portfolio-status__badge portfolio-status__badge--not-viewed"><i class="fa-solid fa-eye-slash" aria-hidden="true"></i></span>
                                <span class="viewed-label portfolio-status__badge portfolio-status__badge--viewed"><i class="fa-solid fa-eye" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="line"></div>
                        <h2 class="portfolio-text">{!! $portf->translation($lang)?->title ?? 'No title' !!}</h2>
                    </div>
                </div>
            </div>
            <div class="arrow d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-arrow-right-long" style="color:white; font-size:30px;"></i>
            </div>
        </a>
    @empty
        <div class="portfolio-empty">
            <p>{{ __('translate.portfolioFilterEmpty') }}</p>
        </div>
    @endforelse
</div>

