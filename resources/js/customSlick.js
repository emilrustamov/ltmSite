$(function () {
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

});
