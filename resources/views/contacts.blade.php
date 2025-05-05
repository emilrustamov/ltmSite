@extends('layouts.base')
@section('title', 'Контакты Lebizli Tehnologiya Merkezi (LTM) в Туркменистане')
@section('ogTitle', 'Контакты Lebizli Tehnologiya Merkezi (LTM) в Туркменистане')
@section('metaDesc', 
    'Свяжитесь с Lebizli Tehnologiya Merkezi (LTM) в Туркменистане! IT-компания предлагает разработку сайтов, мобильных приложений и внедрение Bitrix24. Контакты для связи и консультаций.')
@section('metaKey', 
    'контакты Lebizli Tehnologiya Merkezi, LTM контакты, IT-компания в Туркменистане, консультация Bitrix24 Туркменистан, разработка сайтов Туркменистан')

@section('metaDesc', __('metaDescContacts'))
@section('metaKey', __('metaKeyContacts'))
@section('content')
    <section>
        <div class="container mx-auto">
            <div>
                <h1>{{ __('translate.contacts') }}</h1>
                <div class="contacts flex flex-wrap">
                    <div class="w-full md:w-7/12 md:mb-0 mb-10">
                        <div class="contacts_info">
                            <div class="contacts_desc">
                                {{-- <h2>{{ __('translate.contactsTitle') }}</h2> --}}
                                <p class="desc_p">{!! nl2br(__('translate.contactsSub')) !!}</br>
                                    г. Ашхабад, 2127 ул. (Г. Кулиева), здание "Gökje" 26A
                                    {!! nl2br(__('translate.contactsSubCont')) !!}<a href="https://www.google.com/maps?q=37.956556,58.426333"
                                        target="_blank" class="desc_p !text-[#e31e24] ">{{ __('translate.map') }}</a>
                                </p>
                            </div>

                            @php
                                $contactsLinks = [
                                    [
                                        'icon' => 'fa fa-envelope',
                                        'href' => 'mailto:info@ltm.studio',
                                        'text' => 'info@ltm.studio',
                                    ],
                                    [
                                        'icon' => 'fa-brands fa-linkedin',
                                        'href' => 'http://linkedin.com/company/ltmstudio',
                                        'text' => 'linkedin.com/company/ltmstudio',
                                    ],
                                    [
                                        'icon' => 'fa-brands fa-instagram',
                                        'href' => 'http://instagram.com/ltmstudio',
                                        'text' => 'instagram.com/ltmstudio',
                                    ],
                                ];
                            @endphp

                            <ul class="mb-5 !list-none">
                                @foreach ($contactsLinks as $link)
                                    <li>
                                        <div class="flex items-center space-x-2 my-2">
                                            <i class="{{ $link['icon'] }} text-red-500"></i>
                                            <a href="{{ $link['href'] }}" class="text-white">{{ $link['text'] }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <button id="suggestProject" class="flex items-center px-5 bg-[var(--primary)] relative group">
                                <p>{{ __('translate.sugProject') }}</p>
                                <span
                                    class="after:content-[''] after:block after:w-[30px] after:h-[30px] after:mt-[8px] after:ml-[40px] after:bg-contain after:bg-no-repeat after:bg-[url('/assets/images/long-arrow-right.png')] after:transition-transform after:duration-200 group-hover:after:translate-x-[10px]"></span>
                            </button>
                        </div>
                    </div>

                    <div class="w-full md:w-5/12">
                        <div class="flex flex-col justify-center items-center relative w-full">
                            <!-- Надпись ДЗЫНЬ-ДЗЫНЬ -->
                            <h3
                                class="text-[#f8052d] font-bold text-xl md:text-2xl lg:text-3xl text-center mb-2 animate-pulse-slow">
                                {{ __('translate.dzynDzyn') }}!!!
                            </h3>

                            <!-- Телефон -->
                            <div class="mb-4">
                                <img data-src="{{ asset('/assets/images/phoneLightRed.png') }}" alt="phone icon"
                                    class="w-16 h-16 mx-auto mb-2 lazyload" />
                                <div class="font-bold text-3xl md:text-5xl text-center">
                                    <a href="tel:+99312753713">+993 12 75 37 13</a>
                                </div>
                                <div class="font-bold text-3xl md:text-5xl text-center">
                                    <a href="tel:+99361009792">+993 61 00 97 92</a>
                                </div>
                            </div>

                            <!-- Задний текст -->
                            <div class="sub-text-under-content absolute left-0 right-0 bottom-0 z-[-1] text-center text-[#1c1b1b] text-opacity-15 font-bold leading-none text-2xl sm:text-3xl md:text-[60px]"
                                style="text-shadow: -1px 0 #f8052d, 0 1px #f8052d, 1px 0 #f8052d, 0 -1px #f8052d;">
                                {!! nl2br(__('translate.contactsBackText')) !!}
                            </div>

                            <!-- Голубь -->
                            <div class="mt-10">
                                <div class="mb-4">
                                    <img data-src="{{ asset('/assets/images/doveLightRed.png') }}" alt="dove icon"
                                        class="w-16 h-16 mx-auto lazyload" />
                                </div>
                                <div class="text-center text-xl md:text-2xl">
                                    <a href="mailto:info@ltm.studio">
                                        {!! nl2br(__('translate.pigeon')) !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
