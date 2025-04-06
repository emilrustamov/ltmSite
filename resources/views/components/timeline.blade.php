<section>
    <h2 class="text-center">Этапы нашей работы</h2>
    <section>
        <div class="relative">
            <div class="js-timeline ag-timeline">
                <div class="js-timeline_line ag-timeline_line">
                    <div class="js-timeline_line-progress ag-timeline_line-progress"></div>
                </div>
                <div class="ag-timeline_list">
                    @php
                        $timelineSteps = [
                            [
                                'title' => 'Анализ и подготовка',
                                'description' => 'Сначала мы изучаем требования проекта, определяем его цели и задачи, исследуем аудиторию и конкурентов. Это позволяет создать план и выбрать подходящие технологии для успешного выполнения проекта.'
                            ],
                            [
                                'title' => 'Проектирование и дизайн',
                                'description' => 'Разрабатываем структуру и концепцию сайта, создаем макеты и прототипы страниц. Далее переходим к разработке дизайна, подбираем шрифты, цвета и графические элементы, которые соответствуют бренду и целям.'
                            ],
                            [
                                'title' => 'Разработка и функционал',
                                'description' => 'Реализуем основные функции сайта: от форм обратной связи до интеграций с внешними сервисами и системами управления контентом. Внедряем все необходимые инструменты для стабильной работы сайта.'
                            ],
                            [
                                'title' => 'Тестирование и отладка',
                                'description' => 'Перед запуском проводим полное тестирование сайта на разных устройствах и браузерах. Исправляем ошибки, оптимизируем скорость и производительность для обеспечения комфортного пользовательского опыта.'
                            ],
                            [
                                'title' => 'Запуск и поддержка',
                                'description' => 'После финальных проверок загружаем сайт на хостинг и запускаем его. Обучаем заказчика управлению проектом и оказываем дальнейшую поддержку для его развития и обновления.'
                            ],
                        ];
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

<style>



.ag-timeline_item {
  margin: 0 0 50px;
  position: relative;
}

.ag-timeline_item:nth-child(2n) {
  text-align: right;
}

.ag-timeline {
  display: inline-block;
  width: 100%;
  max-width: 100%;
  margin: 0 auto;
  position: relative;
}

.ag-timeline_line {
  width: 2px;
  background-color: rgba(255, 255, 255, 0.3);
  position: absolute;
  top: 2px;
  left: 50%;
  bottom: 0;
  overflow: hidden;
  transform: translateX(-50%);
}

.ag-timeline_line-progress {
  width: 100%;
  height: 20%;
  background: #e31e24;
}

.ag-timeline-card_box {
  padding: 0 0 20px 50%;
}

.ag-timeline_item:nth-child(2n) .ag-timeline-card_box {
  padding: 0 50% 20px 0;
}

.ag-timeline-card_point-box {
  display: inline-block;
  margin: 0 0px 0 -12px;
}

.ag-timeline_item:nth-child(2n) .ag-timeline-card_point-box {
  margin: 0px -14px 0 0px;
}

.ag-timeline-card_point {
  height: 25px;
  line-height: 25px;
  width: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(283.67deg,
      rgba(255, 255, 255, 0.3) 0%,
      rgba(255, 255, 255, 0.3) 96.25%);
  background-color: #1d1d1b;
  text-align: center;
  font-size: 20px;
  color: #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}

.js-ag-active .ag-timeline-card_point {
  color: red;
  background: linear-gradient(283.67deg,
      var(--primary) 0%,
      var(--primary) 96.25%);
}

.ag-timeline-card_item {
  display: inline-block;
  width: 45%;
  background: rgba(231, 240, 250, 0.3);
  opacity: 0;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.5);
  -o-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.5);
  box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.5);
  -webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
  -moz-transition: -moz-transform 0.5s, opacity 0.5s;
  -o-transition: -o-transform 0.5s, opacity 0.5s;
  transition: all 0.3s ease;
  position: relative;
}

.ag-timeline-card_item:hover {
  background: rgba(255, 255, 255, 0);
}

.js-ag-active.ag-timeline_item:nth-child(2n + 1) .ag-timeline-card_item,
.js-ag-active.ag-timeline_item:nth-child(2n) .ag-timeline-card_item {
  opacity: 1;
  transform: translateX(0);
}

.ag-timeline-card_arrow {
  height: 18px;
  width: 18px;
  margin-top: 20px;
  background: transparent;
  z-index: -1;
  position: absolute;
  top: 0;
  right: 0;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}

.ag-timeline_item:nth-child(2n + 1) .ag-timeline-card_arrow {
  margin-left: calc(-18px / 2);
  margin-right: calc(-18px / 2);
}

.ag-timeline_item:nth-child(2n) .ag-timeline-card_arrow {
  margin-left: -10px;
  right: auto;
  left: 0;
}

@media (max-width: 768px) {


  .ag-timeline-card_item {
    background: rgb(129 129 129);
    width: 100%;
  }
}
</style>