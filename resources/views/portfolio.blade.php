@extends('layouts.base')

@section('title', 'Portfolio')

@section('content')
    <section class="container">
        <div>
            <h1>{{ __('translate.portfolioTitle') }}</h1>
            <p>{{ __('translate.portfolioSub') }}</p>
        </div>

        <div class="grid_portfolio section" data-lang="{{ $lang }}">
            @foreach($portfolio as $portf)
                <a href="/{{ $lang }}/portfolio/{{ $portf->id }}" class="grid-item relative" data-id="{{ $portf->id }}">
                    <div class="columnPort relative content">
                        @if ($portf->getFirstMediaUrl('portfolio-images', 'webp'))
                            <img data-src="{{ $portf->getFirstMediaUrl('portfolio-images', 'webp') }}" alt="Image" loading="lazy" class="lazyload">
                        @else
                            <img src="{{ asset('assets/images/proformat.png') }}" alt="Image" loading="lazy">
                        @endif
                        <div class="content">
                            <div>
                                <div class="line"></div>
                                <h2>{!! $portf->title[$lang] ?? 'No title' !!}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="arrow d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-arrow-right-long" style="color:white; font-size:30px;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
