const initTeltonikaTabs = () => {
    const buttons = document.querySelectorAll(".tab-btn");
    const contents = document.querySelectorAll(".tab-content");
    if (!buttons.length || !contents.length) {
        return;
    }

    const showTab = (tabName) => {
        buttons.forEach((btn) => {
            const isActive = btn.id === `tab-${tabName}`;
            btn.classList.toggle("active", isActive);
            btn.classList.toggle("inactive", !isActive);
        });

        contents.forEach((content) => {
            content.classList.toggle("hidden", content.id !== `content-${tabName}`);
        });
    };

    showTab("cloud");
    window.showTab = showTab;
};

const initTeltonikaCasesSwiper = () => {
    const container = document.querySelector(".myCases");
    if (!container || typeof Swiper === "undefined") {
        return;
    }

    const slides = container.querySelectorAll(".swiper-slide");
    const enableLoop = slides.length >= 6;

    new Swiper(".myCases", {
        loop: enableLoop,
        grabCursor: true,
        slidesPerView: 1,
        spaceBetween: 24,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
};

document.addEventListener("DOMContentLoaded", () => {
    initTeltonikaTabs();
    initTeltonikaCasesSwiper();
});
