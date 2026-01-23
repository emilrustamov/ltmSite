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
                        <div class="col flex-column slide-text">
                            <h2 class="slide-title">{{ $p->translation($lang)?->title ?? '' }}</h2>
                            <a class="slide-a"
                                href="/{{ $lang }}/portfolio/{{ $p->slug }}">{{ __('translate.readMore') }}</a>
                        </div>
                        @if ($p->getFirstMediaUrl('portfolio-images', 'webp'))
                            <img class="image-container lazyload"
                                 data-lazy="{{ $p->getFirstMediaUrl('portfolio-images', 'webp') }}"
                                 alt="{{ $p->translation($lang)?->title ?? 'Image' }}"
                                 loading="lazy">
                        @else
                            <img class="image-container lazyload"
                                 data-lazy="{{ asset('storage/' . $p->photo) }}"
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
    @if (session('success'))
        <div style="background: linear-gradient(135deg, #10B981, #059669); color: white; padding: 20px; margin: 20px; border-radius: 10px; text-align: center; font-size: 18px; font-weight: bold; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);">
            <i class="fas fa-check-circle" style="font-size: 24px; margin-right: 10px;"></i>
            {{ session('success') }}
        </div>
    @endif

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
            <form action="{{ route('contact.submit', ['lang' => $lang]) }}" method="post" id="contact-form-main">
                @csrf
                {{-- Honeypot поле (скрытое) --}}
                <input type="text" 
                       name="website" 
                       id="website" 
                       tabindex="-1" 
                       autocomplete="off" 
                       style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;"
                       aria-hidden="true">
                
                {{-- Скрытые поля для защиты от спама --}}
                <input type="hidden" name="recaptcha_token" id="recaptcha_token_main">
                <input type="hidden" name="form_started_at" id="form_started_at_main">
                
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
                    style="">{{ __('translate.sendText') }}</button>
            </form>
        </div>
    </section>

    @if(config('services.recaptcha.site_key'))
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    @endif
    
    <script>
        (function() {
            const form = document.getElementById('contact-form-main');
            if (!form) return;
            
            const formStartedAtInput = document.getElementById('form_started_at_main');
            const recaptchaTokenInput = document.getElementById('recaptcha_token_main');
            const recaptchaSiteKey = @json(config('services.recaptcha.site_key'));
            
            // Записываем время начала заполнения формы
            if (formStartedAtInput) {
                formStartedAtInput.value = Math.floor(Date.now() / 1000);
            }
            
            // Обработка отправки формы с reCAPTCHA
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (typeof grecaptcha !== 'undefined' && recaptchaSiteKey) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute(recaptchaSiteKey, {action: 'submit_contact'})
                            .then(function(token) {
                                if (recaptchaTokenInput) {
                                    recaptchaTokenInput.value = token;
                                }
                                form.submit();
                            })
                            .catch(function(error) {
                                console.error('reCAPTCHA error:', error);
                                alert('Ошибка проверки безопасности. Пожалуйста, попробуйте еще раз.');
                            });
                    });
                } else {
                    // Если reCAPTCHA не настроена, отправляем форму напрямую
                    form.submit();
                }
            });
        })();
    </script>

@endsection
