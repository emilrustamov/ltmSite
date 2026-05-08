<section>
    <h2 class="text-center">{{ __('translate.timeline.heading') }}</h2>
    <section>
        <div class="relative">
            <div class="js-timeline ag-timeline">
                <div class="js-timeline_line ag-timeline_line">
                    <div class="js-timeline_line-progress ag-timeline_line-progress"></div>
                </div>
                <div class="ag-timeline_list">
                    @php
                        $timelineSteps = __('translate.timeline.steps');
                    @endphp

                    @foreach ($timelineSteps as $step)
                        <div class="js-timeline_item ag-timeline_item">
                            <div class="ag-timeline-card_box">
                                <div class="js-timeline-card_point-box ag-timeline-card_point-box">
                                    @if (!$loop->first)
                                        <div class="ag-timeline-card_point">
                                            <span class="inline-block w-[60%] h-[60%] rounded-full bg-white"></span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="ag-timeline-card_item p-4">
                                <div class="ag-timeline-card_inner">
                                    <div class="text-left">
                                        <h3>{{ $step['title'] }}</h3>
                                        <p>{{ $step['description'] }}</p>
                                    </div>
                                </div>
                                <div class="ag-timeline-card_arrow"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cache DOM elements
            const agTimeline = document.querySelector(".js-timeline");
            const agTimelineLine = document.querySelector(".js-timeline_line");
            const agTimelineLineProgress = document.querySelector(".js-timeline_line-progress");
            const agTimelineItems = Array.from(document.querySelectorAll(".js-timeline_item"));
            const pointSelector = ".js-timeline-card_point-box";

            let agOuterHeight = window.outerHeight;
            let agHeight = window.innerHeight;
            let agPosY = window.pageYOffset;
            let f = -1;
            let agFlag = false;


            function getOffsetTop(elem) {
                return elem.getBoundingClientRect().top + window.pageYOffset;
            }

            function fnOnScroll() {
                agPosY = window.pageYOffset;
                fnUpdateFrame();
            }

            function fnOnResize() {
                agPosY = window.pageYOffset;
                agHeight = window.innerHeight;
                fnUpdateFrame();
            }

            function fnUpdateWindow() {
                agFlag = false;

                const firstItem = agTimelineItems[0];
                const firstPoint = firstItem.querySelector(pointSelector);
                const firstItemOffset = getOffsetTop(firstItem);
                const firstPointOffset = getOffsetTop(firstPoint);
                const topVal = firstPointOffset - firstItemOffset;
                const lastItem = agTimelineItems[agTimelineItems.length - 1];
                const lastPoint = lastItem.querySelector(pointSelector);
                const timelineOffset = getOffsetTop(agTimeline);
                const lastPointOffset = getOffsetTop(lastPoint);
                const bottomVal = timelineOffset + agTimeline.offsetHeight - lastPointOffset;

                agTimelineLine.style.top = topVal + "px";
                agTimelineLine.style.bottom = bottomVal + "px";

                if (f !== agPosY) {
                    f = agPosY;
                    fnUpdateProgress();
                }
            }

            function fnUpdateProgress() {
                const lastItem = agTimelineItems[agTimelineItems.length - 1];
                const lastPoint = lastItem.querySelector(pointSelector);
                const i = getOffsetTop(lastPoint);
                const a = getOffsetTop(agTimelineLineProgress);
                let n = agPosY - a + agOuterHeight / 2;
                if (i <= agPosY + agOuterHeight / 2) {
                    n = i - a;
                }
                agTimelineLineProgress.style.height = n + "px";
                agTimelineItems.forEach(item => {
                    const point = item.querySelector(pointSelector);
                    const pointOffset = getOffsetTop(point);
                    if (pointOffset < agPosY + 0.5 * agOuterHeight) {
                        item.classList.add("js-ag-active");
                    } else {
                        item.classList.remove("js-ag-active");
                    }
                });
            }

            function fnUpdateFrame() {
                if (!agFlag) {
                    requestAnimationFrame(fnUpdateWindow);
                    agFlag = true;
                }
            }

            // Attach event listeners
            window.addEventListener("scroll", fnOnScroll);
            window.addEventListener("resize", fnOnResize);
        });
    </script>
</section>