@extends('layouts.base')

@section('title', 'Об IT-компании LTM Studio в Туркменистане')
@section('circles')
    <div class="circle-1">
        <img src="{{ '../assets/images/circle-1.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-3">
        <img src="{{ '../assets/images/circle-3.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-4">
        <img src="{{ '../assets/images/circle-4.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-5">
        <img src="{{ '../assets/images/circle-5.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-6">
        <img src="{{ '../assets/images/circle-6.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-7">
        <img src="{{ '../assets/images/radialCircle.png' }}">
    </div>
    <div class="circle-3">
        <img src="{{ '../assets/images/circle-3.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-5">
        <img src="{{ '../assets/images/circle-5.png' }}" alt="" loading="lazy">
    </div>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="relative">
                <div class="aboutUs_desc max-w-full lg:max-w-[90%]">
                    <div class="about-us-photo" style="backface-visibility: hidden; transform: translate3d(0px, 0px, 0px);">
                    </div>

                    <h1>{{ __('translate.aboutUsTitle') }}</h1>


                    <p class="">{{ __('translate.abtLtmstudio') }}</p>

                    <blockquote class="relative text-center font-semibold  my-16 text-[24px] md:text-[36px] xl:text-[48px]">
                        {!! nl2br(__('translate.aboutPerfect')) !!}
                    </blockquote>


                    <p class="">{!! nl2br(__('translate.abtLtmstudio1')) !!}
                    </p>

                    <section>
                        <h2>{{ __('translate.history') }}</h2>
                        <p class="">{!! nl2br(__('translate.aboutHistory')) !!}</p>
                    </section>

                    <section>
                        <h2>{{ __('translate.aboutStatistics') }}</h2>
                        <div class="aboutUs_stats">
                            <div class="about-us-photo-2"
                                style="backface-visibility: hidden; transform: translate3d(0px, -143px, 0px)">
                            </div>
                            <div class="about-us-photo-3" style="transform: translate3d(0px, -158px, 0px)"></div>
                            @php
                                $stats = [
                                    ['target' => '4+', 'desc' => __('translate.years')],
                                    ['target' => '20+', 'desc' => __('translate.projects')],
                                    ['target' => '20+', 'desc' => __('translate.clients')],
                                    ['target' => '20+', 'desc' => __('translate.satClients')],
                                    ['target' => '589+', 'desc' => __('translate.redBull')],
                                ];
                            @endphp

                            <ul class="flex flex-wrap flex-row justify-start items-start text-left list-none">
                                @foreach ($stats as $item)
                                    <li class="mb-16 w-1/2 sm:w-1/2 lg:w-1/3">
                                        <div class="stats_count text-7xl md:text-[135px] text-[#e31e24] font-bold leading-none tracking-wider"
                                            data-target="{{ $item['target'] }}">0</div>
                                        <div
                                            class="stats_desc -mt-4 sm:-mt-8 md:-mt-12 pl-2 sm:pl-4 md:pl-12 text-3xl md:text-7xl">
                                            {{ $item['desc'] }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>

                    <section>
                        <h2>{{ __('translate.valueTitle') }}</h2>
                        <p>{{ __('translate.valueSub') }}</p>
                        <div class="aboutUs_virtues relative">
                            <div class="about-us-photo-4"
                                style="backface-visibility: hidden; transform: translate3d(0px, -187px, 0px);">
                            </div>
                            <div class="about-us-photo-5"></div>
                            <ul class="flex flex-col md:flex-row gap-4 my-14">
                                @foreach ([['num' => '01', 'title' => __('translate.value1'), 'desc' => __('translate.value1Sub')], ['num' => '02', 'title' => __('translate.value2'), 'desc' => __('translate.value2Sub')], ['num' => '03', 'title' => __('translate.value3'), 'desc' => __('translate.value3Sub')]] as $item)
                                    <li class="w-full">
                                        <div>
                                            <div class="text-4xl md:text-8xl text-[#e31e24] font-bold">{{ $item['num'] }}
                                            </div>
                                            <h3 class="relative text-xl md:text-3xl">{{ $item['title'] }}</h3>
                                            <hr class="my-2">
                                            <p class="item_desc text-base md:text-lg">{!! nl2br($item['desc']) !!}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <p>{{ __('translate.valueSubCont') }}</p>

                            {{-- <div class="aboutUs_certificates">

                                <div class="certificates_info">
                                    <div class="stats_count text-7xl md:text-[135px] text-[#e31e24] font-bold leading-none tracking-wider">15+</div>
                                    <div class="certificates-info_desc"> {{ __('translate.exp') }}</div>
                                </div>
                            </div> --}}
                        </div>
                    </section>

                    <section class="py-16 bg-[#1c1b1b] text-white">
                        <div class=" mx-auto px-4">
                            <h2 class="text-center mb-4 text-[#e31f25] animate-fade-in-up">
                                {{ __('translate.aboutSpecTitle') }}
                            </h2>
                            <p class="text-center text-gray-300 mb-12 text-lg animate-fade-in-up delay-100">
                                {{ __('translate.aboutSpecSub') }}
                            </p>

                            <div class="block_services">
                                @php
                                    $specs = [
                                        [
                                            'route' => 'services-webpages',
                                            'title' => __('translate.spec1'),
                                            'sub' => __('translate.spec1Sub'),
                                        ],
                                        [
                                            'route' => 'services-mobileapps',
                                            'title' => __('translate.spec2'),
                                            'sub' => __('translate.spec2Sub'),
                                        ],
                                        [
                                            'route' => 'services-bitrix',
                                            'title' => __('translate.spec3'),
                                            'sub' => __('translate.spec3Sub'),
                                        ],
                                    ];
                                @endphp

                                <ul class="flex flex-col md:flex-row md:gap-6 gap-4">
                                    @foreach ($specs as $spec)
                                        <li
                                            class="flex-1 group bg-[#3d1414] rounded-2xl shadow-xl p-6 transition duration-300 hover:shadow-2xl hover:-translate-y-1 hover:bg-[#e31f25]">
                                            <a href="/{{ $lang }}/{{ $spec['route'] }}" class="block h-full">
                                                <h3
                                                    class="text-white mb-3 relative group-hover:text-black transition">
                                                    {{ $spec['title'] }}
                                                    <span
                                                        class="absolute bottom-0 left-0 w-8 h-1 bg-white rounded-full transition-all duration-300 group-hover:w-full group-hover:bg-black"></span>
                                                </h3>
                                                <p class="text-gray-300 text-sm leading-relaxed group-hover:text-white">
                                                    {!! nl2br($spec['sub']) !!}
                                                </p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                    
                    {{-- <section>
                        <h2>{{ __('translate.aboutPartnerTitle') }}</h2>
                        <p>{{ __('translate.abtLtmstudio3') }} </p>
                    </section> --}}

                    <section>
                        <h2>{{ __('translate.aboutTeamTitle') }}</h2>
                        <p>{{ __('translate.aboutTeamSub') }} </p>
                        <p>{{ __('translate.aboutTeamSub2') }} </p>
                        <ul class="criteria">
                            @for ($i = 1; $i <= 18; $i++)
                                <li>
                                    <p>{!! nl2br(__('translate.teamQ' . $i)) !!}</p>
                                </li>
                            @endfor
                        </ul>
                        <p>{!! nl2br(__('translate.aboutFooterSub')) !!}
                            <a href=""><strong>{{ __('translate.mailHr') }}</strong></a>
                            {{ __('translate.aboutFooterSubCont') }}
                        </p>
                    </section>
                </div>
            </div>
        </div>

    @endsection
 
    