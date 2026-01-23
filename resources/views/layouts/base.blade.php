<!DOCTYPE html>
<html lang="{{ $lang ?? app()->getLocale() }}">

<head itemscope itemtype="http://schema.org/WPHeader">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    
    @php
    // Все поддерживаемые локали
    $locales = ['ru', 'en', 'tm'];
    $lang = $lang ?? app()->getLocale();
    $segments = request()->segments();
    $slug = implode('/', array_slice($segments, 1)); // '' для главной

    // Получаем мета-данные
    $title = trim($__env->yieldContent('title', ''));
    $ogTitle = trim($__env->yieldContent('ogTitle', $title));
    $metaDesc = trim($__env->yieldContent('metaDesc', ''));
    $baseKeywords = trim($__env->yieldContent('metaKey', ''));

    // Добавляем название города к keywords в зависимости от языка
    $cityNames = ['ru' => 'Ашхабад', 'en' => 'Ashgabat', 'tm' => 'Aşgabat'];
    $cityName = $cityNames[$lang] ?? 'Ашхабад';
    $metaKey = $baseKeywords ? $baseKeywords . ', ' . $cityName : $cityName;

    // Динамическое изображение для Open Graph
    $ogImage = $__env->yieldContent('ogImage', config('app.url') . '/assets/images/ltm.png');
    $ogImageWidth = $__env->yieldContent('ogImageWidth', '1200');
    $ogImageHeight = $__env->yieldContent('ogImageHeight', '630');

    // URL текущей страницы
    $currentUrl = url($lang . ($slug ? '/' . $slug : ''));

    // Таблица соответствия для Open Graph
    $ogLocales = ['ru' => 'ru_RU', 'en' => 'en_US', 'tm' => 'tk_TM'];
    $ogLocale = $ogLocales[$lang] ?? 'ru_RU';

    // Тип контента для Open Graph
    $ogType = $__env->yieldContent('ogType', 'website');
