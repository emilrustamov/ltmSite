<div>
    <div class="flex flex-wrap px-5">
        <div class="w-full md:w-1/3 flex rotating-logo">
            <div class="circle-container" id="logoMain">
                <div class="scrolling-image">
                    <img src="{{ asset('/assets/images/circled-text.png') }}?v={{ time() }}" alt="Scrolling Image">
                </div>
                <div class="center-image">
                    <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Center Image">
                </div>
            </div>
            <div class="typing-text"></div>
        </div>
        <div class="w-full md:w-1/3 flex justify-between items-center z-[999] gap-5" itemscope
            itemtype="http://schema.org/SiteNavigationElement">
            <div class="nav-item">
                <a href="/{{ $lang }}/services" class="{{ Request::is($lang . '/services*') ? 'active' : '' }}"
                    itemprop="url">
                    {{ __('translate.services') }}
                </a>
            </div>
            <div class="nav-item">
                <a href="/{{ $lang }}/about_us" class="{{ Request::is($lang . '/about_us*') ? 'active' : '' }}"
                    itemprop="url">
                    {{ __('translate.aboutUs') }}
                </a>
            </div>
            <div class="nav-item">
                <a href="/{{ $lang }}/portfolio" class="{{ Request::is($lang . '/portfolio*') ? 'active' : '' }}"
                    itemprop="url">
                    {{ __('translate.portfolio') }}
                </a>
            </div>
            <div class="nav-item">
                <a href="/{{ $lang }}/contacts" class="{{ Request::is($lang . '/contacts*') ? 'active' : '' }}"
                    itemprop="url">
                    {{ __('translate.contacts') }}
                </a>
            </div>

        </div>
        <div class="w-2/3 md:w-1/3 flex justify-end items-center z-[9999] gap-5 text-4xl font-bold">
            <a href="tel:+99361648605">+993 61 00 97 92</a>
            <a href="https://www.linkedin.com/company/104843040" class="">
                <i id="linkedIn" class="fa-brands fa-linkedin"
                    style="color: #ffffff; font-size: 3.6rem; text-align: center;"></i>
            </a>
            <a href="https://www.instagram.com/ltmstudio_dev" class="">
                <i id="instagram" class="fa-brands fa-instagram"
                    style="color: #ffffff; font-size: 3.6rem; text-align: center;"></i>
            </a>
            <div class="relative group flex items-center">
                @php
                    $langs = ['ru', 'en', 'tm'];
                    $url = explode('/', $_SERVER['REQUEST_URI']);
                @endphp
            
                {{-- Оборачиваем и язык, и список в один блок --}}
                <div class="cursor-pointer flex items-center gap-2 relative group">
                    <div class="language flex items-center gap-1">
                        <span>{{ strtoupper($lang) }}</span>
                        <i class="fa-solid fa-arrow-down-long text-[#e31e24] text-2xl transition-transform duration-300 group-hover:rotate-180"></i>
                    </div>
                    <div class="absolute top-full left-0 mt-2">
                        <ul class="hidden group-hover:flex flex-col bg-[#e31e24] text-white rounded px-4 py-2 z-50 shadow min-w-[80px] text-center">
                            @foreach ($langs as $l)
                                @if ($lang !== $l)
                                    <li class="py-1 hover:underline">
                                        <a href="/{{ $l }}">{{ strtoupper($l) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            
            
            <div id="menuButton"
                class="w-24 transition duration-300 ease-linear bg-[var(--primary)] text-center hover:rounded-[20%] hover:scale-105"
                data-bs-toggle="modal" data-bs-target="#complexMenuModal">
                {!! nl2br(__('translate.menu')) !!}
            </div>
        </div>
    </div>
</div>
<div class="leftHeader hidden md:block">
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
        </div>
    @endif
</div>
<div class="modal fade modal-no-bg" id="complexMenuModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 9999">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content mobile-none">
            <div class="modal-body flex">
                <div class="block-60 reveal-item" id="reveal-6">
                    <div class="flex mt-3">
                        <div class="flex rotating-logo">
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
                        <div class="flex ml-3 lang-flex my-auto">
                            <a class="menu-a" href="/ru/">Ru</a>
                            <a class="menu-a" href="/en/">En</a>
                            <a class="menu-a" href="/tm/">Tm</a>
                        </div>
                    </div>
                    <div class="big-block-content flex flex-col m-auto w-1/2">
                        <a class="all-services-p"
                            href="/{{ $lang }}/services">{{ __('translate.allServ') }}</a>
                        <a href="tel:+99312753713" class="text-6xl mb-[80px]">+993 12 75 37 13</a>
                        <a href="mailto:info@ltm.studio" class="text-6xl mb-[80px]">info@ltm.studio</a>
                        <div class="flex my-auto media-links">
                            <a class="menu-a" href="instagram.com/ltmstudio" id="instLink">In</a>
                            <a class="menu-a" href="linkedin.com/company/ltmstudio" id="linkedLink">Ln</a>
                        </div>
                        <a class="temp-a" href="/{{ $lang }}/blog" id="linkAddress">https://ltm.studio/</a>
                    </div>
                </div>
                <div class="block-40">
                    <div class="sub-blocks-60 flex flex-wrap">
                        <div class="block-item-13 text-center reveal-item" id="reveal-4">
                            <span class="main-menu-portfolio-link">
                                <a href="/{{ $lang }}/portfolio">{{ __('translate.portfolio') }}</a>
                            </span>
                        </div>
                        <div class="big-block-60">
                            <div class="flex pojalusta">
                                <div class="sub-block-50 text-center reveal-item" id="reveal-2">
                                    <span class="main-menu-about-us-link">
                                        <a href="/{{ $lang }}/about_us">{{ __('translate.aboutUs') }}</a>
                                    </span>
                                </div>
                                <div class="sub-block-50 text-center reveal-item" id="reveal-1">
                                    <div class="button-close" id="closeDesktopModal">
                                        <i class="fa fa-close"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-block-item-60-100 reveal-item" id="reveal-3">
                                <span class="main-contacts-link">
                                    <a href="/{{ $lang }}/contacts">{{ __('translate.contacts') }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="block-item-40 text-center reveal-item" id="reveal-5">
                        <span class="main-offer-link" id="openFromMenu">
                            <a>{{ __('translate.sugProject') }}</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-content desktop-none">
            <div class="modal-body mobile-menu-body">
                <div class="flex mt-3 justify-between">
                    <div class="flex rotating-logo">
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
                    <div class="flex ml-3 lang-flex my-auto">
                        <div class="flex my-auto">
                            <a class="menu-a" href="/ru">Ru</a>
                            <a class="menu-a" href="/en">En</a>
                            <a class="menu-a" href="/tm">Tm</a>
                        </div>
                        <div class="button-close" id="closeMobileModal">
                            <i class="fa fa-close text-[18px]"></i>
                        </div>
                    </div>
                </div>
                <p class="mobile-menu-p text-center mt-5 w-1/2 m-auto">{{ __('translate.mobileMenuTitle') }}</p>
                <p class="phone-mobile-menu-p text-center mt-5 mb-5">+993 12 75 37 13</p>
                <div class="flex items-center justify-center mb-7" style="margin-bottom:30px">
                    <i class="fa fa-envelope text-[5rem] text-center mr-[10px]"></i>
                    <i class="fa-brands fa-linkedin text-[5rem] text-center mr-[10px]" id="linkedMobile"></i>
                    <i class="fa-brands fa-instagram text-[5rem] text-center mr-[10px]" id="instMobile"></i>
                </div>
                <div class="flex flex-col items-center justify-center w-1/2 text-center m-auto">
                    <p class="mobile-menu-url" id="mainMobileMenuLink">{{ __('translate.mainPage') }}</p>
                    <p class="mobile-menu-url" id="aboutUsMobileMenuLink">{{ __('translate.aboutUs') }}</p>
                    <p class="mobile-menu-url" id="servicesMobileMenuLink">{{ __('translate.services') }}</p>
                    <p class="mobile-menu-url" id="portfolioMobileMenuLink">{{ __('translate.portfolio') }}</p>
                    <a id="contactsMobileMenuLink" href="/{{ $lang }}/contacts"
                        class="mobile-menu-url">{{ __('translate.contacts') }}</a>
                </div>
                <div class="request-sign text-center">
                    <p class="request-sign-p" id="requestSign">{{ __('translate.leftRequest') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
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

        linkedMiobile.addEventListener('click', function() {
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
        });

        const element = document.querySelector('.followed-element');
        element.addEventListener('mouseenter', () => {
            element.style.transform = 'scale(1.1)';
        });
        element.addEventListener('mouseleave', () => {
            element.style.transform = 'scale(1)';
        });
        element.addEventListener('mousemove', (event) => {
            const x = event.offsetX;
            const y = event.offsetY;
            element.style.transform = `translate(${x}px, ${y}px) scale(1.1)`;
        });
        if (window.innerWidth < 991) {
            var windowHeight = window.innerHeight;
            document.getElementById('mobile-menu-body').style.height = windowHeight + 'px';
        }
    });
</script> --}}
