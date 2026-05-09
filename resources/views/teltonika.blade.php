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
                    alt="{{ __('translate.teltonika_certificate_alt') }}" class="h-[400px] md:h-[500px] lg:h-[600px] xl:h-[800px] w-auto mx-auto object-contain drop-shadow-lg lazyload lazyload">
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
            'image' => asset('webp/5-tel.webp'),
            'color' => '#1f2329',
          ],
          ];

          $teltonikaCardBackgrounds = [
            '#e31e24' => 'teltonika-card-bg-red',
            '#2b2f36' => 'teltonika-card-bg-dark',
            '#b10f1a' => 'teltonika-card-bg-deep-red',
            '#6b1b22' => 'teltonika-card-bg-wine',
            '#1f2329' => 'teltonika-card-bg-graphite',
          ];
        @endphp

        @foreach($teltonikaCards as $card)

        <div class="relative overflow-hidden rounded-2xl bg-white 
                shadow-lg transition duration-300 
                hover:-translate-y-2 hover:shadow-2xl min-h-[360px]
                xl:min-h-[280px] w-[240px] w-full">

        <!-- Верхний цветной блок -->
        <div class="px-8 pt-10 pb-50 xl:pb-30 text-white teltonika-card-header {{ $teltonikaCardBackgrounds[$card['color']] ?? 'teltonika-card-bg-red' }}">

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

    @endsection
