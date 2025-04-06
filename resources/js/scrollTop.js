document.addEventListener("DOMContentLoaded", () => {
    const scrollBtn = document.getElementById("scrollBtn");
    let isScrolling = false;
    let scrollEndTimeout;

    // Показ кнопки при прокрутке
    window.addEventListener("scroll", () => {
        scrollBtn.style.display = window.scrollY > 20 ? "block" : "none";

        // Отменить взлёт, если пользователь сам скроллит
        if (isScrolling) {
            clearTimeout(scrollEndTimeout);
            scrollBtn.classList.remove("launched");

            scrollEndTimeout = setTimeout(() => {
                isScrolling = false;
            }, 200);
        }
    });

    // Скролл вверх с контролем
    scrollBtn.addEventListener("click", () => {
        isScrolling = true;

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

        // Отслеживаем, когда скролл закончен
        scrollEndTimeout = setTimeout(() => {
            scrollBtn.classList.add("launched");

            // Сброс взлёта через 1с
            setTimeout(() => {
                scrollBtn.classList.remove("launched");
            }, 1000);

            isScrolling = false;
        }, 600); // Время = длительность scrollTo
    });
});