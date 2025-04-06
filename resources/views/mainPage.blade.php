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
@section('ruLink', 'https://ltm.studio/ru/')
@section('enLink', 'https://ltm.studio/en/')
@section('tkLink', 'https://ltm.studio/tk/')

<section class="mainSlider">
    <h1 class="text-center container">
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
        @endforeach
    </div>
</section>
@endsection


@section('serv-slider')
@include('components.services')
@endsection

@section('content')

<div class="feedback-section section container relative">
    {{-- <div class="red-circle-feedback">
        <img src="{{ asset('/assets/images/pseudo-red.png') }}" alt="" loading="lazy">
    </div> --}}
    <h2  itemprop="name">
        {!! nl2br(__('translate.titleForm')) !!}
    </h2>
    <div>
        <p>{{ __('translate.descForm') }}</p>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger w-50">

            <p>{{ __('translate.formError') }}</p>
        </div>
    @endif
    <div >
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
            <label class="field">
                <input type="text" name="message" class="field-input w-100"
                    placeholder="{{ __('translate.formComment') }}">
            </label>
            <button type="sumbit"
                class="btn send-p text-[32px] lg:text-[60px] font-bold tracking-[3px] d-flex align-items-center text-white p-0"
                style="">{{ __('translate.sendText') }}</button>
        </form>
    </div>
</div>

@endsection
