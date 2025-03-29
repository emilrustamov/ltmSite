import "./customJs.js";
import "./blurPortfolio.js";
import "./customSlick.js";
import "./cursor.js";
import "./followedCursor.js";
import "./footerUp.js";
import "./menuBlocks.js";
import "./scroll.js";
import "./zakraskaHeader.js";
import "./scrollTop.js";
import "./showMoreText.js";
import "./typingHeader.js";

// слайдер на главной странице
let currentIndex = 0;
const slides = $(".portf-slider-item");
const totalSlides = slides.length;
const slidesToShow = 2;

const sliderContainer = $(".portf-slider");
const slideWidth = sliderContainer.width() / slidesToShow;

slides.each(function () {
  $(this).css("width", slideWidth + "px");
});

slides.wrapAll('<div class="slider-inner"></div>');
const sliderInner = $(".slider-inner");
sliderInner.css({
  display: "flex",
  width: slideWidth * totalSlides + "px",
  transition: "transform 0.5s ease-in-out",
});

$("#next-slide").on("click", function () {
  if (currentIndex + slidesToShow < totalSlides) {
    currentIndex += slidesToShow;
  } else {
    currentIndex = 0;
  }
  sliderInner.css("transform", `translateX(-${slideWidth * currentIndex}px)`);
});

$("#prev-slide").on("click", function () {
  if (currentIndex >= slidesToShow) {
    currentIndex -= slidesToShow;
  } else {
    currentIndex = totalSlides - slidesToShow;
  }
  sliderInner.css("transform", `translateX(-${slideWidth * currentIndex}px)`);
});

const imageSlides = document.querySelectorAll(".image-container");

imageSlides.forEach((slide) => {
  slide.addEventListener("mouseenter", () => {
    slide.style.transform = "scale(1.2)";
  });

  slide.addEventListener("mouseleave", () => {
    slide.style.transform = "scale(1)";
  });

  slide.addEventListener("mousemove", (e) => {
    const { offsetX, offsetY } = e;
    const { clientWidth, clientHeight } = slide;

    if (
      offsetX >= 0 &&
      offsetX <= clientWidth &&
      offsetY >= 0 &&
      offsetY <= clientHeight
    ) {
      const x = (offsetX - clientWidth / 2) / 5;
      const y = (offsetY - clientHeight / 2) / 5;
      slide.style.transform = `translate(${x}px, ${y}px) scale(1.2)`;
    }
  });
});
// слайдер на главной странице конец