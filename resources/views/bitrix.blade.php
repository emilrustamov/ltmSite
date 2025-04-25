@extends('layouts.base')

@section('title', 'Битрикс24 CRM')

@section('content')
    <!-- Block 1: CRM Битрикс24 -->
    <section class="container my-10">
        <div class="text-center">
            <h1 class="text-4xl font-bold">CRM Битрикс24</h1>
            <p class="mt-4 text-lg">
                Единое цифровое пространство для совместной работы сотрудников, оптимизации бизнес-процессов.
            </p>
            <div class="mt-6">
                <!-- Здесь расположите картинку сертификата -->
                <img src="{{ asset('webp/bitrix-certificate.webp') }}" alt="Сертификат" class="mx-auto lazyload">
            </div>
        </div>
    </section>

    <!-- Block 2: Описание и демо-таблица с табами -->
    <section class="container my-10">
        <div>
            <h2 class="text-3xl font-bold mb-4">Описание</h2>
            <p class="mb-4">
                Битрикс24 предоставляет комплексный инструмент организации совместной работы с задачами и проектами всех
                отделов — от бухгалтерии до разработки.
            </p>
            <p class="mb-6">
                Платформа для бизнеса должна быть максимально удобной и содержать весь необходимый для работы функционал.
                Объедините всех сотрудников и работайте вместе над задачами и проектами, контролируйте работу, анализируйте
                результат и стройте бизнес-процессы в вашей CRM.
            </p>

            <!-- Табы для демонстрационного примера тарифов -->
            <div>
                <!-- Tab buttons -->
                <div class="mb-6 flex flex-wrap gap-2" role="tablist">

                    <button id="tab-cloud" class="tab-btn active" {{-- ← активен при первой загрузке --}} onclick="showTab('cloud')"
                        role="tab">
                        ☁️ <span>Облачное решение</span>
                        {{-- стрелка-подсказка (показывается на hover у неактивного) --}}
                        <svg class="arrow" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </button>

                    <button id="tab-box" class="tab-btn inactive" onclick="showTab('box')" role="tab">
                        📦 <span>Коробочное решение</span>
                        <svg class="arrow" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M13 6l6 6-6 6" />
                        </svg>
                    </button>

                </div>

                <!-- Tab content: Облачное решение -->
                <div id="content-cloud" class="tab-content">
                    <h3 class="text-xl font-bold mb-2">Облачное решение</h3>
                    <table class="min-w-full bg-[#1c1b1b] divide-y divide-gray-700 shadow-md rounded-lg">
                        <thead class="bg-[#e31e24]">
                            <tr>
                                <th class="border p-2 text-white">План</th>
                                <th class="border p-2 text-white">Цена</th>
                                <th class="border p-2 text-white">Описание</th>
                                <th class="border p-2 text-white">Пользователи</th>
                                <th class="border p-2 text-white">Место в облаке</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1c1b1b] divide-y divide-gray-700 text-white">
                            <tr>
                                <td class="border p-2">Бесплатный</td>
                                <td class="border p-2">0 ₽</td>
                                <td class="border p-2">Для старта и ознакомления</td>
                                <td class="border p-2">Неограничено</td>
                                <td class="border p-2">5 Гб</td>
                            </tr>
                            <tr>
                                <td class="border p-2">Базовый</td>
                                <td class="border p-2">
                                    <span class="line-through text-gray-400">2 490 ₽</span>
                                    <br>
                                    <span class="text-red-500 font-bold relative">
                                        1 743 ₽

                                    </span>
                                </td>
                                <td class="border p-2">Для небольших отделов продаж и микробизнесов до 5 человек</td>
                                <td class="border p-2">5 пользователей</td>
                                <td class="border p-2">24 Гб</td>
                            </tr>
                            <tr>
                                <td class="border p-2">Стандартный</td>
                                <td class="border p-2">
                                    <span class="line-through text-gray-400">6 990 ₽/мес.</span>
                                    <br>
                                    <span class="text-red-500 font-bold relative">
                                        4 893 ₽/мес.

                                    </span>
                                </td>
                                <td class="border p-2">Для больших отделов продаж и рабочих групп до 50 человек</td>
                                <td class="border p-2">50 пользователей</td>
                                <td class="border p-2">100 Гб</td>
                            </tr>
                            <tr>
                                <td class="border p-2">Профессиональный</td>
                                <td class="border p-2">
                                    <span class="line-through text-gray-400">13 990 ₽/мес.</span>
                                    <br>
                                    <span class="text-red-500 font-bold relative">
                                        9 793 ₽/мес.

                                    </span>
                                </td>
                                <td class="border p-2">Для компаний или департамента любого типа до 100 пользователей</td>
                                <td class="border p-2">100 пользователей</td>
                                <td class="border p-2">1 024 Гб</td>
                            </tr>
                            <tr>
                                <td class="border p-2">Энтерпрайз</td>
                                <td class="border p-2">По запросу</td>
                                <td class="border p-2">Для компаний с высоким оборотом и большим количеством сотрудников
                                </td>
                                <td class="border p-2">от 250 пользователей</td>
                                <td class="border p-2">3 Тб</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tab content: Коробочное решение -->
                <div id="content-box" class="tab-content hidden">
                    <h3 class="text-xl font-bold mb-2">Коробочное решение</h3>
                    <table class="min-w-full bg-[#1c1b1b] divide-y divide-gray-700 shadow-md rounded-lg">
                        <thead class="bg-[#e31e24]">
                            <tr>
                                <th class="border p-2 text-white">Редакции</th>
                                <th class="border p-2 text-white">Пользователи</th>
                                <th class="border p-2 text-white">Подробнее</th>
                                <th class="border p-2 text-white">Дополнительно</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#1c1b1b] divide-y divide-gray-700 text-white">
                            <tr>
                                <td class="border p-2">Интернет-магазин + CRM</td>
                                <td class="border p-2">12</td>
                                <td class="border p-2">
                                    109 000 ₽<br>
                                    Лицензия 12 мес
                                </td>
                                <td class="border p-2">
                                    <ul>
                                        <li>✔ Экстранет</li>
                                        <li>✔ eCommerce-платформа</li>
                                        <li>✔ CoPilot</li>
                                        <li class="line-through text-gray-400">Документы Онлайн</li>
                                        <li class="line-through text-gray-400">Кадровый документооборот</li>
                                        <li class="line-through text-gray-400">Многодепартаментность</li>
                                        <li class="line-through text-gray-400">Веб-кластер</li>
                                        <li class="line-through text-gray-400">VIP поддержка 24/7</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">Корпоративный портал</td>
                                <td class="border p-2">500</td>
                                <td class="border p-2">
                                    599 000 ₽<br>
                                    Лицензия 12 мес
                                </td>
                                <td class="border p-2">
                                    <ul>
                                        <li>✔ Экстранет</li>
                                        <li>✔ eCommerce-платформа</li>
                                        <li>✔ CoPilot</li>
                                        <li>✔ Документы Онлайн</li>
                                        <li>✔ Кадровый документооборот</li>
                                        <li class="line-through text-gray-400">Многодепартаментность</li>
                                        <li class="line-through text-gray-400">Веб-кластер</li>
                                        <li class="line-through text-gray-400">VIP поддержка 24/7</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-2">Энтерпрайз</td>
                                <td class="border p-2">1000+</td>
                                <td class="border p-2">
                                    1 299 000+ ₽<br>
                                    Лицензия 12 мес
                                </td>
                                <td class="border p-2">
                                    <ul>
                                        <li>✔ Экстранет</li>
                                        <li>✔ eCommerce-платформа</li>
                                        <li>✔ CoPilot</li>
                                        <li>✔ Документы Онлайн</li>
                                        <li>✔ Кадровый документооборот</li>
                                        <li>✔ Многодепартаментность</li>
                                        <li>✔ Веб-кластер</li>
                                        <li>✔ VIP поддержка 24/7</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    {{-- === Коробочное решение vs. Облако ================================= --}}
