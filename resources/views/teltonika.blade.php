@extends('layouts.base')

@section('title', __('translate.titleTeltonika'))
@section('ogTitle', __('translate.titleTeltonika'))
@section('metaDesc', __('translate.metaDescTeltonika'))
@section('metaKey', __('translate.metaKeyTeltonika'))

@section('content')

    <!-- Block 5: Наши сертификаты -->
    <section class="container px-4 my-10">
        <div class="text-center">
            <h1 class="text-4xl font-bold">{{ __('translate.teltonika_our_competencies') }}</h1>
            <!-- <p class="mt-4 text-lg">
                {{ __('translate.bitrix_intro') }}
            </p> -->
            <div class="mt-6">
                <!-- Здесь расположите картинку сертификата -->
                <img data-src="{{ asset('webp/teltonika-certif.webp') }}"
                    alt="{{ __('translate.teltonika_certificate_alt') }}" class="h-[800px] w-auto mx-auto object-contain drop-shadow-lg lazyload lazyload">
            </div>
        </div>
    </section>
    

    <!-- About-opisanie -->
    <section class="container px-4 my-10">
        <div>
            <h2 class="text-3xl font-bold mb-4">{{ __('translate.bitrix_description_title') }}</h2>
            <p class="mb-4">
                {{ __('translate.teltonika_description_text1') }}                
            </p>
        </div>

        <h3 class="pt-5 font-bold mb-4">{{ __('translate.teltonika_branchs_text') }}</h3>
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 center pt-5">
        @php
        $teltonikaCards = [
            [
            'title' => __('translate.teltonika_card1_title'),
            'subtitle' => __('translate.teltonika_card1_subtitle'),
            'image' => asset('webp/1-tel.webp'),
            'color' => '#e31e24',
            ],
          [
            'title' => __('translate.teltonika_card2_title'),
            'subtitle' => __('translate.teltonika_card2_subtitle'),
            'image' => asset('webp/2-tel.webp'),
            'color' => '#2b2f36',
          ],
          [
         'title' => __('translate.teltonika_card3_title'),
            'subtitle' => __('translate.teltonika_card3_subtitle'),
            'image' => asset('webp/3-tel.webp'),
            'color' => '#b10f1a',
          ],
          [
            'title' => __('translate.teltonika_card4_title'),
            'subtitle' => __('translate.teltonika_card4_subtitle'),
            'image' => asset('webp/4-tel.webp'),
            'color' => '#6b1b22',
          ],
          [
            'title' => __('translate.teltonika_card5_title'),
            'subtitle' => __('translate.teltonika_card5_subtitle'),
            'image' => asset('webp/5-tel.png'),
            'color' => '#1f2329',
          ],
          ];
        @endphp

        @foreach($teltonikaCards as $card)

        <div class="relative overflow-hidden rounded-2xl bg-white 
                shadow-lg transition duration-300 
                hover:-translate-y-2 hover:shadow-2xl min-h-[360px]
                xl:min-h-[280px] w-[240px] w-full">

        <!-- Верхний цветной блок -->
        <div class="px-8 pt-10 pb-50 xl:pb-30 text-white"
             style="background: {{ $card['color'] }};
                    clip-path: polygon(0 0, 100% 0, 100% 60%, 0 80%)">

            <h6 class="font-bold mb-0 !text-[24px] xl:!text-[20px]">
                {{ $card['title'] }}
            </h6>

            <span class="text-[16px] xl:text-[14px] block mt-4 mb-2 leading-[1.2] max-w-[90%] text-white/90">
                {{ $card['subtitle'] }}
            </span>
        </div>

        <!-- Центрированный большой круг -->
        <div class="absolute left-1/2 -translate-x-1/2 top-[140px] xl:top-[125px]">

            <div class="relative">

                <!-- задний blur круг -->
                <div class="absolute -right-6 -top-4 w-80 h-80 xl:w-60 xl:h-60 
                            rounded-full bg-[#710D0D]/70 blur-[9px]">
                </div>

                <!-- основной круг -->
                <div class="relative w-80 h-80 xl:w-60 xl:h-60 rounded-full bg-white
                            shadow-[0_6px_20px_rgba(0,0,0,0.25)]
                            flex items-center justify-center overflow-hidden">

                    <img src="{{ $card['image'] }}"
                         alt="{{ $card['title'] }}"
                         class="w-80 h-80 xl:w-60 xl:h-60 object-contain"
                         loading="lazy">
                </div>

            </div>

        </div>

        <!-- Нижний отступ чтобы круг не обрезался -->
        <div class="h-40"></div>

        </div>

        @endforeach

        </div>
    </section>

    <!-- Vozmoznosti Teltonika -->
    <section class="container px-4 my-10">
        <div>
            <h2 class="text-3xl font-bold mb-6 text-center">{{ __('translate.teltonika_possibilities_text') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $advantages = [
                        [
                            'number' => '01',
                            'title' => __('translate.teltonika_advantage1_title'),
                            'description' => __('translate.teltonika_advantage1_description'),
                        ],
                        [
                            'number' => '02',
                            'title' => __('translate.teltonika_advantage2_title'),
                            'description' => __('translate.teltonika_advantage2_description'),
                        ],
                        [
                            'number' => '03',
                            'title' => __('translate.teltonika_advantage3_title'),
                            'description' => __('translate.teltonika_advantage3_description'),
                        ],
                        [
                            'number' => '04',
                            'title' => __('translate.teltonika_advantage4_title'),
                            'description' => __('translate.teltonika_advantage4_description'),
                        ],
                        [
                            'number' => '05',
                            'title' => __('translate.teltonika_advantage5_title'),
                            'description' => __('translate.teltonika_advantage5_description'),
                        ],
                        [
                            'number' => '06',
                            'title' => __('translate.teltonika_advantage6_title'),
                            'description' => __('translate.teltonika_advantage6_description'),
                        ],
                    ];
                @endphp

                @foreach ($advantages as $advantage)
                    <div class="border rounded p-4 transition duration-300 ease-in-out hover:bg-[rgb(227,30,36)]">
                        <div class="text-4xl font-bold text-red-500 mb-2">{{ $advantage['number'] }}</div>
                        <h3 class="text-xl font-semibold mb-2">{{ $advantage['title'] }}</h3>
                        <p>{{ $advantage['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container px-4 my-10">
        <h2 class="text-3xl font-bold mb-6 text-center">{{ __('translate.bitrix_our_cases') }}</h2>

        @if(!empty($bitrixProjects) && $bitrixProjects->count() > 0)
            <div class="swiper myCases">
                <div class="swiper-wrapper">
                    @foreach ($bitrixProjects as $project)
                        @php
                            $projectTitle = $project->translation($lang)?->title ?? $project->translation('ru')?->title ?? '';
                            $projectLink = '/' . $lang . '/portfolio/' . $project->slug;
                            $projectImage = $project->getFirstMediaUrl('portfolio-images', 'webp');
                            if (!$projectImage && $project->photo) {
                                $projectImage = asset('storage/' . $project->photo);
                            }
                        @endphp

                        <div class="swiper-slide">
                            <div class="border rounded-xl overflow-hidden shadow-lg group bg-[#1c1b1b]">
                                <a href="{{ $projectLink }}">
                                    @if($projectImage)
                                        <img data-src="{{ $projectImage }}" alt="{{ $projectTitle }}"
                                            class="w-full object-cover transition-transform duration-300 group-hover:scale-105 lazyload">
                                    @else
                                        <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                                            <span class="text-gray-400">No image</span>
                                        </div>
                                    @endif
                                </a>

                                <div class="p-4 text-center">
                                    <h3 class="text-xl font-semibold mb-2 text-white">{{ $projectTitle }}</h3>

                                    <a href="{{ $projectLink }}"
                                        class="inline-flex items-center gap-2 bg-[#e31e24] text-white px-4 py-2 rounded
                                          hover:bg-[#b91217] transition-colors">
                                        {{ __('translate.bitrix_more') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- навигация / пагинация --}}
                <div class="swiper-button-prev !text-white hover:!text-[#e31e24]"></div>
                <div class="swiper-button-next !text-white hover:!text-[#e31e24]"></div>
                <div class="swiper-pagination !bottom-0"></div>
            </div>
        @else
            <div class="text-center py-8 text-gray-400">
                <p>{{ __('translate.bitrix_no_projects') ?? 'Пока нет проектов в категории Bitrix' }}</p>
            </div>
        @endif
    </section>

     <!-- Simple tab switching script -->
     <script>
        function showTab(tabName) {
            /* переключаем кнопки */
            document.querySelectorAll('.tab-btn').forEach(btn => {
                const isActive = btn.id === 'tab-' + tabName;
                btn.classList.toggle('active', isActive);
                btn.classList.toggle('inactive', !isActive);
            });

            /* переключаем контент с тем же суффиксом */
            document.querySelectorAll('.tab-content').forEach(cnt => {
                cnt.classList.toggle('hidden', cnt.id !== 'content-' + tabName);
            });
        }

        /* первичная инициализация */
        document.addEventListener('DOMContentLoaded', () => showTab('cloud'));
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Проверяем количество слайдов для loop режима
            const myCasesSlides = document.querySelectorAll('.myCases .swiper-slide');
            const myCasesCount = myCasesSlides.length;
            // Для loop нужно минимум slidesPerView * 2 слайдов (для максимального breakpoint: 3 * 2 = 6)
            const enableMyCasesLoop = myCasesCount >= 6;

            new Swiper('.myCases', {
                // если импортируете ES-модули, раскомментируйте строку ниже
                // modules: [Navigation, Pagination],

                loop: enableMyCasesLoop,
                grabCursor: true,
                slidesPerView: 1,
                spaceBetween: 24,

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                // Адаптив: 1-2-3 карточки на разных экранах
                breakpoints: {
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                },
            });
        });
    </script>

    <style>
        /* базовые параметры */
        .tab-btn {
            position: relative;
            display: flex;
            align-items: center;
            gap: .5rem;
            padding: .75rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            transition: .2s ease-out;
            user-select: none;
        }

        /* стрелка */
        .tab-btn .arrow {
            width: 1rem;
            height: 1rem;
            opacity: 0;
            transform: translateX(-4px);
            transition: .2s;
        }

        /* ── НЕактивный ─────────────────────────────────────────── */
        .tab-btn.inactive {
            color: #374151;
            /* text-gray-700 */
            background: #ffffff;
            /* bg-white      */
            border: 1px solid #d1d5db;
            /* border-gray-300 */
            box-shadow: 0 1px 2px rgb(0 0 0 / .05);
            cursor: pointer;
        }

        .tab-btn.inactive:hover {
            color: #e31e24;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgb(0 0 0 / .1);
        }

        .tab-btn.inactive:hover .arrow {
            opacity: 1;
            transform: translateX(0);
        }

        /* ── АКТИВНЫЙ ───────────────────────────────────────────── */
        .tab-btn.active {
            color: #fff;
            background: #e31e24;
            border: 1px solid transparent;
            box-shadow: 0 6px 8px rgb(227 30 36 / .35);
            cursor: default;
            outline: none;
        }

        .tab-btn.active::after {
            /* лёгкая «подсветка» кольцом */
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            box-shadow: 0 0 0 4px rgb(227 30 36 / .35);
        }

        .tab-btn.active .arrow {
            display: none;
        }
    </style>

    @endsection
