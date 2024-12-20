@extends('layouts.base')

@section('circles')
<div class="bitrix-box-deco">
    <img src="{{ asset('/assets/images/bitrixbox.png') }}" alt="" loading="lazy">
</div>
@endsection
@section('content')
<p class="regular17 m45">Битрикс24 помогает бизнесу работать</p>
<h1 class="page-title m45">Коробочная версия</h1>
<p class="regular20 m45">Познакомьтесь с коробочной версией "Битрикс24" - полным набором инструментов для
    </br>автоматизации бизнес-процессов.</p>
<ul class="m60 styled-list">
    <li class="regular20">Полный контроль</li>
    <li class="regular20">Гибкая настройка</li>
    <li class="regular20">Масштабируемость</li>
    <li class="regular20">Высокая производительность</li>
    <li class="regular20">Безопасность данных</li>
    <li class="regular20">Интеграция</li>
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
            <h2>Внутренние коммуникации</h2>
            <hr>

            <h3>Разработка и внедрение систем для эффективного взаимодействия внутри компании. Обеспечивает удобные
                каналы связи и инструменты для обмена информацией между сотрудниками.</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/rupor.svg' }}" width="57" loading="lazy">
            <h2>HR-менеджмент</h2>
            <hr>

            <h3>Создание решений для управления персоналом, которые помогают в подборе, обучении и развитии сотрудников,
                а также в улучшении корпоративной культуры.</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/diagnostic.svg' }}" width="57" loading="lazy">
            <h2>Проектный менеджмент</h2>
            <hr>
            <h3>Инструменты для управления проектами, отслеживания выполнения задач и управления ресурсами. Помогает
                координировать работу команды и достигать целей в срок.</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/diagnostic.svg' }}" width="57" loading="lazy">
            <h2>CRM и управление клиентской базой</h2>
            <hr>

            <h3>Системы для организации работы с клиентами, автоматизация продаж и улучшение взаимодействия с клиентами
                через управление их данными.</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/search-engine.svg' }}" width="57" loading="lazy">
            <h2>Автоматизация продаж</h2>
            <hr>

            <h3>Решения для автоматизации процессов продаж, упрощение воронки продаж и управления клиентами. Повышает
                эффективность работы отдела продаж.
            </h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/rupor.svg' }}" width="57" loading="lazy">
            <h2>CRM-инструменты маркетолога</h2>
            <hr>

            <h3>Инструменты для маркетологов, которые позволяют эффективно работать с клиентскими базами данных,
                запускать таргетированную рекламу и анализировать результаты.</h3>
        </div>
    </div>


    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/protected-user-account.svg' }}" width="57" loading="lazy">
            <h2>Настройка сервиса — под вашим контролем</h2>
            <hr>

            <h3>Разработка и настройка программных решений для бизнеса с возможностью полной кастомизации под нужды
                клиента. Обеспечивает гибкость и индивидуальный подход.</h3>
        </div>
    </div>

    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/accounting.svg' }}" width="57" loading="lazy">
            <h2>Открытый исходный код</h2>
            <hr>

            <h3>Услуги по использованию и внедрению решений с открытым исходным кодом, которые позволяют снизить затраты
                на разработку и увеличить контроль над системой.</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/crm.svg' }}" width="57" loading="lazy">
            <h2>Веб-кластер </h2>
            <hr>

            <h3>Создание и оптимизация веб-инфраструктуры для повышения производительности и устойчивости
                онлайн-сервисов. Включает в себя кластеризацию серверов и поддержку масштабирования.</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/antivirus.svg' }}" width="57" loading="lazy">
            <h2>Виртуальная машина</h2>
            <hr>

            <h3>Виртуализация серверных мощностей для оптимизации IT-инфраструктуры, что позволяет запускать несколько
                операционных систем на одном физическом сервере.</h3>
        </div>
    </div>

    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/website-design.svg' }}" width="57" loading="lazy">
            <h2>Кастомизация</h2>
            <hr>

            <h3>Разработка кастомных решений для автоматизации рабочих процессов, включая корпоративные приложения,
                порталы и внутренние системы, с учетом индивидуальных потребностей бизнеса.</h3>
        </div>
    </div>
    <div class="gridItem">
        <div class="rows-3">
            <img src="{{ '../assets/images/customization.svg' }}" width="57" loading="lazy">
            <h2>Синхронизация данных</h2>
            <hr>

            <h3>Объединение различных систем и сервисов в единую экосистему. Автоматизация передачи данных между
                платформами для повышения эффективности работы и минимизации ручных операций.</h3>
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