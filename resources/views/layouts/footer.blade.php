<footer itemscope itemtype="http://schema.org/WPFooter">
    <div class="footer_container row">
        <div class="copyrights col-lg-4 col-12"><?php echo date('Y'); ?>. LTM Studio -
            {{ __('translate.copyright') }}
        </div>
        <div class="expand-text col-lg-4 col-12" id="openModalButton">
            {{ __('translate.leftRequest') }}
        </div>
        <ul class="col-lg-4 col-12 text-center">

            <li><a href="https://www.instagram.com/ltmstudio/"> Inst</a></li>

            <li><a href="https://tm.linkedin.com/company/ltmstudio/">Ln</a></li>
        </ul>
        <div id="modal" class="modal" style="height:100%">
            <div class="modal-overlay">
                <div class="modal-content">
                    <button id="closeModalButton" class="close-modal"><i class="fa-solid fa-xmark"></i></button>
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-7 col-12">
                                <div class="form-container d-flex flex-column align-items-start" style="flex-wrap:wrap">
                                    <div class="col d-flex flex-column">
                                        <div class="modal-title d-flex flex-column align-items-start ml-3">
                                            <div class="start">{{ __('translate.formModalTitle') }}</div>
                                            <p class="start-desc">{{ __('translate.formModalDesc') }}</p>
                                        </div>
                                        <form action="{{ route('contact.submit', ['lang' => $lang]) }}" method="post">
                                            @csrf
                                            <div class="row d-flex">
                                                <label class="field">
                                                    <input type="text" name="name" class="field-input"
                                                        placeholder="{{ __('translate.formName') }}">
                                                </label>
                                                <label class="field">
                                                    <input type="text" name="phone" class="field-input"
                                                        placeholder="{{ __('translate.formPhone') }}">
                                                </label>
                                            </div>
                                            <div class="row d-flex">
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
                                                class="btn send-p d-flex align-items-center text-white">{{ __('translate.sendText') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 d-flex flex-column">
                                <div class="contacts_request">
                                    <div
                                        class="d-flex align-items-center position-relative flex-column justify-content-center">
                                        <div class="dzin position-relative">
                                            <div class="dzin_title">
                                                <img src="{{ '../assets/images/dzin__title.png' }}" loading="lazy">
                                            </div>
                                            <div class="dzin_icon">
                                                <img src="{{ '../assets/images/phoneLightRed.png' }}" loading="lazy">
                                            </div>
                                            <div class="dzin_phone"><a href="tel:+99312753713" class="no-line">+993 12
                                                    75 37 13</a></div>
                                            <div class="dzin_phone"><a href="tel:+99361009792" class="no-line">+993 61
                                                    00 97 92</a></div>
                                            <div class="sub-text-under-content">{!! nl2br(__('translate.contactsBackText')) !!}</div>
                                        </div>
                                        <div class="mail">
                                            <div class="mail_icon"><img src="{{ '../assets/images/doveLightRed.png' }}"
                                                    loading="lazy"></div>
                                            <div class="mail_title"><a href="mailto:info@ltm.studio"
                                                    class="no-line">{!! nl2br(__('translate.pigeon')) !!}</a></div>
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
