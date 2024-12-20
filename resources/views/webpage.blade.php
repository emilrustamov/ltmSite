@extends('layouts.base')

@section('title', 'Услуги IT-консалтинговой компании LTM Studio в Туркменистане')
@section('content')
    <div class="regular17 m45">{{ __('translate.digitalAgencyServices') }}</div>
    <h1 class="title">{{ __('translate.webDevelopment') }}</h1>
    <p class="regular17 m45">{{ __('translate.webDevelopmentDescription1') }}</p>
    <p class="regular17 m45">{{ __('translate.webDevelopmentDescription2') }}</p>
    <p class="bold40 m60">{{ __('translate.trustUs') }}</p>
    <div class="types-of-sites m60">
        <div class="big-type-card landing">
            <div class="card-desc">
                <p class="card-desc-title">{{ __('translate.landing') }}</p>
                <p class="card-desc-subtitle">{{ __('translate.landingDescription') }}</p>
            </div>
        </div>
        <div class="small-type-card site-catalog">
            <div class="card-desc">
                <p class="card-desc-title">{{ __('translate.siteCatalog') }}</p>
                <p class="card-desc-subtitle">{{ __('translate.siteCatalogDescription') }}</p>
            </div>
        </div>
        <div class="small-type-card multipage">
            <div class="card-desc">
                <p class="card-desc-title">{{ __('translate.multipage') }}</p>
                <p class="card-desc-subtitle">{{ __('translate.multipageDescription') }}</p>
            </div>
        </div>
        <div class="big-type-card online-shop">
            <div class="card-desc">
                <p class="card-desc-title">{{ __('translate.onlineShop') }}</p>
                <p class="card-desc-subtitle">{{ __('translate.onlineShopDescription') }}</p>
            </div>
        </div>
    </div>
    <p class="regular17">{{ __('translate.weAlsoSpecializeIn') }}</p>
    <div class="small-container">
        <ul class="services_dots">
            <li>
                <a class="no-line" href="/{{ $lang }}/services-webpages"><button
                        class="services-dot"><span>{!! nl2br(__('translate.servTitle1')) !!}</span></button></a>
            </li>
            <li>
                <button class="services-dot"><span>{!! nl2br(__('translate.servTitle2')) !!}</span></button>
            </li>
            <li>
                <a class="no-line" href="/{{ $lang }}/services-webpages"><button
                        class="services-dot"><span>{!! nl2br(__('translate.servTitle3')) !!}</span></button></a>
            </li>
            <li>
                <a class="no-line" href="/{{ $lang }}/services-bitrix"><button
                        class="services-dot"><span>{!! nl2br(__('translate.servTitle4')) !!}</span></button></a>
            </li>
        </ul>
        <div class="services_buttons m60">
            <a href="/{{ $lang }}/services"
                class="btn first no-line"><span>{{ __('translate.allServ') }}</span></a>
            <a href="/{{ $lang }}/about_us"
                class="btn second no-line m-auto"><span>{{ __('translate.aboutUs') }}</span></a>
        </div>
    </div>
    @include('components.timeline')
    @include('components.quiz')
    <div class="d-flex align-items-center justify-content-between m45">
        <p class="bold40 mobile20">{{ __('translate.studioProjects') }}</p>
        <a href="/{{ $lang }}/portfolio" class="regular20 no-line">{{ __('translate.viewAll') }}</a>
    </div>

    @php
        $slides = '';
        for ($i = 0; $i < count($portfolio); $i++) {
            $portf = $portfolio[$i];
            $slides .= '<div class="swiper-slide">';
            if ($portf['photo'] != '') {
                $slides .= '<img src="' . asset('storage/' . $portf['photo']) . '" alt="Image" loading="lazy">';
            } else {
                $slides .= '<img src="' . asset('assets/images/proformat.png') . '" alt="Image" loading="lazy">';
            }
            $slides .= '<div class="gridTitle">' . $portf['title_' . $lang] . '</div>';
            $slides .= '</div>';
        }
    @endphp

    <!-- Swiper Slider -->
    <div class="swiper">
        <div class="swiper-wrapper">
            {!! $slides !!}
        </div>

        <!-- Навигация -->
        <div class="custom-swiper-button-prev">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="custom-swiper-button-next">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>
    <script>
        window.onload = function() {
            const swiper = new Swiper('.swiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 40,
                navigation: {
                    nextEl: '.custom-swiper-button-next',
                    prevEl: '.custom-swiper-button-prev',
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    991: {
                        slidesPerView: 2,
                    },
                },
            });
        };
    </script>

@endsection
