$(document).ready(function () {

    const scrollToTopButton = $("#scrollBtn");

    window.addEventListener('toggleScrollButton', (event) => {
        scrollToTopButton.css("display", event.detail.display ? "block" : "none");
    });

    $(window).on("scroll", function () {
        if ($(document).scrollTop() > 20 || $(document.documentElement).scrollTop() > 20) {
            scrollToTopButton.css("display", "block");
        } else {
            scrollToTopButton.css("display", "none");
        }
    });

    scrollToTopButton.on("click", function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    // $('.button-close').click(function () {
    //         $("#complexMenuModal").modal('hide');
    // });
});