<section class="container my-16" id="box-vs-cloud">
    <h2 class="text-3xl font-bold text-center mb-8">
        Коробка &nbsp;vs&nbsp; Облачная версия
    </h2>

    {{-- краткое позиционирование --}}
    <p class=" text-lg text-gray-200 mb-12">Коробка — это лицензия Битрикс24 c правом установки <b>на свои серверы</b> или в частное облако. Подходит компаниям с жёсткими требованиями к безопасности, интеграциям и нестандартным доработкам. Облако же выбирают, когда важны <b>минимальные вложения</b>, быстрое начало работы и отсутствия забот о сервере.</p>

    {{-- сравнение в две колонки --}}
    <div class="grid md:grid-cols-2 gap-6">
        {{-- левая колонка: Облако --}}
        <div class="border rounded-xl bg-[#1c1b1b] p-6 flex flex-col">
            <h3 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                ☁️&nbsp; Облачный Битрикс24
            </h3>

            <ul class="space-y-3 flex-1">
                <li>✅ Быстрый старт: регистрация — и можно работать</li>
                <li>✅ Нет затрат на сервер и администрирование</li>
                <li>✅ Авто-бэкапы и обновления уже включены</li>
                <li>✅ Фиксированная подписка — легко планировать бюджет</li>
                <li>⚠️ Часть модулей и API недоступны для глубоких доработок</li>
                <li>⚠️ Хранение данных — только в центрах данных Битрикс24</li>
            </ul>

          
        </div>

        {{-- правая колонка: Коробка --}}
        <div class="border-2 border-[#e31e24] rounded-xl bg-[#1c1b1b]/60 p-6 flex flex-col">
            <h3 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                📦  Коробочное решение
                <span class="text-xs bg-lime-400 text-black font-bold px-2 py-0.5 rounded-full">
                    максимум возможностей
                </span>
            </h3>
        
            <ul class="space-y-3 flex-1">
                <li>✅ <b>Полный доступ к исходному коду</b> — можно менять интерфейс, бизнес-логику и модули под любые задачи.</li>
                <li>✅ Развёртывание на <strong>собственном сервере</strong> или в частном облаке — полное управление данными и безопасностью.</li>
                <li>✅ <b>Лёгкие интеграции</b> с 1С, ERP, WMS, телефонией: нет ограничений API, можно подключать сервис-шины (ESB) и посторонние БД.</li>
                <li>✅ Расширенные модули: веб-кластер, многодепартаментность, e-Commerce, CoPilot и др.</li>
                <li>✅ Возможна покупка <b>бессрочной</b> лицензии — платите лишь за обновления.</li>
                <li>⚠️ Нужны собственный администратор и серверная инфраструктура.</li>
                <li>⚠️ Первоначальные расходы выше, чем у облачной подписки.</li>
            </ul>
        
        
        </div>
    </div>
