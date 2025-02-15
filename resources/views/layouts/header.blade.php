<div class="header-sticky-top">
    {{-- <div class="header-fixed position-fixed"> --}}
    <div class="header-fixed">
        <div class="container-fluid mt-0 row">
            <div class="rotating-logo d-flex col-4">
                <div class="circle-container" id="logoMain">
                    <div class="scrolling-image">
                        <img src="{{ asset('/assets/images/circled-text.png') }}?v={{ time() }}"
                            alt="Scrolling Image">
                    </div>
                    <div class="center-image">
                        <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Center Image">
                    </div>
                </div>
                <div class="typing-text"></div>

            </div>
            <div class="header-nav col-4" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <div class="nav-item"> <a href="/{{ $lang }}/services" itemprop="url">
                        {{ __('translate.services') }} </a>
                    <div class="serv-dropdown-menu">
                        <div>
                            <a class="no-line" href="/{{ $lang }}/services-bitrix">{{ __('translate.bitrix') }}</a>
                        </div>
                        <div>
                            <a class="no-line" href="/{{ $lang }}/services-bcloud">{{ __('translate.bcloud') }}</a>
                        </div>
                        {{-- <div>
                            <a class="no-line" href="/{{ $lang }}/services-webpages">{{ __('translate.web_nav') }}</a>
                        </div> --}}
                        {{-- <div>
                            <a class="no-line" href="/{{ $lang }}/services-apps">{{ __('translate.mobile_nav') }}</a>
                        </div> --}}
                    </div>
                </div>
                <div class="nav-item"> <a href="/{{ $lang }}/about_us" itemprop="url">
                        {{ __('translate.aboutUs') }} </a> </div>
                <div class="nav-item"> <a href="/{{ $lang }}/portfolio" itemprop="url">
                        {{ __('translate.portfolio') }} </a> </div>
                {{-- <div class="nav-item"> <a href="/{{ $lang }}/blog">
                        {{ __('translate.blog') }}
                    </a> </div> --}}
                <div class="nav-item"> <a href="/{{ $lang }}/contacts" itemprop="url">
                        {{ __('translate.contacts') }}
                    </a> </div>
            </div>
            <div class="contact-info col-md-4 col-8">
                <span><a href="tel:+99361648605" class="no-line">+993 61 00 97 92</a></span>
                <a href="https://www.linkedin.com/company/104843040" class="no-line"><i id="linkedIn"
                        class="fa-brands fa-linkedin"
                        style="color: #ffffff; font-size: 3.6rem; text-align: center;"></i></a>
                <a href="https://www.instagram.com/ltmstudio_dev" class="no-line"><i id="instagram"
                        class="fa-brands fa-instagram"
                        style="color: #ffffff; font-size: 3.6rem; text-align: center;"></i></a>
                <div class="lang">
                    @php
                        $langs = ['ru', 'en', 'tm'];
                        $url = explode('/', $_SERVER['REQUEST_URI']);
                    @endphp
                    <div class="language">
                        <a>
                            <span>{{ $lang }}</span>
                            <i class="fa-solid fa-arrow-down-long" style="color: #e31e24; font-size: 2rem;"></i>
                        </a>
                    </div>
                    <ul class="langList">
                        @php
                            foreach ($langs as $l) {
                                if ($lang != $l) {
                                    $tt = "<li> <a href=\"/${l}/";
                                    if (isset($url[2])) {
                                        $tt .= $url[2];
                                    }
                                    if (isset($url[3])) {
                                        $tt .= '/' . $url[3];
                                    }
                                    $tt .= "\" class=\"\">${l}</a></li>";
                                    echo $tt;
                                }
                            }
                        @endphp
                    </ul>
                </div>
                <div id="menuButton" class="menu-button" data-bs-toggle="modal" data-bs-target="#complexMenuModal"
                    style="">
                    {{-- <img src="{{ asset('/assets/images/menu.png') }}" alt="menu_button" /> --}}
                    {!! nl2br(__('translate.menu')) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="leftHeader">
    <div class="rowLeftHeader">
        <div class="followed-element">
            <a href="/{{ $lang }}/portfolio">
                <p class="portfolio">{{ __('translate.portfolio') }}</p>
            </a>
        </div>
    </div>
    @if ($leftMenu)
        <div class="rowLeftHeader">
            <a href="/{{ $lang }}/">
                <p>{{ __('translate.mainPage') }}</p>
            </a>
            {{-- <p style="margin:2.4rem">{{ $currentPage }}</p> --}}
        </div>
    @endif
</div>
<div class="modal fade modal-no-bg" id="complexMenuModal" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content mobile-none">
            <div class="modal-body d-flex">
                <div class="block-60 reveal-item" id="reveal-6">
                    <div class="d-flex mt-3">
                        <div class="rotating-logo d-flex ">
                            <div class="circle-container" id="logoMain">
                                <div class="scrolling-image">
                                    <img src="{{ asset('/assets/images/circled-text.png') }}?v={{ time() }}"
                                        alt="Scrolling Image">
                                </div>
                                <div class="center-image">
                                    <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Center Image">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex ml-3 lang-flex my-auto">
                            <a class="menu-a no-line" href="/ru/">Ru</a>
                            <a class="menu-a no-line" href="/en/">En</a>
                            <a class="menu-a no-line" href="/tm/">Tm</a>
                        </div>
                    </div>
                    <div class="big-block-content d-flex flex-column m-auto w-50">
                        <a class="all-services-p no-line"
                            href="/{{ $lang }}/services">{{ __('translate.allServ') }}</a>
                        <a class="phone-number-p no-line">+993 12 75 37 13</a>
                        <a class="email-p no-line">info@ltm.studio</a>
                        <div class="d-flex my-auto media-links">
                            <a class="menu-a no-line" href="instagram.com/ltmstudio" id="instLink">In</a>
                            <a class="menu-a no-line" href="linkedin.com/company/ltmstudio" id="linkedLink">Ln</a>
                            {{-- <a class="menu-a no-line" href="/{{ $lang }}/blog" id="blogLink">{{
                                __('translate.blog') }}</a> --}}
                        </div>
                        <a class="temp-a no-line" href="/{{ $lang }}/blog"
                            id="linkAddress">https://ltm.studio/</a>
                    </div>
                </div>
                <div class="block-40">
                    <div class="sub-blocks-60 d-flex flex-wrap">
                        <div class="block-item-13 text-center reveal-item" id="reveal-4"><span
                                class="main-menu-portfolio-link"><a class="no-line "
                                    href="/{{ $lang }}/portfolio">{{ __('translate.portfolio') }}</a></span>
                        </div>
                        <div class="big-block-60">
                            <div class="d-flex pojalusta">
                                <div class="sub-block-50 text-center reveal-item" id="reveal-2"><span
                                        class="main-menu-about-us-link"><a class="no-line"
                                            href="/{{ $lang }}/about_us">{{ __('translate.aboutUs') }}</a></span>
                                </div>
                                <div class="sub-block-50 text-center reveal-item" id="reveal-1">
                                    <div class="button-close" id="closeDesktopModal"><i class="fa fa-close"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-block-item-60-100 reveal-item" id="reveal-3"><span
                                    class="main-contacts-link"><a class="no-line"
                                        href="/{{ $lang }}/contacts">{{ __('translate.contacts') }}</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="block-item-40 text-center reveal-item" id="reveal-5"><span class="main-offer-link"
                            id="openFromMenu"><a class="no-line">{{ __('translate.sugProject') }}</a></span></div>
                </div>
            </div>
        </div>
        <div class="modal-content  desktop-none">
            <div class="modal-body mobile-menu-body ">
                <div class="d-flex mt-3 justify-content-between">
                    <div class="rotating-logo d-flex ">
                        <div class="circle-container" id="logoMain">
                            <div class="scrolling-image">
                                <img src="{{ asset('/assets/images/circled-text.png') }}?v={{ time() }}"
                                    alt="Scrolling Image">
                            </div>
                            <div class="center-image">
                                <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Center Image">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex ml-3 lang-flex my-auto">
                        <div class="d-flex my-auto">
                            <a class="menu-a no-line" href="/ru">Ru</a>
                            <a class="menu-a no-line" href="/en">En</a>
                            <a class="menu-a no-line" href="/tm">Tm</a>
                        </div>
                        <div class="button-close" id="closeMobileModal"><i class="fa fa-close"
                                style="font-size:18px"></i></div>
                    </div>
                </div>
                <p class="mobile-menu-p text-center mt-5 w-50 m-auto">{{ __('translate.mobileMenuTitle') }}</p>
                <p class="phone-mobile-menu-p text-center mt-5 mb-5">+993 12 75 37 13</p>
                <div class="d-flex align-items-center justify-content-center" style="margin-bottom:30px">
                    <i class="fa fa-envelope" style=" font-size: 5rem;text-align: center; margin-right:10px"></i>
                    <i class="fa-brands fa-linkedin" style=" font-size: 5rem; text-align: center;margin-right:10px"
                        id="linkedMobile"></i>
                    <i class="fa-brands fa-instagram" style=" font-size: 5rem; text-align: center;margin-right:10px"
                        id="instMobile"></i>
                </div>
                <div
                    class="mobile-menu-urls flex-column align-items-center justify-content-center w-50 text-center m-auto">
                    <p class="no-line mobile-menu-url" id="mainMobileMenuLink">{{ __('translate.mainPage') }}</p>
                    <p class="no-line mobile-menu-url" id="aboutUsMobileMenuLink">{{ __('translate.aboutUs') }}</p>
                    <p class="no-line mobile-menu-url" id="servicesMobileMenuLink">{{ __('translate.services') }}</p>
                    <p class="no-line mobile-menu-url" id="portfolioMobileMenuLink">{{ __('translate.portfolio') }}
                    </p>
                    <a href="/{{ $lang }}/contacts"
                        class="no-line mobile-menu-url">{{ __('translate.contacts') }}</a>
                </div>
                <div class="request-sign text-center">
                    <p class="request-sign-p" id="requestSign">{{ __('translate.leftRequest') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //     $(document).ready(function() {
    //     var path = window.location.pathname;
    // console.log(path);
    //     $('.nav-item a').each(function() {
    //         var href = $(this).attr('href');

    //         if (path === href) {
    //             $(this).addClass('active');
    //         }
    //     });
    // });

    // $(document).ready(function() {
    //     var currentPage = "{{ $currentPage }}";

    //     $('.header-nav a').each(function() {
    //         var text = $(this).text().trim();

    //         if (currentPage === text) {
    //             $(this).addClass('active');
    //         }
    //     });
    // });
    document.addEventListener('DOMContentLoaded', function() {

        const logo = document.getElementById('logoMain');
        const linkedin = document.getElementById('linkedIn');
        const linkedMiobile = document.getElementById('linkedMobile');
        const instMobile = document.getElementById('instMobile');
        const instagram = document.getElementById('instagram');
        const mainMobileMenuLink = document.getElementById('mainMobileMenuLink');
        const aboutUsMobileMenuLink = document.getElementById('aboutUsMobileMenuLink');
        const servicesMobileMenuLink = document.getElementById('servicesMobileMenuLink');
        const portfolioMobileMenuLink = document.getElementById('portfolioMobileMenuLink');
        const contactsMobileMenuLink = document.getElementById('contactsMobileMenuLink');
        logo.addEventListener('click', function() {
            window.location.href = '/{{ $lang }}';
        });
        linkedin.addEventListener('click', function() {
            window.location.href = 'https://www.linkedin.com/company/ltmstudio/';
        });
        linkedMobile.addEventListener('click', function() {
            window.location.href = 'https://www.linkedin.com/company/ltmstudio/';
        });
        instagram.addEventListener('click', function() {
            window.location.href = 'https://www.instagram.com/ltmstudio';
        });
        instMobile.addEventListener('click', function() {
            window.location.href = 'https://www.instagram.com/ltmstudio';
        });
        mainMobileMenuLink.addEventListener('click', function() {
            window.location.href = '/{{ $lang }}';
        });
        aboutUsMobileMenuLink.addEventListener('click', function() {
            window.location.href = '/{{ $lang }}/about_us';
        });
        servicesMobileMenuLink.addEventListener('click', function() {
            window.location.href = '/{{ $lang }}/services';
        });
        portfolioMobileMenuLink.addEventListener('click', function() {
            window.location.href = '/{{ $lang }}/portfolio';
        });
        contactsMobileMenuLink.addEventListener('click', function() {
            window.location.href = '/{{ $lang }}/contacts';
            console.log('clicked');

        });
        const element = document.querySelector('.followed-element');

        element.addEventListener('mouseenter', () => {
            element.style.transform = 'scale(1.1)'; // Увеличиваем элемент при наведении
        });

        element.addEventListener('mouseleave', () => {
            element.style.transform =
                'scale(1)'; // Возвращаем элемент в исходное состояние при уходе курсора
        });

        element.addEventListener('mousemove', (event) => {
            // Получаем координаты курсора относительно элемента
            const x = event.offsetX;
            const y = event.offsetY;

            // Выполняем перемещение элемента на основе координат курсора
            element.style.transform = `translate(${x}px, ${y}px) scale(1.1)`;
        });
        if (window.innerWidth < 991) { // Проверяем ширину экрана (примерное значение для мобильных устройств)
            var windowHeight = window.innerHeight;
            document.getElementById('mobile-menu-body').style.height = windowHeight + 'px';
        }
    });
</script>
