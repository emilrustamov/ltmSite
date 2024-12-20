@extends('layouts.base')

@section('circles')
<div class="bitrix-box-deco">
    <img src="{{ asset('/assets/images/bitrixbox.png') }}" alt="" loading="lazy">
</div>
@endsection
@section('content')
<p class="regular17 m45">Битрикс24 помогает бизнесу работать</p>
<h1 class="page-title m45">Облачная версия</h1>
<p class="regular20 m45">Битрикс24 – это набор полезных инструментов, которые помогают бизнесу работать и
    </br>выстроить руководителю эффективную работу в своем коллективе: </p>
<ul class="m60 styled-list">
    <li class="regular20">Онлайн-офис для совместной работы</li>
    <li class="regular20">Современная CRM, в которой есть всё</li>
    <li class="regular20">Задачи и проекты</li>
    <li class="regular20">Ваш личный AI-помощник CoPilot</li>
    <li class="regular20">Сайты и лендинги – в простом конструкторе</li>
    <li class="regular20">Интернет-магазин за 120 секунд*</li>
</ul>
<div class="services_buttons m60">
    <a href="/{{ $lang }}/services" class="btn first no-line m-auto"><span>{{ __('translate.allServ') }}</span></a>
</div>
<p class="bold30 m45">Переходите на новый уровень управления вашим бизнесом с "Битрикс24" коробочной версией уже
    сегодня!</p>
<div class="gridCon m60">
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/rupor.svg' }}" width="57" loading="lazy">
            <h2>{{ __('translate.servTitle1') }}</h2>
            <hr>

            <h3>{{ __('translate.servSubTitle1') }}</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/rupor.svg' }}" width="57" loading="lazy">
            <h2>{{ __('translate.servTitle2') }}</h2>
            <hr>

            <h3>{{ __('translate.servSubTitle2') }}</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/diagnostic.svg' }}" width="57" loading="lazy">
            <h2>{{ __('translate.servTitle3') }}</h2>
            <hr>
            <h3>{{ __('translate.servSubTitle3') }}</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/diagnostic.svg' }}" width="57" loading="lazy">
            <h2>{{ __('translate.servTitle4') }}</h2>
            <hr>

            <h3>{{ __('translate.servSubTitle4') }}</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/search-engine.svg' }}" width="57" loading="lazy">
            <h2>{{ __('translate.servTitle5') }}</h2>
            <hr>

            <h3>{{ __('translate.servSubTitle5') }} </h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/rupor.svg' }}" width="57" loading="lazy">
            <h2>{{ __('translate.servTitle6') }}</h2>
            <hr>

            <h3>{{ __('translate.servSubTitle6') }}</h3>
        </div>
    </div>


</div>
<p class="bold40 m45">Отзывы клиентов</p>
<div class="review-cards-block m45">
    <div class="review-card-item">
        <div class="d-flex">
            <img src="{{ asset('/assets/images/mocklogo.svg') }}" alt="" loading="lazy">
            <div class="d-flex flex-column">
                <p class="company-title">TechVision</p>
                <p class="company-spec">Разработка мобильных приложений и UX/UI дизайна</p>
            </div>
        </div>
        <p class="review-desc">После внедрения Битрикс24 мы смогли централизовать управление проектами и значительно
            улучшить взаимодействие между отделами. Благодаря этому все задачи выполняются быстрее и качественнее.</p>
    </div>

    <div class="review-card-item">
        <div class="d-flex">
            <img src="{{ asset('/assets/images/middlelogo.png') }}" alt="" loading="lazy">
            <div class="d-flex flex-column">
                <p class="company-title">GreenTech Solutions</p>
                <p class="company-spec">Компания в области экологических технологий</p>
            </div>
        </div>
        <p class="review-desc">Благодаря автоматизации с Битрикс24 мы оптимизировали процесс взаимодействия с клиентами
            и
            партнерами. Теперь у нас есть четкая система управления, которая помогает нам экономить время и ресурсы.</p>
    </div>

    <div class="review-card-item">
        <div class="d-flex">
            <img src="{{ asset('/assets/images/colourfullogo.png') }}" alt="" loading="lazy">
            <div class="d-flex flex-column">
                <p class="company-title">LogiTrack Systems</p>
                <p class="company-spec">Логистика и управление цепочками поставок</p>
            </div>
        </div>
        <p class="review-desc">Интеграция Битрикс24 значительно упростила наши внутренние процессы. Мы смогли лучше
            организовать контроль за поставками и ускорить работу с нашими клиентами. Все данные теперь всегда под
            рукой.</p>
    </div>
</div>

<p class="regular20 m45">Мы не стремимся делать то, что мы не умеем, но и не боимся совершать что-то новое в освоении
    свежих решений, мы растем и улучшается наш результат</p>

@include('components.timeline')
@include('components.bitrix')
<p class="bold40 m45">В чём наша компетенция</p>
<p class="regular20 m45">Мы не стремимся делать то, что мы не умеем, но и не боимся совершать что-то новое в освоении
    свежих решений, мы растем и улучшается наш результат</p>
<div class="certificate-cards-block">
    <div class="certificate-item">
        <img src="{{ asset('/assets/images/cert1bitrix.png') }}" alt="" loading="lazy">
    </div>
    <div class="certificate-item">
        <img src="{{ asset('/assets/images/cert2bitrix.png') }}" alt="" loading="lazy">
    </div>
    <div class="certificate-item">
        <img src="{{ asset('/assets/images/cert3bitrix.png') }}" alt="" loading="lazy">
    </div>
</div>
<div class="about_company ">
    <div class="small-container">
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
@endsection