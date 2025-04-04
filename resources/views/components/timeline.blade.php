<section>
    <h2 class="text-center">Этапы нашей работы</h2>
    <section class="ag-section m60">
        <div class="ag-format-container">
            <div class="js-timeline ag-timeline">
                <div class="js-timeline_line ag-timeline_line">
                    <div class="js-timeline_line-progress ag-timeline_line-progress"></div>
                </div>
                <div class="ag-timeline_list">
                    <div class="js-timeline_item ag-timeline_item">
                        <div class="ag-timeline-card_box">
                            <div class="js-timeline-card_point-box ag-timeline-card_point-box">

                            </div>
                        </div>
                        <div class="ag-timeline-card_item">
                            <div class="ag-timeline-card_inner">
                                <div class="ag-timeline-card_img-box">
                                </div>
                                <div class="ag-timeline-card_info">
                                    <div class="ag-timeline-card_title">Анализ и подготовка</div>
                                    <div class="ag-timeline-card_desc">
                                        Сначала мы изучаем требования проекта, определяем его цели и задачи, исследуем
                                        аудиторию и конкурентов. Это позволяет создать план и выбрать подходящие
                                        технологии
                                        для успешного выполнения проекта.
                                    </div>
                                </div>
                            </div>
                            <div class="ag-timeline-card_arrow"></div>
                        </div>
                    </div>

                    <div class="js-timeline_item ag-timeline_item">
                        <div class="ag-timeline-card_box">
                            <div class="js-timeline-card_point-box ag-timeline-card_point-box">
                                <div class="ag-timeline-card_point"><span class="dot"></span></div>
                            </div>

                        </div>
                        <div class="ag-timeline-card_item">
                            <div class="ag-timeline-card_inner">
                                <div class="ag-timeline-card_img-box">
                                </div>
                                <div class="ag-timeline-card_info">
                                    <div class="ag-timeline-card_title">Проектирование и дизайн
                                    </div>
                                    <div class="ag-timeline-card_desc">
                                        Разрабатываем структуру и концепцию сайта, создаем макеты и прототипы страниц.
                                        Далее
                                        переходим к разработке дизайна, подбираем шрифты, цвета и графические элементы,
                                        которые соответствуют бренду и целям.
                                    </div>
                                </div>
                            </div>
                            <div class="ag-timeline-card_arrow"></div>
                        </div>
                    </div>

                    <div class="js-timeline_item ag-timeline_item">
                        <div class="ag-timeline-card_box">
                            <div class="js-timeline-card_point-box ag-timeline-card_point-box">
                                <div class="ag-timeline-card_point"><span class="dot"></span></div>
                            </div>
                        </div>
                        <div class="ag-timeline-card_item">
                            <div class="ag-timeline-card_inner">
                                <div class="ag-timeline-card_img-box">
                                </div>
                                <div class="ag-timeline-card_info">
                                    <div class="ag-timeline-card_title">Разработка и функционал
                                    </div>
                                    <div class="ag-timeline-card_desc">
                                        Реализуем основные функции сайта: от форм обратной связи до интеграций с
                                        внешними
                                        сервисами и системами управления контентом. Внедряем все необходимые инструменты
                                        для
                                        стабильной работы сайта.
                                    </div>
                                </div>
                            </div>
                            <div class="ag-timeline-card_arrow"></div>
                        </div>
                    </div>

                    <div class="js-timeline_item ag-timeline_item">
                        <div class="ag-timeline-card_box">
                            <div class="js-timeline-card_point-box ag-timeline-card_point-box">
                                <div class="ag-timeline-card_point"><span class="dot"></span></div>
                            </div>
                        </div>
                        <div class="ag-timeline-card_item">
                            <div class="ag-timeline-card_inner">
                                <div class="ag-timeline-card_img-box">
                                </div>
                                <div class="ag-timeline-card_info">
                                    <div class="ag-timeline-card_title">Тестирование и отладка</div>
                                    <div class="ag-timeline-card_desc">
                                        Перед запуском проводим полное тестирование сайта на разных устройствах и в
                                        браузерах. Исправляем ошибки, оптимизируем скорость и производительность для
                                        обеспечения комфортного пользовательского опыта.
                                    </div>
                                </div>
                            </div>
                            <div class="ag-timeline-card_arrow"></div>
                        </div>
                    </div>

                    <div class="js-timeline_item ag-timeline_item">
                        <div class="ag-timeline-card_box">
                            <div class="js-timeline-card_point-box ag-timeline-card_point-box">
                                <div class="ag-timeline-card_point"><span class="dot"></span></div>
                            </div>
                        </div>
                        <div class="ag-timeline-card_item">
                            <div class="ag-timeline-card_inner">
                                <div class="ag-timeline-card_img-box">
                                </div>
                                <div class="ag-timeline-card_info">
                                    <div class="ag-timeline-card_title">Запуск и поддержка</div>
                                    <div class="ag-timeline-card_desc">
                                        После финальных проверок загружаем сайт на хостинг и запускаем его. Обучаем
                                        заказчика управлению проектом и оказываем дальнейшую поддержку для его развития
                                        и
                                        обновления.
                                    </div>
                                </div>
                            </div>
                            <div class="ag-timeline-card_arrow"></div>
                        </div>
                    </div>
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

            // Helper function to get element's document offsetTop
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
                // Calculate the top offset for the timeline line
                const firstItem = agTimelineItems[0];
                const firstPoint = firstItem.querySelector(pointSelector);
                const firstItemOffset = getOffsetTop(firstItem);
                const firstPointOffset = getOffsetTop(firstPoint);
                const topVal = firstPointOffset - firstItemOffset;

                // Calculate the bottom offset for the timeline line
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

                // Toggle active class based on scroll position
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
