@extends('layouts.base')

@section('title', 'Portfolio')

@section('content')


<div class="container">
    <div class="portfolioPage">
        <div class="portfolioIntro">
            <div class="leftHeaderTop">
                <p>{{ __('translate.mainPage') }}</p>
                <p>{{ __('translate.services') }}</p>
            </div>
            {{-- <div class="rowLeftHeader portfHeader">
                <a href="/{{$lang}}/">
                    <p>{{__('translate.mainPage')}}</p>
                </a>
                <span>
                    <p>{{$currentPage }}</p>
                </span>
                <span>
                    <p>Главная</p>
                </span>
                <span>
                    <p>Проекты</p>
                </span>
            </div> --}}
            <div class="column left">
                <h1 class="title">{{ __('translate.portfolioTitle') }}</h1>
                <div class="subt">
                    {{-- <div class="p1">
                        {{ __('translate.portfolioSub') }}
                    </div> --}}
                </div>
                <div class="blog_cats_wrapper">

                    {{-- <div class="blog_cats">
                        <ul class="row_p">
                            <li class="element">
                                <p data-category-name="All">{{ __('translate.menuAll') }}</p>
                            </li>
                            @foreach ($categories as $category)
                                <li class="element">
                                    <p data-category-name="{{ $category['category_en'] }}">
                                        {{ $category['category_' . $lang] }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="grid_portfolio" data-lang="{{ $lang }}">
                @for ($i = 0; $i < count($portfolio); $i++)
                                @php
                                    $portf = $portfolio[$i];
                                    $additionalClass = $i % 2 != 0 ? 'add-padding' : '';
                                @endphp
                                <a href="/{{ $lang }}/portfolio/{{ $portf['id'] }}" class="grid-item {{ $additionalClass }} no-line"
                                    data-id="{{ $portf['id'] }}">
                                    <div class="columnPort position-relative content">
                                        @if ($portf['photo'] != '')
                                            <img src="{{ asset('storage/' . $portf['photo']) }}" alt="Image" class="" loading="lazy">
                                        @else
                                            <img src="{{ asset('assets/images/proformat.png') }}" class="" alt="Image" loading="lazy">
                                        @endif
                                        <div class="gridText content">
                                            <div class="rowPort">
                                                <div class="line"></div>
                                                <div class="gridTitle">{!! $portf['title_' . $lang] !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrow d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-arrow-right-long" style="color:white; font-size:30px;"></i>
                                    </div>
                                </a>
                @endfor
            </div>

        </div>
    </div>
    {{-- <button type="button" onclick="lm()" id="lm" type="btn -btn-primary">Bassana gatrak</button> --}}
    <div class="reload" id="loadMoreButton">
        <div class="reload-icon">
            <img src="{{ '../assets/images/reload.png' }}" loading="lazy">
        </div>
        <span class="reloadText">{{ __('translate.more') }}</span>
    </div>
</div>
<script>
    function lm() {
        var button = document.getElementById('loadMoreButton');
        console.log('hhdhahhah');
    }
</script>
@endsection