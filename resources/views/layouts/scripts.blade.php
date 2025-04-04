<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/fontawesome.min.js') }}"></script>

<script>
    $(window).on('load', function() {
        $('.loaders').hide(200);
    });
    $(document).ready(function() {
        var currentPage = "{{ $currentPage }}";
        // console.log(currentPage);
        $('.nav-item').each(function() {
            var text = $(this).text().trim();
            // console.log(text);
            if (currentPage === text) {
                // console.log(currentPage === text);

                $(this).addClass('active');
            }
        });
    });


    // Ajax portfolio
    $('.element').click(function() {
        var categoryName = $(this).find('p').data('category-name');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            url: '/en/ajax-portfolio',
            method: 'post',
            dataType: 'json',
            data: {
                category: categoryName
            }, 
            success: function(data) {
                $('.grid_portfolio').html("");
                data.forEach(p => {
                    $('.grid_portfolio').append(
                        '<a href="/{{ $lang }}/portfolio/' + p['id'] +
                        '" class="grid-item "> <div class="columnPort"> <img src="/storage/' +
                        p['photo'] +
                        '" alt="Image"> ' +

                        '</div> <div class="rowPort"> <div class="line"></div> <div class="gridTitle">' +
                        p["title_{{ $lang }}"] +
                        '</div> </div> </div> </div> </a>');

                });
                $('#loadMoreButton').prop('disabled', false).addClass('relaod');
            }
        });
    });


    $(document).ready(function() {
        let pageOffset = null; // Начальное значение null для первого вызова
        let categoryName = 'All';
        let lang = $('.grid_portfolio').data('lang'); // Получаем значение языка из data-lang

        $('#loadMoreButton').on('click', function() {
            $('.reload-icon').addClass('rotate-more-btn');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: `/${lang}/show-more/${pageOffset ? pageOffset : 0}/${categoryName}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Полученные данные:', response
                    .data); // Отладка для проверки данных

                    if (response.data.length > 0) {
                        response.data.forEach((p, index) => {
                            // Проверка уникальности перед добавлением по data-id
                            if ($(`.grid-item[data-id="${p.id}"]`).length === 0) {
                                let additionalClass = index % 2 !== 0 ?
                                    'add-padding' : '';

                                $('.grid_portfolio').append(
                                    `<a href="/${lang}/portfolio/${p.id}" class="grid-item ${additionalClass} " data-id="${p.id}">
                                    <div class="columnPort relative content">
                                        <img src="/storage/${p.photo}" alt="Image" loading="lazy">
                                        <div class="gridText content">
                                            <div class="rowPort">
                                                <div class="line"></div>
                                                <div class="gridTitle">${p["title_" + lang]}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>`
                                );
                            }
                        });

                        // Устанавливаем pageOffset на id последнего элемента
                        pageOffset = response.data[response.data.length - 1].id;

                        if (!response.hasMore) {
                            $('#loadMoreButton').hide();
                        }
                    }
                    $('.reload-icon').removeClass('rotate-more-btn');
                },
                error: function() {
                    console.error("Ошибка загрузки данных");
                    $('.reload-icon').removeClass('rotate-more-btn');
                }
            });
        });
    });
    $(document).ready(function() {
        let pageOffset = null; // Начальное значение null для первого вызова
        let categoryName = 'All';
        let lang = $('.grid_portfolio').data('lang'); // Получаем значение языка из data-lang

        $('#loadMoreButton').on('click', function() {
            $('.reload-icon').addClass('rotate-more-btn');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: `/${lang}/show-more/${pageOffset ? pageOffset : 0}/${categoryName}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Полученные данные:', response
                    .data); // Отладка для проверки данных

                    if (response.data.length > 0) {
                        response.data.forEach((p, index) => {
                            // Проверка уникальности перед добавлением по data-id
                            if ($(`.grid-item[data-id="${p.id}"]`).length === 0) {
                                let additionalClass = index % 2 !== 0 ?
                                    'add-padding' : '';

                                $('.grid_portfolio').append(
                                    `<a href="/${lang}/portfolio/${p.id}" class="grid-item ${additionalClass} " data-id="${p.id}">
                                    <div class="columnPort relative content">
                                        <img src="/storage/${p.photo}" alt="Image" loading="lazy">
                                        <div class="gridText content">
                                            <div class="rowPort">
                                                <div class="line"></div>
                                                <div class="gridTitle">${p["title_" + lang]}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>`
                                );
                            }
                        });

                        pageOffset = response.data[response.data.length - 1].id;

                        if (!response.hasMore) {
                            $('#loadMoreButton').hide();
                        }
                    }
                    $('.reload-icon').removeClass('rotate-more-btn');
                },
                error: function() {
                    console.error("Ошибка загрузки данных");
                    $('.reload-icon').removeClass('rotate-more-btn');
                }
            });
        });
    });

    $(document).ready(function() {
        $('.element:first').addClass('selected');
    });


    const elements = document.querySelectorAll('.element');
    elements.forEach(element => {
        element.addEventListener('click', () => {
            elements.forEach(el => el.classList.remove('selected'));
            element.classList.add('selected');
            $('#loadMoreButton').addClass('reload');
            $('.reload').show();

        });
    });