</section>


    <!-- Block 5: Наши сертификаты -->
    {{-- === Наши сертификаты (Coverflow-slider) ======================== --}}
    <section class="container my-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Наши компетенции</h2>

        <div class="swiper certificatesSlider select-none">
            <div class="swiper-wrapper">

                {{-- 🔖 Добавьте сюда все свои изображения (10 + шт.) --}}
                @foreach (['cert1.webp', 'cert2.webp', 'cert3.webp', 'cert4.webp', 'cert5.webp', 'cert6.webp', 'cert7.webp', 'cert8.webp'] as $file)
                    <div class="swiper-slide">
                        <img src="{{ asset('webp/' . $file) }}" alt="Сертификат"
                            class="mx-auto object-contain drop-shadow-lg">
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
    <section class="container my-10">
        <div>
            <h2 class="text-3xl font-bold mb-6 text-center">Преимущества CRM Битрикс перед другими системами</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $advantages = [
                        [
                            'number' => '01',
                            'title' => 'ОТСУТСТВИЕ ВЛОЖЕНИЙ',
                            'description' =>
                                'Для начала работы с Битрикс не требуется установка дополнительных приложений или настроек. Запустить систему можно сразу после регистрации. Более того, при подключении до 12 человек к корпоративному порталу продукт полностью бесплатен.',
                        ],
                        [
                            'number' => '02',
                            'title' => 'ПОЛНЫЙ КОНТРОЛЬ И АВТОМАТИЗАЦИЯ',
                            'description' =>
                                'С помощью Битрикс24 можно реализовать любой бизнес-процесс. Система имеет обширный набор опций для автоматизации и легко настраивается под требования компании. По всем процессам проводится анализ и статистика.',
                        ],
                        [
                            'number' => '03',
                            'title' => 'ВСТРОЕННАЯ ТЕЛЕФОНИЯ',
                            'description' =>
                                'Штатный инструментарий Б24 позволяет совершать входящие и исходящие звонки без подключения сторонних приложений. Все разговоры при необходимости могут быть записаны. Использование встроенной телефонии выгоднее подключения АТС.',
                        ],
                        [
                            'number' => '04',
                            'title' => 'АНАЛИТИКА И ПРОГНОЗИРОВАНИЕ',
                            'description' =>
                                'Корпоративный портал включает 8 отчетов и глобальную статистику с опцией визуализации данных. Система позволяет контролировать воронки продаж, получение оплаты за заказы, эффективность работы персонала и т.д.',
                        ],
                        [
                            'number' => '05',
                            'title' => 'ВЕРТИКАЛЬ ДОСТУПА',
                            'description' =>
                                'Система предполагает настройку закрытых и полузакрытых чатов, проектов и групп. Все данные полностью конфиденциальны и доступны только конкретным сотрудникам или департаментам согласно уровню доступа.',
                        ],
                        [
                            'number' => '06',
                            'title' => 'ПРОСТОТА ИНТЕГРАЦИИ С 1С',
                            'description' =>
                                'Синхронизация корпоративного портала с продуктами 1С возможна штатными инструментами Битрикс. Обмен данными между корпоративным порталом и бухгалтерией возможен в одно- или двустороннем порядке.',
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
    <section class="container my-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Наши кейсы</h2>

        <div class="swiper myCases">
            <div class="swiper-wrapper">
                @php
                    $cases = [
                        [
                            'title' => 'Takyk Abzal',
                            'image' => 'webp/takyk.webp',
                            'link' => '/ru/portfolio/128',
                        ],
                        [
                            'title' => 'Colife Invest',
                            'image' => 'webp/colife.webp',
                            'link' => '/ru/portfolio/127',
                        ],
                        [
                            'title' => 'Nurana Bedew',
                            'image' => 'webp/nurana.webp',
                            'link' => '/ru/portfolio/124',
                        ],
                    ];
                @endphp

                @foreach ($cases as $case)
                    <div class="swiper-slide">
                        <div class="border rounded-xl overflow-hidden shadow-lg group bg-[#1c1b1b]">
                            <a href="{{ $case['link'] }}">
                                <img src="{{ asset($case['image']) }}" alt="{{ $case['title'] }}"
                                    class="w-full object-cover transition-transform duration-300 group-hover:scale-105">
                            </a>

                            <div class="p-4 text-center">
                                <h3 class="text-xl font-semibold mb-2 text-white">{{ $case['title'] }}</h3>

                                <a href="{{ $case['link'] }}"
                                    class="inline-flex items-center gap-2 bg-[#e31e24] text-white px-4 py-2 rounded
                                      hover:bg-[#b91217] transition-colors">
                                    Подробнее
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
        function showTab(tabName){
            /* переключаем кнопки */
            document.querySelectorAll('.tab-btn').forEach(btn=>{
                const isActive = btn.id === 'tab-' + tabName;
                btn.classList.toggle('active',   isActive);
                btn.classList.toggle('inactive', !isActive);
            });
        
            /* переключаем контент с тем же суффиксом */
            document.querySelectorAll('.tab-content').forEach(cnt=>{
                cnt.classList.toggle('hidden', cnt.id !== 'content-' + tabName);
            });
        }
        
        /* первичная инициализация */
        document.addEventListener('DOMContentLoaded', ()=> showTab('cloud'));
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
            .tab-btn{
              position:relative; display:flex; align-items:center; gap:.5rem;
              padding:.75rem 1.5rem; border-radius:9999px; font-weight:600;
              transition:.2s ease-out; user-select:none;
            }
            
            /* стрелка */
            .tab-btn .arrow{
              width:1rem; height:1rem; opacity:0; transform:translateX(-4px);
              transition:.2s;
            }
            
            /* ── НЕактивный ─────────────────────────────────────────── */
            .tab-btn.inactive{
              color:#374151;               /* text-gray-700 */
              background:#ffffff;          /* bg-white      */
              border:1px solid #d1d5db;    /* border-gray-300 */
              box-shadow:0 1px 2px rgb(0 0 0 / .05);
              cursor:pointer;
            }
            .tab-btn.inactive:hover{
              color:#e31e24;
              transform:translateY(-2px);
              box-shadow:0 4px 6px rgb(0 0 0 / .1);
            }
            .tab-btn.inactive:hover .arrow{
              opacity:1; transform:translateX(0);
            }
            
            /* ── АКТИВНЫЙ ───────────────────────────────────────────── */
            .tab-btn.active{
              color:#fff;ы
              background:#e31e24;
              border:1px solid transparent;
              box-shadow:0 6px 8px rgb(227 30 36 / .35);
              cursor:default;
              outline:none;
            }
            .tab-btn.active::after{       /* лёгкая «подсветка» кольцом */
              content:"";
              position:absolute; inset:0;
              border-radius:9999px;
              box-shadow:0 0 0 4px rgb(227 30 36 / .35);
            }
            .tab-btn.active .arrow{display:none;}
            </style>
            



@endsection
