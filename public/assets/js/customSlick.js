$(function () {
    // $('.carousel-custom').on('init reInit beforeChange', function (event, slick, currentSlideIndex, nextSlideIndex) {
    //     // Для первого слайда делаем особую проверку
    //     if (typeof nextSlideIndex === 'undefined') {
    //         nextSlideIndex = 0;
    //     }
        
    //     applyMargins(slick, nextSlideIndex); // Применяем отступы ДО переключения
    // });
    
    // function applyMargins(slick, currentSlideIndex) {
    //     var windowWidth = $(window).width();
    //     var prevMargin = windowWidth <= 1090 ? '40px' : '130px';
    
    //     // Сначала убираем отступы у всех слайдов, кроме текущих
    //     slick.$slides.css('margin-top', '0');
    
    //     // Устанавливаем отступы только для предыдущего, текущего и следующего слайдов
    //     var $currentSlide = $(slick.$slides[currentSlideIndex]);
    //     var $prevSlide = $currentSlide.prev().length ? $currentSlide.prev() : slick.$slides.last();
    //     var $nextSlide = $currentSlide.next().length ? $currentSlide.next() : slick.$slides.first();
    
    //     $currentSlide.css('margin-top', '70px');
    //     $prevSlide.css('margin-top', prevMargin);
    //     $nextSlide.css('margin-top', '10px');
    // }
    




    $('.carousel-custom').slick({
        autoplay: true,
        infinite: true,
        slidesToShow: 1,
        centerPadding: '20%',
        centerMode: true,
        slidesToScroll: 1,
        speed: 1000,
        autoWidth: true,
        prevArrow: '<div class="prev-cust-button"><i class="fa-solid fa-arrow-left "></i></div>',
        nextArrow: '<div class="next-cust-button"><i class="fa-solid fa-arrow-right "></i></div>',
        useCSS: true,
        useTransform: true,
        responsive: [
            {
                breakpoint: 1460,
                settings: {
                    centerPadding: '10%'
                },
                breakpoint: 1090,
                settings: {
                    centerMode: false,
                    centerPadding: '0',

                },

                breakpoint: 800,
                settings: {
                    centerMode: false,
                    centerPadding: '0',
                    slidesToShow: 1,
                    // arrows: false,
                },
            }
        ],
    });
    $('.serv-slider').on('init', function (event, slick) {
        var currentSlide = slick.currentSlide;
        $('.services_dots .services-dot').eq(currentSlide).addClass('active-dot');
    });
    $('.serv-slider').on('afterChange', function (event, slick, currentSlide) {

        $('.services_dots .services-dot').removeClass('active-dot');

        $('.services_dots .services-dot').eq(currentSlide).addClass('active-dot');
        if (currentSlide > 4) {

            $('.services_dots').slick('slickUnfilter').slick('slickFilter', function (index) {
                return index >= slick.slideCount - 3;
            });

            $('.services_dots .services-dot').removeClass('active-dot');
            $('.services_dots .services-dot').eq(currentSlide - 5).addClass('active-dot');
        } else {
            $('.services_dots').slick('slickUnfilter');
            $('.services_dots .services-dot').eq(currentSlide).addClass('active-dot');
        }
    });
    $('.serv-slider').slick({
        infinite: true,
        slidesToShow: 1,
        focusOnSelect: true,
        centerMode: false,
        variableWidth: true,
        speed: 1000,
        nextArrow: '<button class="services_next"><img src="' + 'https://arassanusga.com/assets/images/long-arrow-right.png' + '" style="width: 5.4rem;" alt=""></button>',
        prevArrow: '<div></div>',
    });
    $('.services_dots').slick({
        infinite: true,
        slidesToShow: 10,
        asNavFor: '.serv-slider',
        speed: 0,
        swipe: false,
        draggable: false,
        arrows: false,
        variableWidth: true,
        focusOnSelect: true,
        waitForAnimate: false,
    });

    function highlightActiveDot(currentSlide) {
        $('.services_dots .services-dot').removeClass('active-dot');

        $('.services_dots .services-dot').eq(currentSlide).addClass('active-dot');

    }
    $('.serv-slider').on('init', function (event, slick) {
        highlightActiveDot(0);
    });
    $('.serv-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        highlightActiveDot(nextSlide);
    });


    $('.serv-slider').on('afterChange', function (event, slick, currentSlide) {
        highlightActiveDot(currentSlide);
    });
    $('.services-mobile-slider').slick({
        infinite: true,
        slidesToShow: 1,
        centerMode: true,
        // dots:true,
        centerPadding: '10%',
        // asNavFor: '.dots-container',
        arrows: false,
        responsive: [
            {
                breakpoints: 1920,
                settings: {
                    slidesToShow: 0,
                },
                breakpoints: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
                breakpoint: 450,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    $('.dots-container').slick({
        infinite: true,
        slidesToShow: 10,
        asNavFor: '.services-mobile-slider',
        speed: 0,
        arrows: false,
        variableWidth: true,
        focusOnSelect: true,
        waitForAnimate: false,
    });
    $('.services-mobile-slider').on('init', function (event, slick) {
        var currentSlide = slick.currentSlide;
        $('.dots-container .serv-mobile-dots').eq(currentSlide).addClass('active-mobile-dot');
    });
    $('.services-mobile-slider').on('afterChange', function (event, slick, currentSlide) {
        $('.dots-container .serv-mobile-dots').removeClass('active-mobile-dot');

        $('.dots-container .serv-mobile-dots').eq(currentSlide).addClass('active-mobile-dot');
    });
    function highlightActiveDot(currentSlide) {
        $('.dots-container .serv-mobile-dots').removeClass('active-mobile-dot');

        $('.dots-container .serv-mobile-dots').eq(currentSlide).addClass('active-mobile-dot');
    }
    $('.services-mobile-slider').on('init', function (event, slick) {
        highlightActiveDot(0);
    });

    $('.services-mobile-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        highlightActiveDot(nextSlide);
    });
    $('.services-mobile-slider').on('afterChange', function (event, slick, currentSlide) {
        highlightActiveDot(currentSlide);
    });
});
