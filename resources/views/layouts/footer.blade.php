<footer itemscope itemtype="http://schema.org/WPFooter">
    <div class="footer_container flex flex-wrap mx-auto max-w-full justify-around px-5 text-[2rem] text-center">
        <div class="copyrights w-full lg:w-1/3">
            <?php echo date('Y'); ?>. LTM Studio - {{ __('translate.copyright') }}
        </div>
        <div class="expand-text w-full lg:w-1/3 relative overflow-hidden group" id="openModalButton">
            <span
                class="block transform translate-y-[50%] font-bold text-6xl transition-transform duration-300 group-hover:-translate-y-[10%]">
                {{ __('translate.leftRequest') }}
            </span>
        </div>
        <ul class="flex justify-center items-center gap-4 w-full lg:w-1/3">
            <li><a href="https://www.instagram.com/ltmstudio/" class="hover:underline">Inst</a></li>
            <li><a href="https://tm.linkedin.com/company/ltmstudio/" class="hover:underline">Ln</a></li>
        </ul>
        <div id="modal" class="modal" style="height:100%">
            <div class="modal-overlay">
                <div class="modal-content">
                    <button id="closeModalButton" class="close-modal"><i class="fa-solid fa-xmark"></i></button>
                    <div class="container">
                        <div class="flex flex-wrap justify-center items-center">
                            <div class="w-full lg:w-[58.3333%]">
                                <div class="form-container flex flex-col flex-wrap items-start">
                                    <div class="flex flex-col">
                                        <div class="modal-title flex flex-col items-start ml-3">
                                            <div class="start text-[72px] uppercase tracking-[6px]">
                                                {{ __('translate.formModalTitle') }}</div>
                                            <p class="start-desc">{{ __('translate.formModalDesc') }}</p>
                                        </div>
                                        <form action="{{ route('contact.submit', ['lang' => $lang]) }}" method="post">
                                            @csrf
                                            <div class="flex flex-wrap gap-4">
                                                <label class="field">
                                                    <input type="text" name="name" class="field-input"
                                                        placeholder="{{ __('translate.formName') }}">
                                                </label>
                                                <label class="field">
                                                    <input type="text" name="phone" class="field-input"
                                                        placeholder="{{ __('translate.formPhone') }}">
                                                </label>
                                            </div>
                                            <div class="flex flex-wrap gap-4">
                                                <label class="field">
                                                    <input type="text" name="subject" class="field-input"
                                                        placeholder="{{ __('translate.formProject') }}">
                                                </label>
                                                <label class="field">
                                                    <input type="text" name="email" class="field-input"
                                                        placeholder="{{ __('translate.formEmail') }}">
                                                </label>
                                            </div>
                                            <input type="text" name="message" class="field-input field-textarea mt-5"
                                                placeholder="{{ __('translate.formComment') }}">
                                            <button type="submit"
                                                class="send-p btn !flex items-center text-white text-[60px] font-bold tracking-[3px]">
                                                {{ __('translate.sendText') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-5/12 flex flex-col">
                                <div class="contacts_request">
                                    <div class="flex flex-col relative justify-center items-center">
                                        <div class="dzin relative">
                                            <div class="dzin_title">
                                                <img src="{{ '../assets/images/dzin__title.png' }}" loading="lazy">
                                            </div>
                                            <div class="dzin_icon">
                                                <img src="{{ '../assets/images/phoneLightRed.png' }}" loading="lazy">
                                            </div>
                                            <div class="dzin_phone">
                                                <a href="tel:+99312753713">+993 12 75 37 13</a>
                                            </div>
                                            <div class="dzin_phone">
                                                <a href="tel:+99361009792">+993 61 00 97 92</a>
                                            </div>
                                            <div class="sub-text-under-content">
                                                {!! nl2br(__('translate.contactsBackText')) !!}
                                            </div>
                                        </div>
                                        <div class="mail">
                                            <div class="mail_icon">
                                                <img src="{{ '../assets/images/doveLightRed.png' }}" loading="lazy">
                                            </div>
                                            <div class="mail_title">
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
    </div>
</footer>
