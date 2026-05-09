let swiperInstance = null;

const initServicesSwiper = () => {
    const slider = document.querySelector(".mySwiper");
    if (!slider || typeof Swiper === "undefined") {
        return;
    }

    const isMobile = window.innerWidth < 768;

    if (swiperInstance) {
        swiperInstance.destroy(true, true);
    }

    const slides = slider.querySelectorAll(".swiper-slide");
    const slidesCount = slides.length;
    const minSlidesForLoop = isMobile ? 3 : 6;
    const enableLoop = slidesCount >= minSlidesForLoop;

    swiperInstance = new Swiper(".mySwiper", {
        grabCursor: true,
        slidesPerView: "auto",
        centeredSlides: isMobile,
        spaceBetween: isMobile ? 20 : 0,
        loop: enableLoop,
        speed: 800,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        slideToClickedSlide: true,
        threshold: 10,
        touchRatio: 1.2,
        resistanceRatio: 0.85,
        longSwipesRatio: 0.5,
        effect: isMobile ? "slide" : "coverflow",
        ...(isMobile
            ? {}
            : {
                  coverflowEffect: {
                      rotate: 50,
                      stretch: 0,
                      depth: 100,
                      modifier: 1,
                      slideShadows: true,
                  },
              }),
        on: {
            slideChangeTransitionEnd: () => {
                document.querySelectorAll(".swiper-slide").forEach((slide) => {
                    slide.classList.add("show");
                });
            },
            init: () => {
                document.querySelectorAll(".swiper-slide").forEach((slide) => {
                    slide.classList.add("show");
                });
            },
        },
    });
};

document.addEventListener("DOMContentLoaded", initServicesSwiper);
window.addEventListener("resize", initServicesSwiper);
