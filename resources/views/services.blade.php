@extends('layouts.base')

@section('title',  __('translate.titleServices'))
@section('ogTitle', __('translate.titleServices'))
@section('metaDesc', __('translate.metaDescServices'))
@section('metaKey', __('translate.metaKeyServices'))
@section('circles')
    <div class="circle-1">
        <img src="{{ '../assets/images/circle-1.png' }}" alt="Circle 1" loading="lazy">
    </div>
    <div class="circle-3">
        <img src="{{ '../assets/images/circle-3.png' }}" alt="Circle 3" loading="lazy">
    </div>
    <div class="circle-4">
        <img src="{{ '../assets/images/circle-4.png' }}" alt="Circle 4" loading="lazy">
    </div>
    <div class="circle-5">
        <img src="{{ '../assets/images/circle-5.png' }}" alt="Circle 5" loading="lazy">
    </div>
    <div class="circle-7">
        <img src="{{ '../assets/images/circle-6.png' }}" alt="Circle 6" loading="lazy">
    </div>
    <div class="circle-6">
        <img src="{{ '../assets/images/radialCircle.png' }}" alt="Radial Circle" width="707px" loading="lazy">
    </div>
@endsection



@section('content')
    <section class="relative">
        <div class=" container">
            <div class="md:max-w-[90%]">
                <h1> {!! nl2br(__('translate.title')) !!} </h1>
                <div class="text-[2.4rem]">
                    <p class="mb-5">{{ __('translate.p1') }}</p>
                    <p class="mb-5">{{ __('translate.p1_2') }}
                        <span class="text-red-500">{{ __('translate.p1_2_custom') }}</span> {{ __('translate.p1_2_cont') }}
                    </p>
                </div>
            </div>
            <img src="{{ '../assets/images/image.png' }}" loading="lazy"
            class="lamp hidden xl:block absolute right-0 top-0 md:w-[25%]">
       
            <div class="hidden xl:block absolute right-100 top-0 text-2xl italic"> {!! nl2br(__('translate.lampText')) !!} </div>
        </div>
    </section>
    @include('components.services')
@endsection


@section('sec-content')
    @include('components.timeline')
    {{-- <div class="relative text-white font-normal text-5xl leading-[1.6] text-center pb-20 flex flex-col justify-center">
        <h4> {{ __('translate.emoji') }}</h4>
        <p>🤞🖖✌️</p>
    </div> --}}

    <div class="servicesBody">
        <h2 class="mb-5">{{ __('translate.qualityTitle') }}</h2>
        <div class="text-3xl my-10 md:my-20">{{ __('translate.qualitySub') }}</div>

        <ul class="flex flex-wrap gap-6 !list-none m-0 p-0">
            @for ($i = 1; $i <= 7; $i++)
                <li
                    class="relative flex-[1_1_100%] sm:flex-[1_1_48%] lg:flex-[1_1_30%] max-w-full sm:max-w-[48%] lg:max-w-[30%] pl-10 pr-8 pb-8 leading-[1.5]">
                    <span class="absolute left-0 top-[13px] -translate-y-1/2 bg-[#e4abab] w-5 h-5 rounded-full"></span>
                    <div class="font-semibold mb-3">{{ __('translate.q' . $i . '_title') }}</div>
                    <div class="font-light text-[#b2afb2]">{{ __('translate.q' . $i . '_sub') }}</div>
                </li>
            @endfor
        </ul>
    </div>


    {{-- <div class="text-center">
        <h3>{{ __('translate.questionTitle') }}</h3>
        <br> {{ __('translate.questionSub') }}
        <strong>
            <a href="/{{ $lang }}/faq" class="">
                <span class="text-red-500">{{ __('translate.questionSubCustom') }}</span>
            </a>
        </strong>


        {{ __('translate.call') }}
        <a class="text-red-500" href="tel:+99312753713">{!! nl2br(__('translate.number')) !!}</a>
        <strong>
            <a class="" href="mailto:info@ltm.studio">
                {{ __('translate.write_to_email') }}
                <span class="text-red-500"> {{ __('translate.mail') }} </span>
            </a>
        </strong>
    </div> --}}
@endsection
