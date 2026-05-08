<section>
    <div class="flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-7/12 flex">
            <div class="large-text-wrap relative">
                <div class="absolute text-[rgba(255,0,0,0.1)] text-[6rem] lg:text-[12rem] leading-[0.9] capitalize opacity-[0.4] font-bold"
                    data-side-text style="transform: translate(0%, -22.0837%) translate3d(0px, 0px, 0px);">
                    {!! nl2br(__('translate.weAreBest')) !!}
                </div>
            </div>
            <div>
                <div class="shortDesc md:max-w-[90%]">
                    <h3 class="about_company_title">
                        <span class="redline redline-1">{{ __('translate.moreThan1') }}</span><br>
                        <span class="redline redline-2">{{ __('translate.moreThan2') }}</span>
                    </h3>
                    
                    
                    <div>
                        <p class="opacity-50">{{ __('translate.aboutUsFooter1') }}</p>
                        <p class="opacity-50">{{ __('translate.aboutUsFooter2') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-5/12">
            <div class="flex">
                <div class="h-128 overflow-y-auto">
                    <p class="opacity-50">{{ __('translate.aboutUsFooter3') }}</p>
                    <p class="mt-5 opacity-50">{{ __('translate.aboutUsFooter4') }}</p>
                    <p class="mt-5 opacity-50">{{ __('translate.aboutUsFooter5') }}</p>
                    <p class="mt-5 opacity-50">{{ __('translate.aboutUsFooter6') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const title = document.querySelector(".about_company_title");

        const observer = new IntersectionObserver(
            ([entry]) => {
                if (entry.isIntersecting) {
                    title.classList.add("revealed");
                } else {
                    title.classList.remove("revealed");
                }
            },
            {
                threshold: 0.5
            }
        );

        if (title) {
            observer.observe(title);
        }
    });
</script>





