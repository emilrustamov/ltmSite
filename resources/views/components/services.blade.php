<div class="bg-[#1c1b1b] section">
    <div class="container mx-auto">
        <h3 class="text-[#e31e24]">{{ __('translate.myRazbirayemsya') }}</h3>
        <div class="swiper mySwiper">
           
            <div class="swiper-wrapper !h-[520px] py-16">
                <div class="swiper-slide  max-w-[400px] h-[560px] p-6 rounded-xl shadow-lg bg-[#350000] flex flex-col fade-in"
                    itemscope itemtype="http://schema.org/Service">
                    <svg class="w-10 h-10 mb-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" />
                        <path d="M3 8h18" />
                    </svg>
                    <h3 class="text-6xl font-bold mb-4" itemprop="name">{{ __('translate.servTitle1') }}</h3>
                    <p class="text-3xl flex-grow mb-4" itemprop="description">
                        {{ __('translate.servDesc1') }}
                    </p>
                    <a href="/{{ $lang }}/portfolio"
                        class="inline-block !px-10 !py-6 bg-[#bc2c2c] hover:bg-[#e31e24] rounded font-bold text-white text-2xl">
                        {{ __('translate.readMore') }}
                    </a>
                </div>

                <div class="swiper-slide  max-w-[400px] h-[560px] p-6 rounded-xl shadow-lg bg-[#bc2c2c] flex flex-col fade-in"
                    itemscope itemtype="http://schema.org/Service">
                    <svg class="w-10 h-10 mb-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <rect x="7" y="2" width="10" height="20" rx="2" />
                        <path d="M11 18h2" />
                    </svg>
                    <h3 class="text-6xl font-bold mb-4" itemprop="name">{{ __('translate.servTitle2') }}</h3>
                    <p class="text-3xl flex-grow mb-4" itemprop="description">
                        {{ __('translate.servDesc2') }}
                    </p>
                    <a href="/{{ $lang }}/services-mobileapps"
                        class="inline-block !px-10 !py-6 bg-[#350000] hover:bg-[#e31e24] rounded font-bold text-white text-2xl">
                        {{ __('translate.readMore') }}
                    </a>
                </div>

                <div class="swiper-slide  max-w-[400px] h-[560px] p-6 rounded-xl shadow-lg bg-[#e31e24] flex flex-col fade-in"
                    itemscope itemtype="http://schema.org/Service">
                    <svg class="w-10 h-10 mb-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1" />
                        <circle cx="20" cy="21" r="1" />
                        <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6" />
                    </svg>
                    <h3 class="text-6xl font-bold mb-4" itemprop="name">{{ __('translate.servTitle3') }}</h3>
                    <p class="text-3xl flex-grow mb-4" itemprop="description">
                        {{ __('translate.servDesc3') }}
                    </p>
                    <a href="/{{ $lang }}/services-ecommerce"
                        class="inline-block !px-10 !py-6 bg-[#350000] hover:bg-[#bc2c2c] rounded font-bold text-white text-2xl">
                        {{ __('translate.readMore') }}
                    </a>
                </div>

                <div class="swiper-slide  max-w-[400px] h-[560px] p-6 rounded-xl shadow-lg bg-[#2b2a2a] flex flex-col fade-in"
                    itemscope itemtype="http://schema.org/Service">
                    <svg class="w-10 h-10 mb-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M18 13V8a4 4 0 10-8 0v5" />
                        <path d="M6 17h12" />
                        <circle cx="6" cy="17" r="2" />
                        <circle cx="18" cy="17" r="2" />
                    </svg>
                    <h3 class="text-6xl font-bold mb-4" itemprop="name">{{ __('translate.servTitle4') }}</h3>
                    <p class="text-3xl flex-grow mb-4" itemprop="description">
                        {{ __('translate.servDesc4') }}
                    </p>
                    <a href="/{{ $lang }}/services-bitrix"
                        class="inline-block !px-10 !py-6 bg-[#bc2c2c] hover:bg-[#e31e24] rounded font-bold text-white text-2xl">
                        {{ __('translate.readMore') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="flex justify-start w-fit gap-4 md:mt-20 z-99">
            <a href="/{{ $lang }}/services"
                class="inline-flex items-center justify-center py-[10px] px-[20px] rounded text-white text-center m-auto bg-[#bc2c2c] hover:bg-[#340000]">
                <p class="!m-0">{{ __('translate.allServ') }}</p>
            </a>
            <a href="/{{ $lang }}/about_us"
                class="inline-flex items-center justify-center py-[10px] px-[20px] rounded text-white text-center m-auto bg-[#340000] hover:bg-[#bc2c2c]">
                <p class="!m-0">{{ __('translate.aboutUs') }}</p>
            </a>
        </div>
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}
<script>
  let swiperInstance = null;

function initSwiper() {
    const isMobile = window.innerWidth < 768;

    if (swiperInstance) swiperInstance.destroy(true, true);

    swiperInstance = new Swiper(".mySwiper", {
        grabCursor: true,
        slidesPerView: "auto",
        centeredSlides: isMobile,
        spaceBetween: isMobile ? 20 : 0,
        loop: true,
        speed: 800,
        slideToClickedSlide: true,
        threshold: 10,
        touchRatio: 1.2, // чуть более отзывчиво
        resistanceRatio: 0.85, // мягкость при упоре в край
        longSwipesRatio: 0.5, // меньше = сработает даже при коротком свайпе

        effect: isMobile ? "slide" : "coverflow",
        ...(isMobile
            ? {}
            : {
                  coverflowEffect: {
                      rotate: 50,
                      stretch: 0,
                      depth: 100,
                      modifier: 1,
                      slideShadows: true,
                  },
              }),

        on: {
            slideChangeTransitionEnd: () => {
                document.querySelectorAll(".swiper-slide").forEach((slide) => {
                    slide.classList.add("show");
                });
            },
            init: () => {
                document.querySelectorAll(".swiper-slide").forEach((slide) => {
                    slide.classList.add("show");
                });
            },
        },
    });
}

window.addEventListener("DOMContentLoaded", initSwiper);
window.addEventListener("resize", initSwiper);

</script>