@endphp
    {{-- Основные мета-теги --}}
    <title itemprop="headline">{{ $title ?: 'Lebizli Tehnologiya Merkezi (LTM)' }}</title>
    <meta name="description" content="{{ $metaDesc }}">
    <meta name="keywords" content="{{ $metaKey }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="Lebizli Tehnologiya Merkezi (LTM)">
    <meta name="publisher" content="Lebizli Tehnologiya Merkezi (LTM)">
    <meta name="theme-color" content="#e31e24">
    <meta name='freelancehunt' content='c02792cc8b8b525'>

    {{-- Open Graph мета-теги --}}
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:title" content="{{ $ogTitle ?: $title }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:secure_url" content="{{ $ogImage }}">
    <meta property="og:image:width" content="{{ $ogImageWidth }}">
    <meta property="og:image:height" content="{{ $ogImageHeight }}">
    <meta property="og:image:alt" content="{{ $ogTitle ?: $title }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:site_name" content="Lebizli Tehnologiya Merkezi (LTM)">
    <meta property="og:locale" content="{{ $ogLocale }}">
    <meta property="article:author" content="Lebizli Tehnologiya Merkezi (LTM)">
    <meta property="article:publisher" content="{{ config('app.url') }}">
    
    {{-- Альтернативные локали для Open Graph --}}
    @foreach ($locales as $code)
        @if($code !== $lang)
            <meta property="og:locale:alternate" content="{{ $ogLocales[$code] ?? 'ru_RU' }}">
        @endif
    @endforeach

    {{-- Twitter Card мета-теги --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ltm_studio">
    <meta name="twitter:creator" content="@ltm_studio">
    <meta name="twitter:title" content="{{ $ogTitle ?: $title }}">
    <meta name="twitter:description" content="{{ $metaDesc }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="twitter:image:alt" content="{{ $ogTitle ?: $title }}">

    {{-- Schema.org микроразметка --}}
    <meta itemprop="name" content="{{ $title }}">
    <meta itemprop="description" content="{{ $metaDesc }}">
    <meta itemprop="image" content="{{ $ogImage }}">

    {{-- Canonical и HREFLANG --}}
    <link rel="canonical" href="{{ $currentUrl }}" />
    @foreach ($locales as $code)
        <link rel="alternate" hreflang="{{ $code }}" href="{{ url($code . ($slug ? '/' . $slug : '')) }}" />
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ url($slug) }}" />

    {{-- Favicon и иконки --}}
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="LTM" />
    <link rel="manifest" href="/site.webmanifest" />

    {{-- JSON-LD структурированные данные (базовые) --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Lebizli Tehnologiya Merkezi (LTM)",
        "alternateName": "LTM",
        "url": "{{ config('app.url') }}",
        "logo": "{{ config('app.url') }}/assets/images/ltm.png",
        "description": "{{ $metaDesc ?: 'IT-компания в Туркменистане, предлагающая современные решения в области разработки сайтов, мобильных приложений и внедрения платформы Битрикс24' }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "2127 ул. (Г. Кулиева), здание \"Gökje\" 26A",
            "addressLocality": "Ашхабад",
            "addressCountry": "TM"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+993-12-75-37-13",
            "contactType": "customer service",
            "email": "info@ltm.studio",
            "availableLanguage": ["ru", "en", "tm"]
        },
        "sameAs": [
            "http://linkedin.com/company/ltm-studio",
            "https://www.instagram.com/lebizli_tehnologiya_merkezi"
        ]
    }
    </script>
    
    {{-- Дополнительные структурированные данные от страниц --}}
    @stack('structured-data')
    {{-- Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5TMJMPE0M9"></script>
    <script>
        var texts = @json(trans('translate.texts'));
    </script>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2691604134363075');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=2691604134363075&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <script src="{{ asset('assets/js/lenis.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

   <script>
(function(w,d,u){
    try {
        var s=d.createElement('script');
        s.async=true;
        s.src=u+'?'+(Date.now()/60000|0);
        s.onerror=function(){
            console.error('Bitrix24 tracker failed to load');
        };
        var h=d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s,h);
    } catch(e) {
        console.error('Bitrix24 tracker error:', e);
    }
})(window,document,'https://cdn-ru.bitrix24.ru/b31120708/crm/tag/call.tracker.js');
</script>

</head>

<body>
    <div class="loaders position-fixed w-100 h-100 justify-content-center align-items-center"
        style="background-color: #1c1b1b; z-index: 999999; display: flex;">
        <div class="circle-container" style="top: 0%; left:0%; width:70rem; height: 70rem ">
            <div class="scrolling-image" style="width:20rem; height:auto">
                <img src="{{ asset('/assets/images/circled-text.png') }}" alt="Scrolling decorative text image">
            </div>
            <div class="center-image" style="width:10%; height:auto">
                <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Center LTM logo">
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
        // Инициализируем Lenis
        window.lenis = new Lenis({
            duration: 1.5, // больше = более тягучий скролл
            easing: t => 1 - Math.pow(1 - t, 4), // кинематографичный, лёгкий на старте, тяжёлый в конце
            smooth: true,
            smoothTouch: false, // оставляем нативный скролл на телефонах
            direction: 'vertical', // можно сделать horizontal scroll, если нужно
        });

        function raf(time) {
            window.lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);

        // Создаем событие после инициализации Lenis для других скриптов
        document.addEventListener('DOMContentLoaded', () => {
            // Небольшая задержка для полной инициализации
            requestAnimationFrame(() => {
                window.dispatchEvent(new CustomEvent('lenis:ready'));
            });
        });
    </script>


    <button id="scrollBtn"
        class="hidden fixed bottom-5 right-8 z-[999] border-0 outline-none bg-white cursor-pointer p-4 rounded-[10px] text-[18px] transition-all duration-300 ease-in-out hover:bg-[#e31e24] group">
        <i class="fa-solid fa-rocket text-[#1a1515] transition-all duration-300 ease-in-out group-hover:text-white"></i>
    </button>

    <div class="crt-overlay" data-bg="{{ asset('assets/images/oEI9uBYSzLpBK.gif') }}"></div>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

   <script>
    (function(w, d, u) {
          var s = d.createElement('script');
          s.async = true;
          s.src = u + '?' + (Date.now() / 60000 | 0);
          var h = d.getElementsByTagName('script')[0];
          h.parentNode.insertBefore(s, h);
      })(window, document, 'https://cdn-ru.bitrix24.ru/b31120708/crm/site_button/loader_1_11qky3.js');
   </script>

</body>

</html>
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
<style>
    .b24-widget-button-position-bottom-right {
        bottom: 70px !important;
        right: 0 !important;
    }
</style>
