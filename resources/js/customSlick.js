$(function () {
    // $('.carousel-custom').on('init reInit afterChange', function (event, slick, currentSlide) {
    //     var $slick = $(slick.$slider);
    //     $slick.find('.slick-slide').removeClass('prev-slide next-slide');
    //     $slick.find('.slick-current').prev('.slick-slide').addClass('prev-slide');
    //     $slick.find('.slick-current').next('.slick-slide').addClass('next-slide');
    // });
    // $('.carousel-custom').on('beforeChange', function (event, slick, currentSlideIndex, nextSlideIndex) {
    //     var windowWidth = $(window).width();
    //     $('.slick-slide').css('margin-top', '');


    //     $(slick.$slides[nextSlideIndex]).prev().css('margin-top', '130px');
    //     $(slick.$slides[nextSlideIndex]).next().css('margin-top', '10px');

    //     if (windowWidth <= 1090) {
    //         $(slick.$slides[nextSlideIndex]).next().css('margin-top', '40px');
    //     }

    // });


    // $('.carousel-custom').on('afterChange', function (event, slick, currentSlideIndex) {
    //     slick.setPosition();
    //     $('.slick-slide').css('transform', '').css('margin-top', '');
    //     $(slick.$slides[currentSlideIndex]).css('margin-top', '70px');
    // });



    $('.carousel-custom').slick({
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
           
            $('.services_dots').slick('slickUnfilter').slick('slickFilter', function(index) {
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
