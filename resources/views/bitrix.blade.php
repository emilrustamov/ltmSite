@extends('layouts.base')

@section('title', __('translate.titleBitrix'))
@section('ogTitle', __('translate.titleBitrix'))
@section('metaDesc', __('translate.metaDescBitrix')) 
@section('metaKey', __('translate.metaKeyBitrix'))

@section('content')
    <!-- Block 1: CRM Битрикс24 -->
    <section class="container px-4 my-10">
        <div class="text-center">
            <h1 class="text-4xl font-bold">{{ __('translate.bitrix_heading') }}</h1>
            <p class="mt-4 text-lg">
                {{ __('translate.bitrix_intro') }}
            </p>
            <div class="mt-6">
                <!-- Здесь расположите картинку сертификата -->
                <img data-src="{{ asset('webp/bitrix-certificate-gold.webp') }}" alt="{{ __('translate.bitrix_certificate_alt') }}"
                    class="mx-auto lazyload lazyload">
            </div>
        </div>
    </section>

    <!-- Block 2: Описание и демо-таблица с табами -->
    <section class="container px-4 my-10">
        <div>
            <h2 class="text-3xl font-bold mb-4">{{ __('translate.bitrix_description_title') }}</h2>
            <p class="mb-4">
                {{ __('translate.bitrix_description_text1') }}
            </p>
            <p class="mb-6">
                {{ __('translate.bitrix_description_text2') }}
            </p>

            <!-- Табы для демонстрационного примера тарифов -->
            <div>
                <!-- Tab buttons -->
                <div class="mb-6 flex flex-wrap gap-2 sm:flex-nowrap" role="tablist">

                    <button id="tab-cloud" class="tab-btn active" onclick="showTab('cloud')" role="tab">
                        ☁️ <span>{{ __('translate.bitrix_cloud') }}</span>

                    </button>

                    <button id="tab-box" class="tab-btn inactive" onclick="showTab('box')" role="tab">
                        📦 <span>{{ __('translate.bitrix_box') }}</span>

                    </button>

                </div>

                <!-- Tab content: Облачное решение -->
                <div id="content-cloud" class="tab-content">
                    <h3 class="text-xl font-bold mb-2">{{ __('translate.bitrix_cloud_solution') }}</h3>
                    <div class="overflow-x-auto">
                        <table
                            class="min-w-[42rem]      {{-- ~ 672 px: 5 колонок × 130–140 px --}}
                               sm:min-w-full    {{-- начиная с 640 px скролл убираем  --}}
                               bg-[#1c1b1b] divide-y divide-gray-700
                               shadow-md rounded-lg text-sm">
                            <thead class="bg-[#e31e24]">
                                <tr>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_plan') }}</th>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_price') }}</th>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_description') }}</th>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_users') }}</th>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_cloud_space') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1c1b1b] divide-y divide-gray-700 text-white">
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_free') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_price_free') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_for_start') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_unlimited') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_space_5gb') }}</td>
                                </tr>
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_basic') }}</td>
                                    <td class="border p-2">
                                        <span
                                            class="line-through text-gray-400">{{ __('translate.bitrix_price_basic_old') }}</span>
                                        <br>
                                        <span class="text-red-500 font-bold relative">
                                            {{ __('translate.bitrix_price_basic_new') }}
                                        </span>
                                    </td>
                                    <td class="border p-2">{{ __('translate.bitrix_for_small_teams') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_users_5') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_space_24gb') }}</td>
                                </tr>
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_standard') }}</td>
                                    <td class="border p-2">
                                        <span
                                            class="line-through text-gray-400">{{ __('translate.bitrix_price_standard_old') }}</span>
                                        <br>
                                        <span class="text-red-500 font-bold relative">
                                            {{ __('translate.bitrix_price_standard_new') }}
                                        </span>
                                    </td>
                                    <td class="border p-2">{{ __('translate.bitrix_for_large_teams') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_users_50') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_space_100gb') }}</td>
                                </tr>
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_professional') }}</td>
                                    <td class="border p-2">
                                        <span
                                            class="line-through text-gray-400">{{ __('translate.bitrix_price_professional_old') }}</span>
                                        <br>
                                        <span class="text-red-500 font-bold relative">
                                            {{ __('translate.bitrix_price_professional_new') }}
                                        </span>
                                    </td>
                                    <td class="border p-2">{{ __('translate.bitrix_for_companies') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_users_100') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_space_1024gb') }}</td>
                                </tr>
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_enterprise') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_price_on_request') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_for_large_companies') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_users_250') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_space_3tb') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab content: Коробочное решение -->
                <div id="content-box" class="tab-content hidden">
                    <h3 class="text-xl font-bold mb-2">{{ __('translate.bitrix_box_solution') }}</h3>
                    <div class="overflow-x-auto">
                        <table
                            class="min-w-[36rem]      {{-- 4 колонки – хватит ~ 576 px     --}}
                               sm:min-w-full
                               bg-[#1c1b1b] divide-y divide-gray-700
                               shadow-md rounded-lg text-sm">
                            <thead class="bg-[#e31e24]">
                                <tr>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_editions') }}</th>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_users') }}</th>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_more_info') }}</th>
                                    <th class="border p-2 text-white">{{ __('translate.bitrix_additional') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1c1b1b] divide-y divide-gray-700 text-white">
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_store_crm') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_users_12') }}</td>
                                    <td class="border p-2">
                                        {{ __('translate.bitrix_price_store_crm') }}<br>
                                        {{ __('translate.bitrix_license_12_months') }}
                                    </td>
                                    <td class="border p-2">
                                        <ul class="!list-none">
                                            <li>{{ __('translate.bitrix_extranet') }}</li>
                                            <li>{{ __('translate.bitrix_ecommerce_platform') }}</li>
                                            <li>{{ __('translate.bitrix_copilot') }}</li>
                                            <li class="line-through text-gray-400">
                                                {{ __('translate.bitrix_online_documents') }}</li>
                                            <li class="line-through text-gray-400">
                                                {{ __('translate.bitrix_hr_document_flow') }}</li>
                                            <li class="line-through text-gray-400">
                                                {{ __('translate.bitrix_multi_department') }}</li>
                                            <li class="line-through text-gray-400">{{ __('translate.bitrix_web_cluster') }}
                                            </li>
                                            <li class="line-through text-gray-400">{{ __('translate.bitrix_vip_support') }}
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_corporate_portal') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_users_500') }}</td>
                                    <td class="border p-2">
                                        {{ __('translate.bitrix_price_corporate_portal') }}<br>
                                        {{ __('translate.bitrix_license_12_months') }}
                                    </td>
                                    <td class="border p-2">
                                        <ul class="!list-none">
                                            <li>{{ __('translate.bitrix_extranet') }}</li>
                                            <li>{{ __('translate.bitrix_ecommerce_platform') }}</li>
                                            <li>{{ __('translate.bitrix_copilot') }}</li>
                                            <li>{{ __('translate.bitrix_online_documents') }}</li>
                                            <li>{{ __('translate.bitrix_hr_document_flow') }}</li>
                                            <li class="line-through text-gray-400">
                                                {{ __('translate.bitrix_multi_department') }}</li>
                                            <li class="line-through text-gray-400">
                                                {{ __('translate.bitrix_web_cluster') }}</li>
                                            <li class="line-through text-gray-400">
                                                {{ __('translate.bitrix_vip_support') }}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border p-2">{{ __('translate.bitrix_enterprise') }}</td>
                                    <td class="border p-2">{{ __('translate.bitrix_users_1000') }}</td>
                                    <td class="border p-2">
                                        {{ __('translate.bitrix_price_enterprise') }}<br>
                                        {{ __('translate.bitrix_license_12_months') }}
                                    </td>
                                    <td class="border p-2">
                                        <ul class="!list-none">
                                            <li>{{ __('translate.bitrix_extranet') }}</li>
                                            <li>{{ __('translate.bitrix_ecommerce_platform') }}</li>
                                            <li>{{ __('translate.bitrix_copilot') }}</li>
                                            <li>{{ __('translate.bitrix_online_documents') }}</li>
                                            <li>{{ __('translate.bitrix_hr_document_flow') }}</li>
                                            <li>{{ __('translate.bitrix_multi_department') }}</li>
                                            <li>{{ __('translate.bitrix_web_cluster') }}</li>
                                            <li>{{ __('translate.bitrix_vip_support') }}</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- === Коробочное решение vs. Облако ================================= --}}
    <section class="container my-16" id="box-vs-cloud">
        <h2 class="text-3xl font-bold text-center mb-8">
            {{ __('translate.bitrix_box_vs_cloud') }}
        </h2>

        {{-- краткое позиционирование --}}
        <p class=" text-lg text-gray-200 mb-12">{{ __('translate.bitrix_box_vs_cloud_intro') }}</p>

        {{-- сравнение в две колонки --}}
        <div class="grid md:grid-cols-2 gap-6">
            {{-- левая колонка: Облако --}}
            <div class="border rounded-xl bg-[#1c1b1b] p-6 flex flex-col">
                <h3 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    ☁️&nbsp; {{ __('translate.bitrix_cloud_version') }}
                </h3>

                <ul class="space-y-3 flex-1 !list-none">
                    <li>{{ __('translate.bitrix_cloud_advantage1') }}</li>
                    <li>{{ __('translate.bitrix_cloud_advantage2') }}</li>
                    <li>{{ __('translate.bitrix_cloud_advantage3') }}</li>
                    <li>{{ __('translate.bitrix_cloud_advantage4') }}</li>
                    <li>{{ __('translate.bitrix_cloud_advantage5') }}</li>
                    <li>{{ __('translate.bitrix_cloud_advantage6') }}</li>
                </ul>


            </div>

            {{-- правая колонка: Коробка --}}
            <div class="border-2 border-[#e31e24] rounded-xl bg-[#1c1b1b]/60 p-6 flex flex-col">
                <h3 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    📦 {{ __('translate.bitrix_box_solution') }}
                    <span class="text-xs bg-lime-400 text-black font-bold px-2 py-0.5 rounded-full">
                        {{ __('translate.bitrix_max_features') }}
                    </span>
                </h3>

                <ul class="space-y-3 flex-1 !list-none">
                    <li>{{ __('translate.bitrix_box_advantage1') }}</li>
                    <li>{{ __('translate.bitrix_box_advantage2') }}</li>
                    <li>{{ __('translate.bitrix_box_advantage3') }}</li>
                    <li>{{ __('translate.bitrix_box_advantage4') }}</li>
                    <li>{{ __('translate.bitrix_box_advantage5') }}</li>
                    <li>{{ __('translate.bitrix_box_advantage6') }}</li>
                    <li>{{ __('translate.bitrix_box_advantage7') }}</li>
                </ul>


            </div>
        </div>
    </section>


    <!-- Block 5: Наши сертификаты -->
    {{-- === Наши сертификаты (Coverflow-slider) ======================== --}}
    <section class="container px-4 my-10">
        <h2 class="text-3xl font-bold mb-6 text-center">{{ __('translate.bitrix_our_competencies') }}</h2>

        <div class="swiper certificatesSlider select-none">
            <div class="swiper-wrapper">

                {{-- 🔖 Добавьте сюда все свои изображения (10 + шт.) --}}
                @foreach (['cert1.webp', 'cert2.webp', 'cert3.webp', 'cert4.webp', 'cert5.webp', 'cert6.webp', 'cert7.webp', 'cert8.webp'] as $file)
                    <div class="swiper-slide">
                        <img data-src="{{ asset('webp/' . $file) }}" alt="{{ __('translate.bitrix_certificate') }}"
                            class="mx-auto object-contain drop-shadow-lg lazyload">
                    </div>
                @endforeach
            </div>

            {{-- Навигация + пагинация --}}
            <div class="swiper-button-prev !text-white hover:!text-[#e31e24]"></div>
            <div class="swiper-button-next !text-white hover:!text-[#e31e24]"></div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </section>

    <!-- Block 3: Преимущества CRM Битрикс -->
    <section class="container px-4 my-10">
        <div>
            <h2 class="text-3xl font-bold mb-6 text-center">{{ __('translate.bitrix_advantages_title') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $advantages = [
                        [
                            'number' => '01',
                            'title' => __('translate.bitrix_advantage1_title'),
                            'description' => __('translate.bitrix_advantage1_description'),
                        ],
                        [
                            'number' => '02',
                            'title' => __('translate.bitrix_advantage2_title'),
                            'description' => __('translate.bitrix_advantage2_description'),
                        ],
                        [
                            'number' => '03',
                            'title' => __('translate.bitrix_advantage3_title'),
                            'description' => __('translate.bitrix_advantage3_description'),
                        ],
                        [
                            'number' => '04',
                            'title' => __('translate.bitrix_advantage4_title'),
                            'description' => __('translate.bitrix_advantage4_description'),
                        ],
                        [
                            'number' => '05',
                            'title' => __('translate.bitrix_advantage5_title'),
                            'description' => __('translate.bitrix_advantage5_description'),
                        ],
                        [
                            'number' => '06',
                            'title' => __('translate.bitrix_advantage6_title'),
                            'description' => __('translate.bitrix_advantage6_description'),
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

    <!-- Block 4: Наши кейсы -->
    {{-- === Наши кейсы (слайдер, статический) =========================== --}}
    <section class="container px-4 my-10">
        <h2 class="text-3xl font-bold mb-6 text-center">{{ __('translate.bitrix_our_cases') }}</h2>

        <div class="swiper myCases">
            <div class="swiper-wrapper">
                @php
                    $cases = [
                        [
                            'title' => 'Takyk Abzal',
                            'image' => 'webp/takyk.webp',
                            'link' => '/' . $lang . '/portfolio/takyk-abzal',
                        ],
                        [
                            'title' => 'Colife Invest',
                            'image' => 'webp/colife.webp',
                            'link' => '/' . $lang . '/portfolio/colife-invest',
                        ],
                        [
                            'title' => 'Nurana Bedew',
                            'image' => 'webp/nurana.webp',
                            'link' => '/' . $lang . '/portfolio/nurana-bedew',
                        ],
                    ];
                @endphp

                @foreach ($cases as $case)
                    <div class="swiper-slide">
                        <div class="border rounded-xl overflow-hidden shadow-lg group bg-[#1c1b1b]">
                            <a href="{{ $case['link'] }}">
                                <img data-src="{{ asset($case['image']) }}" alt="{{ $case['title'] }}"
                                    class="w-full object-cover transition-transform duration-300 group-hover:scale-105 lazyload">
                            </a>

                            <div class="p-4 text-center">
                                <h3 class="text-xl font-semibold mb-2 text-white">{{ $case['title'] }}</h3>

                                <a href="{{ $case['link'] }}"
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
            new Swiper('.myCases', {
                // если импортируете ES-модули, раскомментируйте строку ниже
                // modules: [Navigation, Pagination],

                loop: true,
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.certificatesSlider', {
                // modules:[Navigation, Pagination, Autoplay, EffectCoverflow], // если импортируете
                loop: true,
                grabCursor: true,
                spaceBetween: 24,

                /* 3 слайда на десктопе, 2 на планшете, 1 на телефоне */
                slidesPerView: 1,
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                },

                /* Coverflow-эффект оставляем, но без центрирования */
                effect: 'coverflow',
                centeredSlides: false,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 100,
                    modifier: 1.8,
                    slideShadows: false,
                },

                /* Медленнее автосвайп: 6 секунд между сменой */
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>

    <!-- Добавьте глобально (или в <style>) маленький набор утилити-классов -->
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
            ы background: #e31e24;
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
