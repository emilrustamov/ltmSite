@extends('layouts.base')

@section('title', 'Portfolio')

@section('content')

    <section class="container">

        <div>
            <h1>{{ __('translate.portfolioTitle') }}</h1>

            <p>
                {{ __('translate.portfolioSub') }}
            </p>

        </div>
        @php
            $portfolio = collect($portfolio)->sortBy('When')->toArray();
        @endphp
        <div class="grid_portfolio section" data-lang="{{ $lang }}">
            @for ($i = 0; $i < count($portfolio); $i++)
                @php
                    $portf = $portfolio[$i];
                @endphp
                <a href="/{{ $lang }}/portfolio/{{ $portf['id'] }}" class="grid-item  relative" data-id="{{ $portf['id'] }}">
                    <div class="columnPort relative content">
                        @if ($portf['photo'] != '')
                            <img src="{{ asset('storage/' . $portf['photo']) }}" alt="Image" class="" loading="lazy">
                        @else
                            <img src="{{ asset('assets/images/proformat.png') }}" class="" alt="Image"
                                loading="lazy">
                        @endif
                        <div class="content">
                            <div>
                                <div class="line"></div>
                                <h2>
                                    {!! $portf['title'][$lang] ?? 'No title' !!}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="arrow d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-arrow-right-long" style="color:white; font-size:30px;"></i>
                    </div>
                </a>
            @endfor
        </div>
    </section>

    {{-- <div class="reload" id="loadMoreButton">
        <div class="reload-icon">
            <img src="{{ '../assets/images/reload.png' }}" loading="lazy">
        </div>
        <span class="reloadText">{{ __('translate.more') }}</span>
    </div> --}}

@endsection
