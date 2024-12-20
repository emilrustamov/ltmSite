@extends('layouts.base')

@section('title', 'LTM Studio: IT-компания в Туркменистане')
@section('ogTitle', 'LTM Studio: IT-компания в Туркменистане')
@section('metaDesc',
    'IT-компания LTM Studio в Туркменистане предлагает полный комплекс
    профессиональных услуг, от дизайна до разработки веб-сайтов, мобильных приложений, интернер-магазинов и
    системы Битрикс24.')
@section('metaKey',
    'разработка сайтов в Туркменистане, разработка мобильных приложений в Туркменистане, Bitrix CRM в
    Туркменистане, компания разработчиков в Туркрменистане, IT компания в Туркменистане')
@section('custom-slider')
    @if (session('success'))
        <div class="alert alert-success">
            <p style="font-size:18px">{{ session('success') }}</p>
        </div>
    @endif
@section('ruLink', 'https://ltm.studio/ru/');
@section('enLink', 'https://ltm.studio/en/');
@section('tkLink', 'https://ltm.studio/tk/')

<div class="mainSlider ">
    <h1 class="homeTitle container">
        {{ __('translate.home_h1') }}
    </h1>

    <div class="carousel-custom ">
        @foreach ($projects as $p)
            <div class="carousel-custom-item">
                <a href="/{{ $lang }}/portfolio/{{ $p['id'] }}">
                    <div class="col flex-column slide-text">
                        <p class="slide-title">{{ $p['title_' . $lang] }}</p>
                        <a class="slide-a"
                            href="/{{ $lang }}/portfolio/{{ $p['id'] }}">{{ __('translate.readMore') }}</a>
                    </div>
                    <img class="image-container" src="{{ asset('storage/' . $p['photo']) }}" alt="Image"
                        class="" loading="lazy">
                </a>
            </div>
            {{-- </a> --}}
        @endforeach
        {{-- <div class="carousel-custom-item">
                <div class="col flex-column slide-text">
                    <p class="slide-title">Разработка интернет-магазина Stilli Dekor</p>
                    <a class="slide-a no-line">{{ __('translate.readMore') }}</a>
                </div>
                <img class="image-container" src="{{ '../assets/images/portfolio/stilli.jpg' }}" alt="" loading="lazy">
            </div>
            <div class="carousel-custom-item">
                <div class="col flex-column slide-text">
                    <p class="slide-title">Разработка моб. приложения Ak Yayla Shop Scanner</p>
                    <a class="slide-a no-line">{{ __('translate.readMore') }}</a>
                </div>
                <img class="image-container" src="{{ '../assets/images/portfolio/akyayla.jpg' }}" alt="" loading="lazy">
            </div>

            <div class="carousel-custom-item">
                <div class="col flex-column slide-text">
                    <span class="slide-title">Разработка сайта Ashgabat Golf Club</span>
                    <a class="slide-a no-line">{{ __('translate.readMore') }}</a>
                </div>
                <img class="image-container" src="{{ '../assets/images/portfolio/golf.jpg' }}" alt="" loading="lazy">
            </div>
            <div class="carousel-custom-item">
                <div class="col flex-column slide-text">
                    <span class="slide-title">Разработка моб. приложения Kinokompas</span>
                    <a class="slide-a no-line">{{ __('translate.readMore') }}</a>
                </div>
                <img class="image-container" src="{{ '../assets/images/portfolio/kinokompas.jpg' }}" alt="" loading="lazy">
            </div>
            <div class="carousel-custom-item">
                <div class="col flex-column slide-text">
                    <span class="slide-title">Разработка сайта Nidjat</span>
                    <a class="slide-a no-line">{{ __('translate.readMore') }}</a>
                </div>
                <img class="image-container" src="{{ '../assets/images/portfolio/nidjat.jpg' }}" alt="" loading="lazy">
            </div> --}}
    </div>

</div>
@endsection
@section('serv-slider')

<div class="services_content mobile-none section">
    <div class="red-circle-serv">
        <img src="{{ asset('/assets/images/pseudo-red.png') }}" alt="" loading="lazy">
    </div>
    <div class="services_title container">{{ __('translate.myRazbirayemsya') }}</div>
    <div class="container">
        <div class="services serv-slider">

            <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">

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
            <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">

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
            <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">

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
            <div class="serv-custom-item" itemscope itemtype="http://schema.org/Service">

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
    <div class="container d-flex justify-content-center align-items-center">
        <div class="serv-mobile-dots">

        </div>
        <div class="serv-mobile-dots">

        </div>
        <div class="serv-mobile-dots">

        </div>
        <div class="serv-mobile-dots">

        </div>

    </div>
    <div class="services_buttons">
        <a href="/{{ $lang }}/services"
            class="btn first no-line m-auto"><span>{{ __('translate.allServ') }}</span></a>
        <a href="/{{ $lang }}/about_us"
            class="btn second no-line m-auto"><span>{{ __('translate.aboutUs') }}</span></a>
    </div>
</div>

@endsection
@section('content')
<style>
    .followed-element {
        position: relative;
        transform: scale(1);
        /* Добавляем позицию "relative" для корректной работы transform */
        width: 100%;
        /* Задаем ширину по вашему желанию */
        height: 100%;
        /* Задаем высоту по вашему желанию */
        /* overflow: hidden; */
        /* Скрываем все, что выходит за пределы блока */
        transition: transform 1s ease;
    }

    .image-container {
        /* Стили для контейнера изображения */
        transform: scale(1);
        overflow: hidden;
        transition: transform 0.3s ease;
        /* Добавляем анимацию при увеличении */
    }
</style>




<div class="feedback-section section">
    <div class="red-circle-feedback">
        <img src="{{ asset('/assets/images/pseudo-red.png') }}" alt="" loading="lazy">
    </div>
    <h2 class="section_title" itemprop="name">
        {!! nl2br(__('translate.titleForm')) !!}
    </h2>
    <div class="section_desc">
        <p class="cont">{{ __('translate.descForm') }}</p>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger w-50">
            {{-- <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> --}}
            <p style="font-size:18px">{{ __('translate.formError') }}</p>
        </div>
    @endif
    <div class="feedback_form" style="margin: 0 !important">
        <form action="{{ route('contact.submit', ['lang' => $lang]) }}" method="post">
            @csrf
            <label class="field">
                <input type="text" name="name" class="field-input w-100"
                    placeholder="{{ __('translate.formName') }}">
            </label>
            <label class="field">
                <input type="text" name="phone" class="field-input w-100"
                    placeholder="{{ __('translate.formPhone') }}">
            </label>
            <label class="field">
                <input type="text" name="subject" class="field-input w-100"
                    placeholder="{{ __('translate.formProject') }}">
            </label>
            <label class="field">
                <input type="email" name="email" class="field-input w-100"
                    placeholder="{{ __('translate.formEmail') }}">
            </label>
            <label class="field_comment" style="margin: 5rem 0 !important">
                <input type="text" name="message" class="field-input w-100"
                    placeholder="{{ __('translate.formComment') }}">
            </label>
            <button type="sumbit" class="btn send-p d-flex align-items-center text-white"
                style="">{{ __('translate.sendText') }}</button>
        </form>
    </div>
</div>
<div class="about_company row">
    <div class="col-md-7 col-12">
        <div class="large-text-wrap" style="position: relative">
            <div class="side-text-wrapper" data-side-text
                style="transform: translate(0%, -22.0837%) translate3d(0px, 0px, 0px);">
                {!! nl2br(__('translate.weAreBest')) !!}
            </div>
        </div>
        <div class="about_company_left">
            <div class="shortDesc">
                <h2 class="about_company_title" data-separate-word style>
                    <div class="title_back" id="h2"></div>
                    <span class="word">{{ __('translate.moreThan1') }} <br> </span>
                    <div class="title_back" id="h3"></div>
                    <span class="word">{{ __('translate.moreThan2') }}</span>
                </h2>
                <div class="about_company_sml">
                    <p>{{ __('translate.aboutUsFooter1') }}</p>
                    <p>{{ __('translate.aboutUsFooter2') }}</p>
                </div>
            </div>
        </div>
        <details class="desktop-none">
            <summary>
                <div class="d-flex hide-more-block">
                    <p>{{ __('translate.more') }}</p>
                    <div class="hide-more-btn">
                        <i class="fa fa-chevron-down"></i>
                    </div>
                </div>
            </summary>
            <div class="scroll_desc">
                <p class="mt-5">{{ __('translate.aboutUsFooter3') }}</p>
                <p class="mt-5">{{ __('translate.aboutUsFooter4') }}</p>
                <p class="mt-5">{{ __('translate.aboutUsFooter5') }}</p>
                <p class="mt-5">{{ __('translate.aboutUsFooter6') }}</p>
            </div>
        </details>
    </div>
    <div class="col-md-5 about_company_right mobile-none">
        <div class="right_desc">
            <div class="scroll_content">
                <div class="scroll_desc">
                    <p>{{ __('translate.aboutUsFooter3') }}</p>
                    <p class="mt-5">{{ __('translate.aboutUsFooter4') }}</p>
                    <p class="mt-5">{{ __('translate.aboutUsFooter5') }}</p>
                    <p class="mt-5">{{ __('translate.aboutUsFooter6') }}</p>
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

<script>
    const slides = document.querySelectorAll('.image-container');

    slides.forEach((slide) => {
        // Добавляем обработчик для события наведения мыши
        slide.addEventListener('mouseenter', () => {
            // Увеличиваем слайд после наведения мыши
            slide.style.transform = 'scale(1.2)';
        });

        slide.addEventListener('mouseleave', () => {
            // Возвращаем слайд в исходное состояние при уходе курсора
            slide.style.transform = 'scale(1)';
        });

        slide.addEventListener('mousemove', (e) => {
            const {
                offsetX,
                offsetY
            } = e;
            const {
                clientWidth,
                clientHeight
            } = slide;

            // Проверяем, находится ли курсор внутри слайда
            if (offsetX >= 0 && offsetX <= clientWidth && offsetY >= 0 && offsetY <= clientHeight) {
                // Если курсор внутри слайда, то двигаем слайд за курсором
                const x = (offsetX - clientWidth / 2) / 5; // Для плавности можно изменять делитель
                const y = (offsetY - clientHeight / 2) / 5;
                slide.style.transform = `translate(${x}px, ${y}px) scale(1.2)`;
            }
        });
    });
</script>
<script>
    window.onload = function() {
        var errorsExist = document.querySelector('.alert-danger');
        if (errorsExist) {
            document.querySelector('.feedback_form').scrollIntoView();
        }
    };
</script>
@endsection
