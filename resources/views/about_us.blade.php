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
    <img src="{{ '../assets/images/radialCircle.png' }}" width="707px" style="z-index: 1;">
</div>
<div class="circle-3">
    <img src="{{ '../assets/images/circle-3.png' }}" alt="" loading="lazy">
</div>
<div class="circle-5">
    <img src="{{ '../assets/images/circle-5.png' }}" alt="" loading="lazy">
</div>
@endsection
@section('content')
{{-- <div class="container"> --}}
    <div class="aboutUs_content">
        <div class="aboutUs_desc">
            <div class="about-us-photo" style="backface-visibility: hidden; transform: translate3d(0px, 0px, 0px);">
            </div>
            <div class="about-lines-container"> </div>
           
            <h1 style="">{{ __('translate.aboutUsTitle') }}</h1>
            {{-- <p class="header-sub"> {{ __('translate.aboutSub') }}
                <a href="">Remote agency</a>
                {{ __('translate.aboutSubCont') }}
            </p>
            <p class="hugeFont"><strong>{{ __('translate.aboutTitle') }}</strong></p> --}}

            <p></p>
            <p class="regular20">{{ __('translate.abtLtmstudio') }}</p>
            <figure class="block_quote">
                <blockquote>
                    <p>{{ __('translate.aboutP2') }} {{ __('translate.aboutP2custom') }} 
                        {{ __('translate.aboutP2cont') }}</p>
                </blockquote>
            </figure>
            <!-- <p class="regular20">{{ __('translate.aboutP3') }}
                <a href="">{{ __('translate.aboutP3custom') }} </a>{{ __('translate.aboutP3cont') }}
            </p> -->
            <p class="regular20">{!! nl2br(__('translate.abtLtmstudio1')) !!}
            </p>
            {{-- <h2>Remote agency</h2>
            <p class="descFont">{{ __('translate.aboutP5') }}</p>
            <p></p> --}}
            <h2>{{ __('translate.history') }}</h2>
            <p class="regular20">{!! nl2br(__('translate.aboutHistory')) !!}</p>

            <h2>{{ __('translate.aboutStatistics') }}</h2>
            <div class="aboutUs_stats">
                <div class="about-us-photo-2" style="backface-visibility: hidden;
                    transform: translate3d(0px, -143px, 0px)"></div>
                <div class="about-us-photo-3" style="transform: translate3d(0px, -158px, 0px)"></div>
                <ul class="stats">
                    <li>
                        <div class="stats_count" data-target="5+">0</div>
                        <div class="stats_desc">{{ __('translate.years') }}</div>
                    </li>
                    <li>
                        <div class="stats_count" data-target="20+">0</div>
                        <div class="stats_desc">{{ __('translate.projects') }}</div>
                    </li>
                    <li>
                        <div class="stats_count" data-target="20+">0</div>
                        <div class="stats_desc">{{ __('translate.clients') }}</div>
                    </li>
                    <li>
                        <div class="stats_count" data-target="20+">0</div>
                        <div class="stats_desc">{{ __('translate.satClients') }}</div>
                    </li>
                    <li>
                        <div class="stats_count" data-target="589+">0</div>
                        <div class="stats_desc">{{ __('translate.redBull') }}</div>
                    </li>
                </ul>

                <div class="aboutUs_stats_footer">
                    {!! nl2br(__('translate.aboutPerfect')) !!}
                </div>
            </div>
            <h2>{{ __('translate.valueTitle') }}</h2>
            <p class="descFont">{{ __('translate.valueSub') }}</p>
            <div class="aboutUs_virtues">
                <div class="about-us-photo-4" style="backface-visibility: hidden;
                    transform: translate3d(0px, -187px, 0px);"></div>
                <div class="about-us-photo-5"></div>
                <ul class="valuesList mobile-none">
                    <li class="valueList_item">
                        <div class="item_column">
                            <div class="num">01</div>
                            <div class="item_title">{{ __('translate.value1') }}</div>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.value1Sub')) !!}</div>
                        </div>
                    </li>

                    <li class="valueList_item">
                        <div class="item_column">
                            <div class="num">02</div>
                            <div class="item_title">{{ __('translate.value2') }}</div>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.value2Sub')) !!}</div>
                        </div>
                    </li>

                    <li class="valueList_item">
                        <div class="item_column">
                            <div class="num">03</div>
                            <div class="item_title">{{ __('translate.value3') }}</div>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.value3Sub')) !!}</div>
                        </div>
                    </li>
                </ul>
                <ul class="valuesList desktop-none">
                    <li class="valueList_item">
                        <div class="item_column">
                            <div class="num">01</div>
                            <div class="item_title">{{ __('translate.value1') }}</div>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.value1SubMobile')) !!}</div>
                        </div>
                    </li>

                    <li class="valueList_item">
                        <div class="item_column">
                            <div class="num">02</div>
                            <div class="item_title">{{ __('translate.value2') }}</div>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.value2SubMobile')) !!}</div>
                        </div>
                    </li>

                    <li class="valueList_item">
                        <div class="item_column">
                            <div class="num">03</div>
                            <div class="item_title">{{ __('translate.value3') }}</div>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.value3SubMobile')) !!}</div>
                        </div>
                    </li>
                </ul>

                <!-- <p class="descFont">{{ __('translate.valueSubCont') }}</p> -->

                {{-- <img src="{{ '../assets/images/arassanusga-certificate-banner.jpg' }}" alt="" loading="lazy"
                    height="400" class="p-auto d-flex flex-start"> --}}

                <!-- <div class="aboutUs_certificates">
                    <ul style="margin: 0">
                        <li><img src="{{'../assets/images/certificates/certificate1.webp'}}" alt="" loading="lazy"
                                loading="lazy"> </li>
                        <li><img src="{{'../assets/images/certificates/certificate2.webp'}}" alt="" loading="lazy"
                                loading="lazy"> </li>
                        <li><img src="{{'../assets/images/certificates/certificate3.webp'}}" alt="" loading="lazy"
                                loading="lazy"> </li>
                        <li><img src="{{'../assets/images/certificates/certificate4.webp'}}" alt="" loading="lazy"
                                loading="lazy"> </li>
                        <li><img src="{{'../assets/images/certificates/certificate5.webp'}}" alt="" loading="lazy"
                                loading="lazy"> </li>
                        <li><img src="{{'../assets/images/certificates/certificate6.webp'}}" alt="" loading="lazy"
                                loading="lazy"> </li>

                    </ul>
                    <div class="certificates_info">
                        <div class="stats_count">15+</div>
                        <div class="certificates-info_desc"> {{ __('translate.exp') }}</div>
                    </div>
                </div> -->

                {{-- <p class="descFont">
                    {{ __('translate.valueJobs') }}
                </p> --}}
            </div>
            <h2>{{ __('translate.aboutSpecTitle') }}</h2>
            <p class="descFont">{{ __('translate.aboutSpecSub') }}</p>
            <div class="block_services">
                <ul class="valuesList">
                    <li class="valueList_item">
                        <div class="item_column">
                            <h3 class="item_title"><a class="no-line" href="/{{ $lang }}/services-webpages">{{ __('translate.spec1') }}</a></h3>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.spec1Sub')) !!}</div>
                        </div>
                    </li>

                    <li class="valueList_item">
                        <div class="item_column">
                            <h3 class="item_title"><a class="no-line" href="/{{ $lang }}/services-mobileapps">{{ __('translate.spec2') }}</a></h3>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.spec2Sub')) !!}</div>
                        </div>
                    </li>

                    <li class="valueList_item">
                        <div class="item_column">
                            <h3 class="item_title"><a class="no-line" href="/{{ $lang }}/services-bitrix">{{ __('translate.spec3') }}</a></h3>
                            <hr>
                            <div class="item_desc"> {!! nl2br(__('translate.spec3Sub')) !!}</div>
                        </div>
                    </li>
                    <!-- <li class="valueList_item">
                            <div class="item_column">
                                <h3 class="item_title">{{ __('translate.spec4') }}</h3>
                                <hr>
                                <div class="item_desc"> {!! nl2br(__('translate.spec4Sub')) !!}</div>
                            </div> -->
                    </li>
                </ul>
            </div>

            <h2>{{ __('translate.aboutPartnerTitle') }}</h2>
            <p class="descFont">{{ __('translate.abtLtmstudio3') }} </p>

            <h2>{{ __('translate.aboutTeamTitle') }}</h2>
            <p class="descFont">{{ __('translate.aboutTeamSub') }} </p>
            <p class="descFont">{{ __('translate.aboutTeamSub2') }} </p>
            <ul class="criteria">
                <li>
                    <p> {{ __('translate.teamQ1') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ2') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ3') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ4') }}</p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ5') }} </p>
                </li>
                <li>
                    <p> {!! nl2br(__('translate.teamQ6')) !!} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ7') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ8') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ9') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ10') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ11') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ12') }}</p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ13') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ14') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ15') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ16') }} </p>
                </li>
                <li>
                    <p> {{ __('translate.teamQ17') }}</p>
                </li>
                <li>
                    {{-- <p> {{ __('translate.teamQ18') }}</p> --}}
                </li>
            </ul>
            <p class="descFont">{!! nl2br(__('translate.aboutFooterSub')) !!}
                <a href=""><strong>{{ __('translate.mailHr') }}</strong></a>
                {{ __('translate.aboutFooterSubCont') }}
            </p>
        </div>
    </div>
    <div class="about_company ">
        <div class="small-container no-padding">
            <div class="large-text-wrap" style="position: relative">
                <div class="side-text-wrapper" data-side-text
                    style="transform: translate(0%, -22.0837%) translate3d(0px, 0px, 0px);">
                    {!! nl2br(__('translate.weAreBest')) !!}

                </div>
            </div>
            <div class="about_company_left">
                <div class="shortDesc">
                    <h2 class="about_company_title" data-separate-word style>
                        <div class="title_back" id="h2">


                        </div>
                        <span class="word">{{ __('translate.moreThan1') }} <br> </span>
                        <div class="title_back" id="h3">


                        </div>
                        <span class="word">{{ __('translate.moreThan2') }}</span>

                    </h2>
                    <div class="about_company_sml">
                        <p>
                            {{ __('translate.aboutUsFooter1') }}
                        </p>

                        <p>{{ __('translate.aboutUsFooter2') }}</p>

                    </div>

                </div>
            </div>
            <details class="desktop-none">
                <summary>
                    <div class="d-flex hide-more-block">
                        <p> {{ __('translate.more') }}</p>
                        <div class="hide-more-btn ">
                            <i class="fa fa-chevron-down"></i>
                        </div>
                    </div>
                </summary>
                <div class="scroll_desc" style="padding-bottom: 20px;">
                    <p class="mt-5"> {{ __('translate.aboutUsFooter3') }}</p>

                    <p class="mt-5"> {{ __('translate.aboutUsFooter4') }}</p>

                    <p class="mt-5"> {{ __('translate.aboutUsFooter5') }}</p>
                    <p class="mt-5"> {{ __('translate.aboutUsFooter6') }}</p>
                </div>
            </details>

            <div class="about_company_right mobile-none">
                <div class="right_desc">

                    <div class="scroll_content" style="padding-right: 20px; margin-bottom: -20px;">
                        <div class="scroll_desc" style="padding-bottom: 20px;">
                            <p class="mt-5"> {{ __('translate.aboutUsFooter3') }}</p>

                            <p class="mt-5"> {{ __('translate.aboutUsFooter4') }}</p>

                            <p class="mt-5"> {{ __('translate.aboutUsFooter5') }}</p>
                            <p class="mt-5"> {{ __('translate.aboutUsFooter6') }}</p>
                        </div>
                    </div>
                </div>
                <div class="hide-more-block desktop-none mobile-none">
                    <p>Скрыть</p>
                    <div class="hide-more-btn">
                        <i class="fa fa-chevron-up"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--
</div> --}}
@endsection