<div class="grid_portfolio section" data-lang="{{ $lang }}">
    @forelse($portfolios as $portf)
        <a href="/{{ $lang }}/portfolio/{{ $portf->slug }}" class="grid-item relative project-link" data-id="{{ $portf->id }}">
            <div class="columnPort relative content">
                @if ($portf->getFirstMediaUrl('portfolio-images', 'webp'))
                    <img data-src="{{ $portf->getFirstMediaUrl('portfolio-images', 'webp') }}" alt="{{ $portf->translation($lang)?->title ?? 'Image' }}" loading="lazy" class="lazyload">
                @else
                    <img src="{{ asset('assets/images/proformat.png') }}" alt="{{ $portf->translation($lang)?->title ?? 'Placeholder image' }}" loading="lazy">
                @endif
                <div class="content">
                    <div>
                        <div class="line"></div>
                        <h2>
                            {!! $portf->translation($lang)?->title ?? 'No title' !!}
                            <span class="not-viewed-label" style="display: inline-block; font-size: 0.7rem; color: white; background: #e31e24; margin-left: 0.5rem; border-radius: 0.25rem; padding: 2px 6px;">Не просмотрено</span>
                            <span class="viewed-label" style="display: none; font-size: 0.7rem; color: white; background: #28a745; margin-left: 0.5rem; border-radius: 0.25rem; padding: 2px 6px;">Просмотрено</span>
                        </h2>
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

