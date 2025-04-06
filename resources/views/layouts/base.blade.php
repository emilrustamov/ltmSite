<!DOCTYPE html>
<html lang="ru">

<head itemscope itemtype="http://schema.org/WPHeader">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ config('app.url') }}/{{ Request::path() }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="@yield('metaDesc')">
    <meta property="og:url" content="{{ config('app.url') }}/{{ $lang }}">
    <meta property="og:image" content="{{ config('app.url') }}/assets/images/ltm.png">
    <meta property="og:site_name" content="LTM Studio">
    <meta property="og:locale" content="ru_RU">
    <title itemprop="headline">@yield('title')</title>
    <meta property="og:title" content="@yield('ogTitle')">
    <meta itemprop="description" name="description" content="@yield('metaDesc')">
    <meta itemprop="keywords" name="keywords" content="@yield('metaKey')">
    <meta name='freelancehunt' content='c02792cc8b8b525'>
    <link rel="alternate" hreflang="ru" href="@yield('ruLink')">
    <link rel="shortcut icon" href="{{ asset('/assets/images/ltm.svg') }}">
    <link rel="alternate" hreflang="en" href="@yield('enLink')">
    <link rel="alternate" hreflang="tk" href="@yield('tkLink')">
    <script type='application/ld+json'> </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5TMJMPE0M9"></script>
    <script>
        var texts = @json(__('translate.texts'));
    </script>
    <link rel="alternate" hreflang="x-default" href="{{ config('app.url') }}" />
    <link rel="alternate" hreflang="ru" href="{{ config('app.url') }}/ru/">
    <link rel="alternate" hreflang="en" href="{{ config('app.url') }}/en/">
    <link rel="alternate" hreflang="tk" href="{{ config('app.url') }}/tk/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="loaders position-fixed w-100 h-100 justify-content-center align-items-center"
        style="background-color: #1c1b1b; z-index: 999999; display: flex;">
        <div class="circle-container" style="top: 0%; left:0%; width:70rem; height: 70rem ">
            <div class="scrolling-image" style="width:20rem; height:auto">
                <img src="{{ asset('/assets/images/circled-text.png') }}" alt="Scrolling Image">
            </div>
            <div class="center-image" style="width:10%; height:auto">
                <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Center Image">
            </div>
        </div>
    </div>


    <div class="follow-cursor hidden md:block"></div>
    <div class="cursor-outer hidden md:block" id="custom-cursor"></div>
    <div class="cursor-inner hidden md:block" id="cursor-inner"></div>

    <div class="page-content">
        @include('layouts.header')
        @yield('custom-slider')
        @yield('serv-slider')
        @yield('circles')


        <div>
            @yield('content')
        </div>

        @hasSection('sec-serv-slider')
            <div class="sec-serv-slider relative">
                @yield('sec-serv-slider')
            </div>
        @endif



        <div class="container">
            @yield('sec-content')
            @include('components.about-footer')
        </div>

        @include('layouts.footer')
    </div>

    @include('layouts.scripts')
    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.23/bundled/lenis.min.js"></script>
    <script>
        const lenis = new Lenis({
            duration: 1.5, // больше = более тягучий скролл
            easing: t => 1 - Math.pow(1 - t, 4), // кинематографичный, лёгкий на старте, тяжёлый в конце
            smooth: true,
            smoothTouch: false, // оставляем нативный скролл на телефонах
            direction: 'vertical', // можно сделать horizontal scroll, если нужно
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);
    </script>


    <button onclick="topFunction()" id="scrollBtn"
        class="hidden fixed bottom-5 right-8 z-[999] border-0 outline-none bg-white cursor-pointer text-white p-4 rounded-[10px] text-[18px] transition-all duration-300 ease-in-out hover:bg-[#e31e24] group">
        <i class="fa-solid fa-rocket text-[#1a1515] transition-all duration-300 ease-in-out group-hover:text-white"></i>

    </button>
    <div class="crt-overlay"></div>

</body>
</html>