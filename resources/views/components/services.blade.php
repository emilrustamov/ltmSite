<div class="container">
    <div class="services_content mobile-none section">
        
        <div class="services_title container">{{ __('translate.myRazbirayemsya') }}</div>
        <div class="container">
            <div class="services serv-slider">
                <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">
                    <div style="padding-right:40px">
                        <h2 class="section_title" itemprop="name">
                            {!! nl2br(__('translate.servTitle1')) !!}
                        </h2>
                        <div class="section_desc">
                            <p itemprop="description">
                                <span>{{ __('translate.servDesc1') }}</span>
                            </p>
                        </div>
                        <a href="/{{ $lang }}/services-webpages"
                            class="services_more">{{ __('translate.readMore') }}</a>
                    </div>
                </div>
                <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">
                    <div style="padding-right:40px">
                        <h2 class="section_title" itemprop="name">
                            {!! nl2br(__('translate.servTitle2')) !!}
                        </h2>
                        <div class="section_desc">
                            <p itemprop="description">
                                <span>{{ __('translate.servDesc2') }}</span>
                            </p>
                        </div>
                        <a href="/{{ $lang }}/services-mobileapps"
                            class="services_more">{{ __('translate.readMore') }}</a>
                    </div>
                </div>
                <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">
                    <div style="padding-right:40px">
                        <h2 class="section_title" itemprop="name">
                            {!! nl2br(__('translate.servTitle3')) !!}
                        </h2>
                        <div class="section_desc">
                            <p itemprop="description">
                                <span>{{ __('translate.servDesc3') }}</span>
                            </p>
                        </div>
                        <a href="/{{ $lang }}/services-bitrix"
                            class="services_more">{{ __('translate.readMore') }}</a>
                    </div>
                </div>
                <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">
                    <div style="padding-right:40px">
                        <h2 class="section_title" itemprop="name">
                            {!! nl2br(__('translate.servTitle4')) !!}
                        </h2>
                        <div class="section_desc">
                            <p itemprop="description">
                                <span>{{ __('translate.servDesc4') }}</span>
                            </p>
                        </div>
                        <a href="/{{ $lang }}/services-bcloud"
                            class="services_more">{{ __('translate.readMore') }}</a>
                    </div>
                </div>
            </div>
        </div>
    
    
        <div class="container">
            <ul class="services_dots">
                <li>
                    <button class="services-dot"><span>{!! nl2br(__('translate.servTitle1')) !!}</span></button>
                </li>
                <li>
                    <button class="services-dot"><span>{!! nl2br(__('translate.servTitle2')) !!}</span></button>
                </li>
                <li>
                    <button class="services-dot"><span>{!! nl2br(__('translate.servTitle3')) !!}</span></button>
                </li>
                <li>
                    <button class="services-dot"><span>{!! nl2br(__('translate.servTitle4')) !!}</span></button>
                </li>
            </ul>
            <div class="services_buttons">
                <a href="/{{ $lang }}/services"
                    class="btn first no-line"><span>{{ __('translate.allServ') }}</span></a>
                <a href="/{{ $lang }}/about_us"
                    class="btn second no-line m-auto"><span>{{ __('translate.aboutUs') }}</span></a>
            </div>
        </div>
    </div>


    {{-- for phone resolution --}}
    <div class="services_content desktop-none">
        <div class="services_title container text-center">{{ __('translate.myRazbirayemsya') }}</div>
        <div class="services-mobile-slider">
            <div class="serv-mobile-item d-flex flex-column justify-content-between">
                <div>
                    <p class="serv-mobile-p">{{ __('translate.servTitle1') }}</p>
                    <div class="section_desc">
                        <p>
                            <span>{{ __('translate.servDesc1') }}</span>
                        </p>
                    </div>
                </div>
                {{-- <a href="" class="services_more serv-mobile-a no-line align-self-end">Узнать больше</a> --}}
            </div>
            <div class="serv-mobile-item d-flex flex-column justify-content-between">
                <div>
                    <p class="serv-mobile-p">{{ __('translate.servTitle2') }}</p>
                    <div class="section_desc">
                        <p>
                            <span>{{ __('translate.servDesc2') }}</span>
                        </p>
                    </div>
                </div>
                {{-- <a href="" class="services_more serv-mobile-a no-line align-self-end">Узнать больше</a> --}}
            </div>
            <div class="serv-mobile-item d-flex flex-column justify-content-between">
                <div>
                    <p class="serv-mobile-p">{{ __('translate.servTitle3') }}</p>
                    <div class="section_desc">
                        <p>
                            <span>{{ __('translate.servDesc3') }}</span>
                        </p>
                    </div>
                </div>
                {{-- <a href="" class="services_more serv-mobile-a no-line align-self-end">Узнать больше</a> --}}
            </div>
            <div class="serv-mobile-item d-flex flex-column justify-content-between">
                <div>
                    <p class="serv-mobile-p">{{ __('translate.servTitle4') }}</p>
                    <div class="section_desc">
                        <p>
                            <span>{{ __('translate.servDesc4') }}</span>
                        </p>
                    </div>
                </div>
                {{-- <a href="" class="services_more serv-mobile-a no-line align-self-end">Узнать больше</a> --}}
            </div>
    
        </div>
        {{-- <div class="container d-flex justify-content-center align-items-center">
            <div class="serv-mobile-dots">
    
            </div>
            <div class="serv-mobile-dots">
    
            </div>
            <div class="serv-mobile-dots">
    
            </div>
            <div class="serv-mobile-dots">
    
            </div>
    
        </div> --}}
        <div class="services_buttons">
            <a href="/{{ $lang }}/services"
                class="btn first no-line m-auto"><span>{{ __('translate.allServ') }}</span></a>
            <a href="/{{ $lang }}/about_us"
                class="btn second no-line m-auto"><span>{{ __('translate.aboutUs') }}</span></a>
        </div>
    </div>
</div>