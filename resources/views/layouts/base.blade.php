<!DOCTYPE html>
<html lang="{{ $lang ?? app()->getLocale() }}">

<head itemscope itemtype="http://schema.org/WPHeader">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ config('app.url') }}/{{ Request::path() }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="@yield('metaDesc')">
    <meta property="og:url" content="{{ config('app.url') }}/{{ $lang }}">
    <meta property="og:image" content="{{ config('app.url') }}/assets/images/ltm.png">
    <meta property="og:site_name" content="Lebizli Tehnologiya Merkezi (LTM)">
    @php
        // ② таблица соответствия для Open Graph
        $ogLocales = ['ru' => 'ru_RU', 'en' => 'en_US', 'tk' => 'tk_TM'];
        $ogLocale = $ogLocales[$lang ?? app()->getLocale()] ?? 'ru_RU';
    @endphp

    <meta property="og:locale" content="{{ $ogLocale }}"> {{-- ② OG‑локаль --}}
    <title itemprop="headline">@yield('title')</title>
    <meta name="robots" content="index, follow">
    <meta name="author" content="Lebizli Tehnologiya Merkezi (LTM)">
    <meta name="publisher" content="Lebizli Tehnologiya Merkezi (LTM)">
    <meta property="og:title" content="@yield('ogTitle')">
    <meta itemprop="description" name="description" content="@yield('metaDesc')">
    <meta itemprop="keywords" name="keywords" content="@yield('metaKey')">
    <meta name='freelancehunt' content='c02792cc8b8b525'>
    {{-- <link rel="alternate" hreflang="ru" href="@yield('ruLink')"> --}}
    <link rel="shortcut icon" href="{{ asset('/assets/images/ltm.png') }}">
    {{-- <link rel="alternate" hreflang="en" href="@yield('enLink')">
    <link rel="alternate" hreflang="tk" href="@yield('tkLink')"> --}}
    <script type='application/ld+json'> </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5TMJMPE0M9"></script>
    <script>
        var texts = @json(__('translate.texts'));
    </script>
    {{-- <link rel="alternate" hreflang="x-default" href="{{ config('app.url') }}" />
    <link rel="alternate" hreflang="ru" href="{{ config('app.url') }}/ru/">
    <link rel="alternate" hreflang="en" href="{{ config('app.url') }}/en/">
    <link rel="alternate" hreflang="tk" href="{{ config('app.url') }}/tk/"> --}}

    @php
        // Все поддерживаемые локали
        $locales = ['ru', 'en', 'tk'];

        $lang = $lang ?? app()->getLocale();
        $segments = request()->segments();
        $slug = implode('/', array_slice($segments, 1)); // '' для главной
    @endphp

    {{-- CANONICAL: всегда на текущую страницу текущего языка --}}
    <link rel="canonical" href="{{ url($lang . ($slug ? '/' . $slug : '')) }}" />

    {{-- HREFLANG: все языки + x‑default --}}
    @foreach ($locales as $code)
        <link rel="alternate" hreflang="{{ $code }}" href="{{ url($code . ($slug ? '/' . $slug : '')) }}" />
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ url($slug) }}" /> {{-- без префикса языка --}}


    <script src="{{ asset('assets/js/lenis.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
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


    <button id="scrollBtn"
        class="hidden fixed bottom-5 right-8 z-[999] border-0 outline-none bg-white cursor-pointer p-4 rounded-[10px] text-[18px] transition-all duration-300 ease-in-out hover:bg-[#e31e24] group">
        <i class="fa-solid fa-rocket text-[#1a1515] transition-all duration-300 ease-in-out group-hover:text-white"></i>
    </button>

    <div class="crt-overlay" data-bg="../images/oEI9uBYSzLpBK.gif"></div>

</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

<script>
    window.addEventListener('load', () => {
        // Задаём задержку, например, 3 секунды (3000 мс)
        setTimeout(() => {
            const overlay = document.querySelector('.crt-overlay');
            if (overlay) {
                // Получаем путь к изображению из data-атрибута
                const bgUrl = overlay.getAttribute('data-bg');
                if (bgUrl) {
                    // Устанавливаем значение CSS-переменной --bg
                    overlay.style.setProperty('--bg', `url(${bgUrl})`);
                }
            }
        }, 5000);
    });
</script>
