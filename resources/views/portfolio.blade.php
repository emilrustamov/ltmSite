@extends('layouts.base')

@section('title', 'Portfolio')

@section('content')

    <section class="container">

        <div>
            <h1>{{ __('translate.portfolioTitle') }}</h1>
            <div class="text-[2.4rem]">
                <div>
                    {{ __('translate.portfolioSub') }}
                </div>
            </div>
            <div class="blog_cats_wrapper">
            </div>
        </div>
        @php
            $portfolio = collect($portfolio)->sortBy('When')->toArray();
        @endphp
        <div class="grid_portfolio" data-lang="{{ $lang }}">
            @for ($i = 0; $i < count($portfolio); $i++)
                @php
                    $portf = $portfolio[$i];
                    $additionalClass = $i % 2 != 0 ? 'add-padding' : '';
                @endphp
                <a href="/{{ $lang }}/portfolio/{{ $portf['id'] }}" class="grid-item {{ $additionalClass }} "
                    data-id="{{ $portf['id'] }}">
                    <div class="columnPort relative content">
                        @if ($portf['photo'] != '')
                            <img src="{{ asset('storage/' . $portf['photo']) }}" alt="Image" class=""
                                loading="lazy">
                        @else
                            <img src="{{ asset('assets/images/proformat.png') }}" class="" alt="Image"
                                loading="lazy">
                        @endif
                        <div class="gridText content">
                            <div class="rowPort">
                                <div class="line"></div>
                                <div class="gridTitle">
                                    {!! $portf['title'][$lang] ?? 'No title' !!}
                                </div>
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

    <div class="reload" id="loadMoreButton">
        <div class="reload-icon">
            <img src="{{ '../assets/images/reload.png' }}" loading="lazy">
        </div>
        <span class="reloadText">{{ __('translate.more') }}</span>
    </div>

    <script>
        function lm() {
            var button = document.getElementById('loadMoreButton');
        }
    </script>
@endsection
