document.addEventListener("DOMContentLoaded", () => {
    const scrollBtn = document.getElementById("scrollBtn");
    let isScrolling = false;
    let scrollEndTimeout;

    // Показ кнопки при прокрутке
    window.addEventListener("scroll", () => {
        // Появляется, если прокручено больше 20px
        scrollBtn.style.display = window.scrollY > 20 ? "block" : "none";

        // Если кнопка уже запущена и пользователь сам прокручивает,
        // сбрасываем состояние анимации
        if (isScrolling) {
            clearTimeout(scrollEndTimeout);
            scrollBtn.classList.remove("launched");
            scrollEndTimeout = setTimeout(() => {
                isScrolling = false;
            }, 200);
        }
    });

    // При клике по кнопке
    scrollBtn.addEventListener("click", () => {
        isScrolling = true;
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

        // Запускаем анимацию взлёта кнопки
        scrollBtn.classList.add("launched");

        // Слушаем событие окончания анимации,
        // чтобы сбросить класс и вернуть кнопку в исходное состояние.
        scrollBtn.addEventListener("animationend", function handler() {
            // Удаляем класс и сбрасываем инлайн-стили,
            // чтобы кнопка могла появиться снова при повторном скролле
            scrollBtn.classList.remove("launched");
            scrollBtn.style.transform = "";
            scrollBtn.style.opacity = "";
            // Снимаем слушатель, чтобы не вызывался каждый раз
            scrollBtn.removeEventListener("animationend", handler);
            isScrolling = false;
        });
    });
});
