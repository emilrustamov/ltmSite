@extends('layouts.base')
@section('title', 'Контакты IT-консалтинговой компании LTM Studio в Туркменистане')
@section('content')
    <section>
        <div class="container mx-auto">
            <div id="contact-contact">
                <h1>{{ __('translate.contacts') }}</h1>
                <div class="contacts flex flex-wrap">
                    <div class="w-full md:w-7/12">

                        <div class="contacts_info">
                            <div class="contacts_desc">
                                {{-- <h2>{{ __('translate.contactsTitle') }}</h2> --}}
                                <p class="desc_p">{!! nl2br(__('translate.contactsSub')) !!}
                                    {{-- <a href="" class="desc_p">{{ __('translate.messenger') }}</a> --}}
                                    {!! nl2br(__('translate.contactsSubCont')) !!}<a href="https://www.google.com/maps?q=37.956556,58.426333"
                                        target="_blank" class="desc_p">{{ __('translate.map') }}</a>
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

                            <ul class="mb-5">
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
                                <span class="after:content-[''] after:block after:w-[30px] after:h-[30px] after:mt-[8px] after:ml-[40px] after:bg-contain after:bg-no-repeat after:bg-[url('/assets/images/long-arrow-right.png')] after:transition-transform after:duration-200 group-hover:after:translate-x-[10px]"></span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="contacts_request w-full md:w-5/12">
                        <div class="d-flex align-items-center relative flex-column justify-content-center">
                            <div class="dzin text-center mb-5 ">
                                <div class="dzin_title">
                                    <img src="{{ '../assets/images/dzin__title.png' }}" loading="lazy">
                                </div>
                                <div class="dzin_icon">
                                    <img src="{{ '../assets/images/phoneLightRed.png' }}" loading="lazy">
                                </div>
                                <div class="dzin_phone font-bold text-5xl">
                                    <a href="tel:+99312753713">+993 12 75 37 13</a>
                                </div>
                                <div class="dzin_phone font-bold text-5xl">
                                    <a href="tel:+99361009792">+993 61 00 97 92</a>
                                </div>
                                <div class="sub-text-under-content">
                                    <span class="text-2xl sm:text-3xl md:text-4xl lg:text-[120px]">
                                        {!! nl2br(__('translate.contactsBackText')) !!}
                                    </span>
                                </div>
                            </div>

                            <div class="mail">
                                <div class="mail_icon">
                                    <img src="{{ '../assets/images/doveLightRed.png' }}" loading="lazy">
                                </div>
                                <div class="mail_title">
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
