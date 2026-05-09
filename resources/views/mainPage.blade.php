@extends('layouts.base')

@section('title', __('translate.titleMain'))
@section('ogTitle', __('translate.titleMain'))
@section('metaDesc', __('translate.metaDescMain'))
@section('metaKey', __('translate.metaKeyMain'))

@section('circles')
    <div class="circle-1">
        <img data-src="{{ asset('webp/circle-1.webp') }}" alt="Circle 1" class="lazyload">
    </div>
    <div class="circle-3">
        <img data-src="{{ asset('webp/circle-3.webp') }}" alt="Circle 3" class="lazyload">
    </div>
    <div class="circle-5">
        <img data-src="{{ asset('webp/circle-5.webp') }}" alt="Circle 5" class="lazyload">
    </div>
    <div class="circle-7">
        <img data-src="{{ asset('webp/radialCircle.webp') }}" alt="Radial Circle" class="lazyload">
    </div>
@endsection

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
        <div>
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
        <div class="rounded-2xl bg-[#9f1a1f] p-6 md:p-8">
            <form action="{{ route('contact.submit') }}" method="post" id="contact-form-main" data-protected-form="true" data-recaptcha-action="submit_contact" data-ajax-submit="true">
                @csrf
                <x-protected-form-fields id-prefix="main" />
                
                <label class="field mb-4">
                    <input type="text" name="name" class="field-input w-100 placeholder:text-sm"
                        placeholder="{{ __('translate.formNamePlaceholder') }}">
                </label>

                <div class="mb-4 grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <label data-preferred-item class="flex items-center gap-2 rounded-[10px] border border-[rgba(0,0,0,0.35)] bg-[rgba(0,0,0,0.18)] px-[14px] py-[12px] text-white cursor-pointer text-[22px] leading-none">
                        <input type="checkbox" name="preferred_contact[]" value="phone" data-preferred-contact checked class="h-5 w-5 rounded border border-[rgba(0,0,0,0.55)] bg-[rgba(0,0,0,0.18)] accent-[#e31e24] focus:outline-none">
                        <span>📞 {{ __('translate.formPreferredPhone') }}</span>
                    </label>
                    <label data-preferred-item class="flex items-center gap-2 rounded-[10px] border border-[rgba(0,0,0,0.35)] bg-[rgba(0,0,0,0.18)] px-[14px] py-[12px] text-white cursor-pointer text-[22px] leading-none">
                        <input type="checkbox" name="preferred_contact[]" value="email" data-preferred-contact class="h-5 w-5 rounded border border-[rgba(0,0,0,0.55)] bg-[rgba(0,0,0,0.18)] accent-[#e31e24] focus:outline-none">
                        <span>📧 {{ __('translate.formPreferredEmail') }}</span>
                    </label>
                    <label data-preferred-item class="flex items-center gap-2 rounded-[10px] border border-[rgba(0,0,0,0.35)] bg-[rgba(0,0,0,0.18)] px-[14px] py-[12px] text-white cursor-pointer text-[22px] leading-none">
                        <input type="checkbox" name="preferred_contact[]" value="social" data-preferred-contact class="h-5 w-5 rounded border border-[rgba(0,0,0,0.55)] bg-[rgba(0,0,0,0.18)] accent-[#e31e24] focus:outline-none">
                        <span>💬 {{ __('translate.formPreferredSocial') }}</span>
                    </label>
                </div>

                <div data-contact-field="phone" class="hidden">
                    <label class="field mb-4">
                        <input type="text" name="phone" class="field-input w-100 placeholder:text-sm"
                            placeholder="{{ __('translate.formPhonePlaceholder') }}">
                    </label>
                </div>

                <div data-contact-field="email" class="hidden">
                    <label class="field mb-4">
                        <input type="email" name="email" class="field-input w-100 placeholder:text-sm"
                            placeholder="{{ __('translate.formEmailPlaceholder') }}">
                    </label>
                </div>

                <div data-contact-field="social" class="hidden">
                    <label class="field mb-4">
                        <input type="text" name="social_contact" class="field-input w-100 placeholder:text-sm"
                            placeholder="{{ __('translate.formSocialContactPlaceholder') }}">
                    </label>
                </div>

                <label class="field mb-5">
                    <input type="text" name="request_text" class="field-input w-100 placeholder:text-sm"
                        placeholder="{{ __('translate.formNeedToFillPlaceholder') }}">
                </label>

                <input type="hidden" name="message" value="">
                <button type="submit"
                    class="btn send-p mt-3 inline-flex items-center justify-center rounded-xl bg-[#e31e24] px-8 py-4 text-[28px] lg:text-[44px] font-bold tracking-[2px] text-white transition-all duration-300 hover:bg-[#ff3a42] hover:scale-[1.02] hover:shadow-[0_0_30px_rgba(227,30,36,0.6)]"
                    data-form-submit>{{ __('translate.sendText') }}</button>
            </form>
        </div>
        </div>
    </section>

@endsection
