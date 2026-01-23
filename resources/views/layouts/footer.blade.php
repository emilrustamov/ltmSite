<footer itemscope itemtype="http://schema.org/WPFooter">
    <div class="flex flex-wrap mx-auto max-w-full justify-around px-4 text-center">
        <div class="w-full lg:w-1/3">
            <h6>
                <?php echo date('Y'); ?>.  Lebizli Tehnologiya Merkezi (LTM) - {{ __('translate.copyright') }}
            </h6>
        </div>
        <div class="expand-text w-full lg:w-1/3 relative overflow-hidden group" id="openModalButton">
            <span class="block transform translate-y-[10%]  md:transform translate-y-[50%] font-bold text-4xl sm:text-5xl md:text-6xl transition-transform duration-300 group-hover:-translate-y-[10%]">
                {{ __('translate.leftRequest') }}
            </span>
        </div>
        <ul class="hidden lg:flex justify-center items-center gap-4 w-full lg:w-1/3 !list-none ">
            <li>
                <a href="https://www.instagram.com/lebizli_tehnologiya_merkezi?igsh=a3ZwZHN3aXdtYzJ5" class="hover:underline !text-[24px]">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/company/ltm-studio/" class="hover:underline !text-[24px]">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
            <script type="text/javascript">
                (function(){
                    var WORKSPACE_VERIFICATION_CODE = 'f351680ba07e89ec449d67ed85310867';
                })();
            </script>
              <li>
            <a href="https://workspace.ru/contractors/ltm/" target="_blank">
                <img src="https://workspace.ru/local/tools/verification.php?code=f351680ba07e89ec449d67ed85310867&type=ver1" alt="LTM на Workspace" width="100" />
            </a>
        </li>
        </ul>
        <!-- Workspace verefication code -->
     
        <div id="modal" class="modal" style="height:100%">
            <div class="modal-overlay">
                <div class="modal-content">
                    <button id="closeModalButton" class="close"><i class="fa-solid fa-xmark"></i></button>
                    <div class="container">
                        <div class="flex flex-wrap justify-center items-center">
                            <div class="w-full lg:w-[58.3333%]">
                                <div >
                                    <div class="flex flex-col">
                                        <div class="modal-title flex flex-col items-start">
                                            <h2 class="uppercase tracking-[6px] text-center ">
                                                {{ __('translate.formModalTitle') }}
                                            </h2>
                                            <p class="hidden md:block">{{ __('translate.formModalDesc') }}</p>
                                        </div>
                                        <form action="{{ route('contact.submit', ['lang' => $lang]) }}" method="post" id="contact-form-footer">
                                            @csrf
                                            {{-- Honeypot поле (скрытое) --}}
                                            <input type="text" 
                                                   name="website" 
                                                   id="website-footer" 
                                                   tabindex="-1" 
                                                   autocomplete="off" 
                                                   style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;"
                                                   aria-hidden="true">
                                            
                                            {{-- Скрытые поля для защиты от спама --}}
                                            <input type="hidden" name="recaptcha_token" id="recaptcha_token_footer">
                                            <input type="hidden" name="form_started_at" id="form_started_at_footer">
                                            
                                            <div class="flex flex-wrap gap-4">
                                                <label class="field">
                                                    <input type="text" name="name" class="field-input"
                                                        placeholder="{{ __('translate.formName') }}" required>
                                                </label>
                                                <label class="field">
                                                    <input type="text" name="phone" class="field-input"
                                                        placeholder="{{ __('translate.formPhone') }}" required>
                                                </label>
                                            </div>
                                            <div class="flex flex-wrap gap-4">
                                                <label class="field">
                                                    <input type="text" name="subject" class="field-input"
                                                        placeholder="{{ __('translate.formProject') }}" required>
                                                </label>
                                                <label class="field">
                                                    <input type="email" name="email" class="field-input"
                                                        placeholder="{{ __('translate.formEmail') }}" required>
                                                </label>
                                            </div>
                                            <input type="text" name="message" class="field-input field-textarea mt-5"
                                                placeholder="{{ __('translate.formComment') }}" required>
                                            <button type="submit"
                                                class="send-p btn !flex items-center text-white text-[32px] lg:text-[60px] font-bold tracking-[3px] p-0">
                                                {{ __('translate.sendText') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-5/12">
                                <div class="flex flex-col justify-center items-center relative w-full">
                                    <!-- Надпись ДЗЫНЬ-ДЗЫНЬ -->
                                    <h3 class="text-[#f8052d] font-bold text-xl md:text-2xl lg:text-3xl text-center mb-2 animate-pulse-slow">
                                        {{ __('translate.dzynDzyn') }}!!!
                                    </h3>
        
                                    <!-- Телефон -->
                                    <div class="mb-4">
                                        <img data-src="{{ asset('/assets/images/phoneLightRed.png') }}" alt="phone icon"
                                            class="w-16 h-16 mx-auto mb-2 lazyload" />
                                        <div class="font-bold text-3xl md:text-5xl text-center">
                                            <a href="tel:+99312753713">+993 12 75 37 13</a>
                                        </div>
                                        <div class="font-bold text-3xl md:text-5xl text-center">
                                            <a href="tel:+99361009792">+993 61 00 97 92</a>
                                        </div>
                                    </div>
        
                                    <!-- Задний текст -->
                                    <div class="sub-text-under-content absolute left-0 right-0 bottom-0 z-[-1] text-center text-[#1c1b1b] text-opacity-15 font-bold leading-none text-2xl sm:text-3xl md:text-[60px]"
                                        style="text-shadow: -1px 0 #f8052d, 0 1px #f8052d, 1px 0 #f8052d, 0 -1px #f8052d;">
                                        {!! nl2br(__('translate.contactsBackText')) !!}
                                    </div>
        
                                    <!-- Голубь -->
                                    <div class="mt-10">
                                        <div class="mb-4">
                                            <img data-src="{{ asset('/assets/images/doveLightRed.png') }}" alt="dove icon"
                                                class="w-16 h-16 mx-auto lazyload" />
                                        </div>
                                        <div class="text-center text-xl md:text-2xl">
                                            <a href="mailto:info@ltm.studio">
                                                {!! nl2br(__('translate.pigeon')) !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(config('services.recaptcha.site_key'))
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    @endif
    
    <script>
        (function() {
            const form = document.getElementById('contact-form-footer');
            if (!form) return;
            
            const formStartedAtInput = document.getElementById('form_started_at_footer');
            const recaptchaTokenInput = document.getElementById('recaptcha_token_footer');
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

</footer>
