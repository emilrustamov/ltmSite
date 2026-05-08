@extends('layouts.base')

@section('title', __('translate.titleMain'))
@section('ogTitle', __('translate.titleMain'))
@section('metaDesc', __('translate.metaDescMain'))
@section('metaKey', __('translate.metaKeyMain'))
@section('custom-slider')

    <section class="mainSlider">
        <h1 class="text-center container">
            {{ __('translate.home_h1') }}
        </h1>

        <div class="carousel-custom ">
            @foreach ($projects as $p)
                <div class="carousel-custom-item">
                    <a href="/{{ $lang }}/portfolio/{{ $p->slug }}">
                        @php($imageVersion = $p->updated_at?->timestamp ?? $p->id)
                        <div class="col flex-column slide-text">
                            <h2 class="slide-title">{{ $p->translation($lang)?->title ?? '' }}</h2>
                            <a class="slide-a"
                                href="/{{ $lang }}/portfolio/{{ $p->slug }}">{{ __('translate.readMore') }}</a>
                        </div>
                        @if ($p->getFirstMediaUrl('portfolio-images', 'webp'))
                            <img class="image-container lazyload"
                                 data-lazy="{{ $p->getFirstMediaUrl('portfolio-images', 'webp') }}?v={{ $imageVersion }}"
                                 alt="{{ $p->translation($lang)?->title ?? 'Image' }}"
                                 loading="lazy">
                        @else
                            <img class="image-container lazyload"
                                 data-lazy="{{ asset('storage/' . $p->photo) }}?v={{ $imageVersion }}"
                                 alt="{{ $p->translation($lang)?->title ?? 'Image' }}"
                                 loading="lazy">
                        @endif
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
    <section class="container">
        {{-- <div class="red-circle-feedback">
        <img src="{{ asset('/assets/images/pseudo-red.png') }}" alt="" loading="lazy">
    </div> --}}
        <h2 itemprop="name">
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
        <div>
            <form action="{{ route('contact.submit') }}" method="post" id="contact-form-main" data-protected-form="true" data-recaptcha-action="submit_contact">
                @csrf
                <x-protected-form-fields id-prefix="main" />
                
                <label class="field">
                    <input type="text" name="name" class="field-input w-100"
                        placeholder="{{ __('translate.formName') }}" required>
                </label>
                <label class="field">
                    <input type="text" name="phone" class="field-input w-100"
                        placeholder="{{ __('translate.formPhone') }}" required>
                </label>
                <label class="field">
                    <input type="text" name="subject" class="field-input w-100"
                        placeholder="{{ __('translate.formProject') }}" required>
                </label>
                <label class="field">
                    <input type="email" name="email" class="field-input w-100"
                        placeholder="{{ __('translate.formEmail') }}" required>
                </label>
                <label class="field">
                    <input type="text" name="message" class="field-input w-100"
                        placeholder="{{ __('translate.formComment') }}" required>
                </label>
                <button type="submit"
                    class="btn send-p text-[32px] lg:text-[60px] font-bold tracking-[3px] d-flex align-items-center text-white p-0"
                    style="" data-form-submit>{{ __('translate.sendText') }}</button>
            </form>
        </div>
    </section>

@endsection
