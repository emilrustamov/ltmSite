// Функция инициализации кнопки прокрутки
function initScrollTopButton() {
    const scrollBtn = document.getElementById("scrollBtn");
    if (!scrollBtn) return;

    let isScrolling = false;
    let scrollEndTimeout;

    // Функция для обновления видимости кнопки
    const updateButtonVisibility = (scrollY) => {
        scrollBtn.style.display = scrollY > 20 ? "block" : "none";
    };

    // Используем Lenis события, если доступен, иначе fallback на нативный скролл
    if (window.lenis) {
        // Слушаем события прокрутки Lenis
        window.lenis.on('scroll', ({ scroll }) => {
            // Появляется, если прокручено больше 20px
            updateButtonVisibility(scroll);

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
    } else {
        // Fallback на нативный скролл, если Lenis не доступен
        window.addEventListener("scroll", () => {
            updateButtonVisibility(window.scrollY || window.pageYOffset);

            if (isScrolling) {
                clearTimeout(scrollEndTimeout);
                scrollBtn.classList.remove("launched");
                scrollEndTimeout = setTimeout(() => {
                    isScrolling = false;
                }, 200);
            }
        }, { passive: true });
    }

    // При клике по кнопке
    scrollBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        isScrolling = true;

        // Запускаем анимацию взлёта кнопки
        scrollBtn.classList.add("launched");

        // Используем Lenis для плавной прокрутки, если доступен
        if (window.lenis) {
            // Используем двойной requestAnimationFrame для предотвращения резкого скачка
            // Это гарантирует, что браузер успеет отрендерить текущее состояние перед прокруткой
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    try {
                        // Простой вызов scrollTo - Lenis использует настройки из конфигурации
                        // Это предотвращает резкое смещение, так как Lenis уже инициализирован
                        window.lenis.scrollTo(0);
                    } catch (e) {
                        // Если произошла ошибка, используем нативный скролл
                        console.warn('Lenis scrollTo error:', e);
                        window.scrollTo({
                            top: 0,
                            behavior: "smooth"
                        });
                    }
                });
            });
        } else {
            // Fallback на нативный скролл
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }

        // Слушаем событие окончания анимации,
        // чтобы сбросить класс и вернуть кнопку в исходное состояние.
        const animationHandler = function handler() {
            // Удаляем класс и сбрасываем инлайн-стили,
            // чтобы кнопка могла появиться снова при повторном скролле
            scrollBtn.classList.remove("launched");
            scrollBtn.style.transform = "";
            scrollBtn.style.opacity = "";
            // Снимаем слушатель, чтобы не вызывался каждый раз
            scrollBtn.removeEventListener("animationend", handler);
            isScrolling = false;
        };
        
        scrollBtn.addEventListener("animationend", animationHandler, { once: true });
    });
}

// Инициализируем после загрузки DOM и Lenis
function initScrollTop() {
    // Ждем события готовности Lenis или используем fallback
    const tryInit = () => {
        if (document.getElementById("scrollBtn")) {
            initScrollTopButton();
            return true;
        }
        return false;
    };

    // Пробуем сразу, если DOM уже загружен
    if (document.readyState === 'loading') {
        document.addEventListener("DOMContentLoaded", () => {
            // Ждем события готовности Lenis
            window.addEventListener('lenis:ready', tryInit, { once: true });
            // Fallback: инициализируем через небольшую задержку
            setTimeout(() => {
                if (!tryInit()) {
                    // Если кнопка еще не создана, пробуем еще раз
                    setTimeout(tryInit, 100);
                }
            }, 100);
        });
    } else {
        // DOM уже загружен
        window.addEventListener('lenis:ready', tryInit, { once: true });
        // Fallback
        setTimeout(tryInit, 100);
    }
}

initScrollTop();
