<footer itemscope itemtype="http://schema.org/WPFooter">
    <div class="footer_container row">
        <div class="copyrights col-lg-4 col-12"><?php echo date('Y'); ?>. LTM Studio -
            {{ __('translate.copyright') }}
        </div>
        <div class="expand-text col-lg-4 col-12" id="openModalButton">
            {{ __('translate.leftRequest') }}
        </div>
        <div id="modal" class="modal" style="height:100%">
            <div class="modal-overlay">
                <div class="modal-content align-items-start">
                    <div class="col-7 content-container  my-5">
                        <div class="form-container d-flex flex-column align-items-start"
                            style="max-width:115rem; flex-wrap:wrap">
                            <div class="col d-flex flex-column">
                                <div class="modal-title d-flex flex-column align-items-start ml-3"
                                    style="margin-bottom:7.7rem; margin-top:50px">
                                    <div class ="start"> {{ __('translate.formModalTitle') }}</div>
                                    <p class="start-desc" style="font-size:18px"> {{ __('translate.formModalDesc') }}
                                    </p>
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
                                    <button type="sumbit" class="btn send-p d-flex align-items-center text-white"
                                        style=""> {{ __('translate.sendText') }}</button>
                                </form>
                            </div>


                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 d-flex flex-column  ">
                            <div class="contacts_request">
                                <div class="sub-text-under-content footer">

                                    {!! nl2br(__('translate.contactsBackText')) !!}
                                </div>
                                <button id="closeMobileModalButton" class="close-modal"><i class="fa-solid fa-xmark"
                                        style="font-size:18px"></i></button>
                                <div class="dzin">
                                    <div class="dzin_title">
                                        <img src="{{ asset('assets/images/dzin__title.png') }}">
                                    </div>
                                    <div class="dzin_icon">
                                        <img src="{{ asset('assets/images/phoneLightRed.png') }}">
                                    </div>
                                    <div class="dzin_phone">+993 12 75 37 13</div>
                                    <div class="dzin_phone">+993 61 00 97 92</div>
                                </div>
                                <div class="mail">
                                    <div class="mail_icon"> <img src="{{ asset('assets/images/doveLightRed.png') }}">
                                    </div>
                                    <div class="mail_title">{!! nl2br(__('translate.pigeon')) !!}</div>
                                    <div class="mail_title">info@ltm.studio</div>
                                </div>
                                <p class="col-5 col-md-9"
                                    style="font-size:42px; font-weight:700; font-family:'Bebas Neue'">
                                    {!! nl2br(__('translate.formFunny')) !!}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-content-mobile desktop-none flex-column">
                {{-- <div style="background-color:red"> я тут!!!!<button id="closeModalButton" class="close-modal"><svg class="svg-inline--fa fa-xmark" style="font-size: 18px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark" style="font-size:18px"></i> Font Awesome fontawesome.com --></button></div> --}}
                <div class="form-container ">
                    <div class="d-flex flex-column">
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
                        <div class="modal-title d-flex flex-column align-items-start ml-3"
                            style="margin-bottom:7.7rem; margin-top:50px">
                            <div class ="start">{{ __('translate.formModalTitle') }}</div>
                            <button id="closeModalButton" class="close-modal"><i class="fa-solid fa-xmark"
                                    style="font-size:18px"></i></button>
                            <p style="font-size:18px; text-align: start">{{ __('translate.formModalDesc') }}</p>
                        </div>
                        <div class="row d-flex">
                            <label class="field">
                                <input type="text" name="name" class="field-input"
                                    placeholder="{{ __('translate.formName') }}">
                            </label>
                            <label class="field">
                                <input type="text" name="name" class="field-input"
                                    placeholder="{{ __('translate.formPhone') }}">
                            </label>
                        </div>
                        <div class="row d-flex">
                            <label class="field">
                                <input type="text" name="name" class="field-input"
                                    placeholder="{{ __('translate.formProject') }}">
                            </label>
                            <label class="field">
                                <input type="text" name="name" class="field-input"
                                    placeholder="{{ __('translate.formEmail') }}">
                            </label>
                        </div>
                        <input type="text" name="name" class="field-input field-textarea mt-5" style="margin-left: 10px !important"
                            placeholder="{{ __('translate.formComment') }}">
                    </div>

                    <p class="send-p d-flex align-items-center" style="margin-top:80px">
                        {{ __('translate.sendText') }}</p>

                </div>
                <div class="contacts_request">

                    <div class="dzin">
                        <div class="dzin_title">
                            <img src="{{ asset('assets/images/dzin__title.png') }}">
                        </div>
                        <div class="dzin_icon">
                            <img src="{{ asset('assets/images/phoneLightRed.png') }}">
                        </div>
                        <div class="dzin_phone">+993 61 00 97 92</div>
                        <div class="dzin_phone">+993 12 75 37 13</div>
                    </div>
                    <div class="mail">
                        <div class="mail_icon"> <img src="{{ asset('assets/images/doveLightRed.png') }}"></div>
                        <div class="mail_title w-line">{!! nl2br(__('translate.pigeon')) !!}</div>
                        <div class="mail_title">info@ltm.studio</div>
                    </div>
                    <p class="col-5 col-lg-5 col-md-9"
                        style="font-size:42px; font-weight:700; font-family:'Bebas Neue'">
                        {!! nl2br(__('translate.formFunny')) !!}</p>
                </div>
            </div>
        </div>
        <ul class="col-lg-4 col-12 text-center">

            <li><a href="https://www.instagram.com/ltmstudio/"> Inst</a></li>

            <li><a href="https://tm.linkedin.com/company/ltmstudio/">Ln</a></li>
        </ul>

    </div>
</footer>
