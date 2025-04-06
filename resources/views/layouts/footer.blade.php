<footer itemscope itemtype="http://schema.org/WPFooter">
    <div class="flex flex-wrap mx-auto max-w-full justify-around px-4 text-center">
        <div class="w-full lg:w-1/3">
            <h6>
                <?php echo date('Y'); ?>. LTM Studio - {{ __('translate.copyright') }}
            </h6>
        </div>
        <div class="expand-text w-full lg:w-1/3 relative overflow-hidden group" id="openModalButton">
            <span class="block transform translate-y-[10%]  md:transform translate-y-[50%] font-bold text-4xl sm:text-5xl md:text-6xl transition-transform duration-300 group-hover:-translate-y-[10%]">
                {{ __('translate.leftRequest') }}
            </span>
        </div>
        <ul class="hidden lg:flex justify-center items-center gap-4 w-full lg:w-1/3">
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
                                <div >
                                    <div class="flex flex-col">
                                        <div class="modal-title flex flex-col items-start">
                                            <h2 class="uppercase tracking-[6px] text-center ">
                                                {{ __('translate.formModalTitle') }}
                                            </h2>
                                            <p class="hidden md:block">{{ __('translate.formModalDesc') }}</p>
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
                                        <img src="{{ asset('/assets/images/phoneLightRed.png') }}" alt="phone icon"
                                            class="w-16 h-16 mx-auto mb-2" />
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
                                            <img src="{{ asset('/assets/images/doveLightRed.png') }}" alt="dove icon"
                                                class="w-16 h-16 mx-auto" />
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
</footer>
