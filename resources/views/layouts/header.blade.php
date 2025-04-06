<div id="mainHeader"
     class="lg:sticky lg:top-0 z-50 transition-all duration-500 px-4 py-2 flex flex-wrap items-center gap-y-4">

    <!-- Лого -->
    <div class="flex items-center gap-2 w-1/2 sm:w-1/3 md:w-1/4 min-w-0">
        <div class="circle-container" id="logoMain">
            <div class="scrolling-image">
                <img src="{{ asset('/assets/images/circled-text.png') }}?v={{ time() }}" alt="Scrolling Image">
            </div>
            <div class="center-image">
                <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Center Image">
            </div>
        </div>
        <!-- Печатающий текст — только на >= lg -->
        <div class="typing-text hidden lg:block min-w-[150px] whitespace-nowrap overflow-hidden text-sm leading-none">
        </div>
    </div>

    <!-- Меню (только десктоп, центрировано) -->
    <div class="hidden md:flex justify-center items-center gap-6 w-full md:w-1/2 lg:w-1/3 z-[999]"
         itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="nav-item">
            <a href="/{{ $lang }}/services" class="{{ Request::is($lang . '/services*') ? 'active' : '' }}"
               itemprop="url">{{ __('translate.services') }}</a>
        </div>
        <div class="nav-item">
            <a href="/{{ $lang }}/about_us" class="{{ Request::is($lang . '/about_us*') ? 'active' : '' }}"
               itemprop="url">{{ __('translate.aboutUs') }}</a>
        </div>
        <div class="nav-item">
            <a href="/{{ $lang }}/portfolio" class="{{ Request::is($lang . '/portfolio*') ? 'active' : '' }}"
               itemprop="url">{{ __('translate.portfolio') }}</a>
        </div>
        <div class="nav-item">
            <a href="/{{ $lang }}/contacts" class="{{ Request::is($lang . '/contacts*') ? 'active' : '' }}"
               itemprop="url">{{ __('translate.contacts') }}</a>
        </div>
    </div>

    <!-- Контакты и язык -->
    <div class="flex justify-end items-center gap-4 w-1/2 sm:w-2/3 md:w-1/4 text-sm sm:text-base md:text-2xl font-bold">
        <a href="tel:+99361648605" class="whitespace-nowrap">+993 61 00 97 92</a>

        <!-- Языки (только десктоп) -->
        <div class="hidden md:flex gap-5">
            @php $langs = ['ru', 'en', 'tm']; @endphp
            <div class="relative group flex items-center">
                <div class="cursor-pointer flex items-center gap-1">
                    <span>{{ strtoupper($lang) }}</span>
                    <i class="fa-solid fa-arrow-down-long text-[#e31e24] text-xl group-hover:rotate-180 transition-transform"></i>
                </div>
                <div
                    class="absolute top-full left-0 mt-2 hidden group-hover:block bg-[#e31e24] text-white rounded px-4 py-2 z-50 shadow">
                    <ul class="text-center">
                        @foreach ($langs as $l)
                            @if ($lang !== $l)
                                <li class="py-1 hover:underline"><a href="/{{ $l }}">{{ strtoupper($l) }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Меню (десктоп) -->
        <div id="menuButton"
             class="hidden md:block w-20 bg-[var(--primary)] text-center hover:rounded-[20%] hover:scale-105 transition duration-300 ease-linear"
             data-bs-toggle="modal" data-bs-target="#complexMenuModal">
            {!! nl2br(__('translate.menu')) !!}
        </div>

        <!-- Мобильное меню (бургер) -->
        <button id="mobileMenuOpen"
                class="block md:hidden w-10 h-10 bg-[#e31e24] text-white rounded-full flex items-center justify-center">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</div>

<!-- Левое меню (десктоп) -->
<div class="leftHeader hidden xl:flex">
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

<!-- Модалка десктопного меню -->
<div class="modal fade modal-no-bg" id="complexMenuModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 9999">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content mobile-none">
            <div class="modal-body flex">
                <div class="block-60 reveal-item" id="reveal-6">
                    <div class="flex mt-3">
                        <div class="flex">
                            <div class="circle-container" id="logoMain">
                                <div class="scrolling-image"><img
                                        src="{{ asset('/assets/images/circled-text.png') }}?v={{ time() }}"
                                        alt="Scrolling Image"></div>
                                <div class="center-image"><img src="{{ asset('/assets/images/ltm-white.png') }}"
                                        alt="Center Image"></div>
                            </div>
                        </div>
                        <div class="flex ml-3 lang-flex my-auto">
                            <a class="menu-a" href="/ru/">Ru</a>
                            <a class="menu-a" href="/en/">En</a>
                            <a class="menu-a" href="/tm/">Tm</a>
                        </div>
                    </div>
                    <div class="big-block-content flex flex-col m-auto w-1/2 space-y-18">
                        <a href="/{{ $lang }}/services">
                            <h3>{{ __('translate.allServ') }} </h3>
                        </a>
                        <a href="tel:+99312753713" class="text-6xl">+993 12 75 37 13</a>
                        <a href="mailto:info@ltm.studio" class="text-6xl">info@ltm.studio</a>
                        <div class="flex media-links">
                            <!-- Временно закомментированы иконки Instagram и LinkedIn
                            <a class="menu-a" href="instagram.com/ltmstudio" id="instLink">In</a>
                            <a class="menu-a" href="linkedin.com/company/ltmstudio" id="linkedLink">Ln</a>
                            -->
                        </div>
                        <a class="opacity-[0.7]" href="/{{ $lang }}/" id="linkAddress">https://ltm.studio/</a>
                    </div>
                </div>
                <div class="block-40">
                    <div class="sub-blocks-60 flex flex-wrap">
                        <div class="block-item-13 text-center reveal-item" id="reveal-4"><span
                                class="main-menu-portfolio-link"><a href="/{{ $lang }}/portfolio"
                                    class="!text-5xl font-bold">{{ __('translate.portfolio') }}</a></span>
                        </div>
                        <div class="big-block-60">
                            <div class="flex pojalusta">
                                <div class="sub-block-50 text-center reveal-item" id="reveal-2"><span
                                        class="main-menu-about-us-link"><a href="/{{ $lang }}/about_us"
                                            class="!text-5xl font-bold">{{ __('translate.aboutUs') }}</a></span>
                                </div>
                                <div class="sub-block-50 text-center reveal-item" id="reveal-1">
                                    <div class="button-close" id="closeDesktopModal"><i class="fa fa-close"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="sub-block-item-60-100 reveal-item" id="reveal-3"><span
                                    class="main-contacts-link"><a href="/{{ $lang }}/contacts"
                                        class="!text-5xl font-bold">{{ __('translate.contacts') }}</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="block-item-40 text-center reveal-item" id="reveal-5"><span class="main-offer-link "
                            id="openFromMenu"><a class="!text-5xl font-bold">{{ __('translate.sugProject') }}</a></span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mobileMenuModal"
    class="fixed inset-0 bg-[#1c1b1b] text-white z-[999999] p-6 flex flex-col translate-y-full transition-transform duration-500 ease-in-out md:hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Только для самых смелых</h2>
        <button id="mobileMenuClose"><i class="fa fa-close text-3xl"></i></button>
    </div>

    <a href="tel:+99361009792" class="text-lg mb-4 font-semibold flex items-center">
        <i class="fa fa-phone mr-2"></i> +993 61 00 97 92
    </a>

    <div class="flex gap-4 mb-6">
        <!-- Временно закомментированы иконки Instagram и LinkedIn
        <a href="https://www.instagram.com/ltmstudio_dev"><i class="fa-brands fa-instagram text-3xl"></i></a>
        <a href="https://www.linkedin.com/company/104843040"><i class="fa-brands fa-linkedin text-3xl"></i></a>
        -->
    </div>

    <nav class="flex flex-col gap-4 text-xl font-semibold mb-6">
        <a href="/{{ $lang }}/">{{ __('translate.mainPage') }}</a>
        <a href="/{{ $lang }}/services">{{ __('translate.services') }}</a>
        <a href="/{{ $lang }}/about_us">{{ __('translate.aboutUs') }}</a>
        <a href="/{{ $lang }}/portfolio">{{ __('translate.portfolio') }}</a>
        <a href="/{{ $lang }}/contacts">{{ __('translate.contacts') }}</a>
    </nav>

    <div class="flex gap-4 mb-6 text-lg font-semibold">
        <a href="/ru">RU</a>
        <a href="/en">EN</a>
        <a href="/tm">TM</a>
    </div>

    <div class="mb-6">
        <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="Logo" class="w-20 mx-auto">
    </div>

    <button class="w-full py-4 bg-[#e31e24] rounded flex items-center justify-center gap-3 text-xl">
        <img src="{{ asset('/assets/images/doveLightRed.png') }}" class="w-6" alt="Dove">
        {{ __('translate.sugProject') }}
    </button>
</div>

<!-- JS -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const openBtn = document.getElementById("mobileMenuOpen");
        const closeBtn = document.getElementById("mobileMenuClose");
        const modal = document.getElementById("mobileMenuModal");

        if (openBtn && closeBtn && modal) {
            openBtn.addEventListener("click", () => {
                modal.classList.remove("translate-y-full");
            });

            closeBtn.addEventListener("click", () => {
                modal.classList.add("translate-y-full");
            });
        }
    });
</script>
