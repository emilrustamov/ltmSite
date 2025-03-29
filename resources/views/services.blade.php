@extends('layouts.base')

@section('title', 'Услуги IT-компании LTM Studio в Туркменистане')
@section('circles')
    <div class="circle-1">
        <img src="{{ '../assets/images/circle-1.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-3">
        <img src="{{ '../assets/images/circle-3.png' }}" alt="" loading="lazy">
    </div>
    <!-- <div class="circle-4">
                                                        <img src="{{ '../assets/images/circle-4.png' }}" alt="" loading="lazy">
                                                    </div> -->
    <div class="circle-5">
        <img src="{{ '../assets/images/circle-5.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-7">
        <img src="{{ '../assets/images/circle-6.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-6">
        <img src="{{ '../assets/images/radialCircle.png' }}" width="707px" loading="lazy">
    </div>
@endsection
@section('content')

    <div class="servicesPage">
        <div class="servicesIntro">
            <div class="h"></div>

            <div class="column left">

                <h1 class="title"> {!! nl2br(__('translate.title')) !!} </h1>

                <div class="subt">
                    <div class="p1">{{ __('translate.p1') }}</div>
                    <div class=" p1">{{ __('translate.p1_2') }} <span class="serv-p1">{{ __('translate.p1_2_custom') }}
                        </span>
                        {{ __('translate.p1_2_cont') }}
                    </div>
                </div>
            </div>
            <div class="column right">
                <div> {!! nl2br(__('translate.lampText')) !!}</div>

                <img src="{{ '../assets/images/image.png' }}" loading="lazy">
            </div>
        </div>
    </div>
@endsection

@section('sec-serv-slider')
    <div class="red-circle-serv">
        <img src="{{ asset('/assets/images/pseudo-red.png') }}" alt="" loading="lazy">
    </div>
    @include('components.services')
@endsection

@section('sec-content')
    @include('components.timeline')
    <div class="emoji d-flex flex-column justify-content-center">
        <p> {{ __('translate.emoji') }}</p>
        <p>🤞🖖✌️</p>
    </div>

    <div class="servicesBody">
        <div class="title">
            {{ __('translate.qualityTitle') }}
        </div>
        <div class="sub">{{ __('translate.qualitySub') }}</div>
        <ul>
            <li>
                <div class="item-1">{{ __('translate.q1_title') }} </div>
                <div class="item-2">{{ __('translate.q1_sub') }}</div>
            </li>
            <li>
                <div class="item-1">{{ __('translate.q2_title') }}</div>
                <div class="item-2">{{ __('translate.q2_sub') }}</div>
            </li>
            <li>
                <div class="item-1">{{ __('translate.q3_title') }}</div>
                <div class="item-2">{{ __('translate.q3_sub') }}</div>
            </li>
            <li>
                <div class="item-1">{{ __('translate.q4_title') }}</div>
                <div class="item-2">{{ __('translate.q4_sub') }}</div>
            </li>
            <li>
                <div class="item-1">{{ __('translate.q5_title') }} </div>
                <div class="item-2">{{ __('translate.q5_sub') }}</div>
            </li>
            <li>
                <div class="item-1">{{ __('translate.q6_title') }}</div>
                <div class="item-2">{{ __('translate.q6_sub') }}</div>
            </li>
            <li>
                <div class="item-1">{{ __('translate.q7_title') }}</div>
                <div class="item-2">{{ __('translate.q7_sub') }}</div>
            </li>
        </ul>
    </div>
 
    <div class="servicesQuestions" style="margin-bottom:120px">
        <p>
            <strong>{{ __('translate.questionTitle') }}</strong>
            <br> {{ __('translate.questionSub') }}
            <strong> <a href="/{{ $lang }}/faq" class="no-line"><span class="serv-p1">
                        {{ __('translate.questionSubCustom') }} </span></a></strong>
        </p>
        <p>{{ __('translate.call') }}<a class="serv-p1 no-line" href="tel:+99312753713">{!! nl2br(__('translate.number')) !!}</a>
            <strong><a class="no-line" href="mailto:info@ltm.studio">{{ __('translate.write_to_email') }}<span
                        class="serv-p1"> {{ __('translate.mail') }}
                    </span> </a></strong>
        </p>
    </div>
@endsection