</script>


<script>
    // Функция для анимации чисел на ванильном JS
    function animateNumbers(element, start, end, duration) {
        var range = end - start;
        var current = start;
        var increment = end > start ? 1 : -1;
        var stepTime = Math.abs(Math.floor(duration / range));
        var dataTarget = element.getAttribute('data-target') || "";
        var hasPlus = dataTarget.includes('+'); // Проверяем, есть ли плюс

        var timer = setInterval(function() {
            current += increment;
            element.textContent = current + (hasPlus ? "+" : "");
            if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                clearInterval(timer);
                element.textContent = end + (hasPlus ? "+" : "");
            }
        }, stepTime);
    }

    // Проверка на видимость элемента
    function checkVisibility() {
        var stats = document.querySelectorAll('.stats_count');
        stats.forEach(function(el) {
            var dataTarget = el.getAttribute('data-target') || "0";
            var textValue = dataTarget.replace('+', '');
            var targetValue = parseInt(textValue, 10) || 0;

            var windowHeight = window.innerHeight;
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            var elementRect = el.getBoundingClientRect();
            var elementOffsetTop = elementRect.top + scrollTop;
            var elementHeight = el.offsetHeight;

            // Если элемент видим
            if (elementOffsetTop < scrollTop + windowHeight && (elementOffsetTop + elementHeight) > scrollTop) {
                if (!el.classList.contains('animating')) {
                    animateNumbers(el, 0, targetValue, 2000);
                    el.classList.add('animating');
                }
            } else {
                el.classList.remove('animating');
                el.textContent = "0+";
            }
        });
    }

    // Отслеживаем скролл и проверяем видимость
    window.addEventListener('scroll', checkVisibility);

    // Проверяем видимость элементов при загрузке страницы
    window.addEventListener('load', checkVisibility);
</script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-5TMJMPE0M9');
</script>

<script>
    $(document).ready(function() {
        let userEmail = '';

        // Открыть модальное окно и начать с первого шага (ввод email)
        $('#startQuiz').on('click', function() {
            $('#quizModal').addClass('show');

            // Проверяем, есть ли уже сохраненный email
            if (userEmail) {
                $('#quizStep1').fadeIn().addClass('active'); // Переходим сразу к первому вопросу
            } else {
                $('#quizStep0').addClass('active').fadeIn(); // Сначала показываем ввод email
            }
        });

        // Закрыть модальное окно
        $('.close').on('click', function() {
            $('#quizModal').removeClass('show');
            resetQuiz();
        });

        // Переход к следующему вопросу после ввода email
        $('#startQuizButton').on('click', function() {
            var email = $('#userEmail').val();
            if (email && validateEmail(email)) {
                userEmail = email; // Сохраняем email
                $('#quizStep0').removeClass('active').fadeOut(function() {
                    $('#quizStep1').fadeIn().addClass('active'); // Переход к первому вопросу
                });
            } else {
                alert("Пожалуйста, введите корректный email.");
            }
        });

        // Логика переключения вопросов с анимацией
        $('.quiz-answer').on('change', function() {
            var nextStep = $(this).data('next');
            var result = $(this).data('result');

            if (result) {
                $('#quizFinalResult').text(result);
                $('.quiz-step').removeClass('active').hide();
                $('#quizResult').fadeIn().addClass('active');
            } else if (nextStep) {
                $('.quiz-step').removeClass('active').fadeOut(function() {
                    $('#quizStep' + nextStep).fadeIn().addClass('active');
                });
            }
        });

        // Сбросить квиз
        function resetQuiz() {
            $('.quiz-step').removeClass('active').hide();
            $('#quizResult').removeClass('active').hide();
            $('#userEmail').val(''); // Очищаем поле ввода email
            userEmail = ''; // Сбрасываем сохраненный email
        }

        // Перезапустить квиз
        $('#restartQuiz').on('click', function() {
            resetQuiz();
            $('#quizStep1').fadeIn().addClass('active'); // Переходим сразу к первому вопросу
        });
    });
</script>