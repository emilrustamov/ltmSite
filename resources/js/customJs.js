//бегающие цифры
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".stats_count");

    counters.forEach((counter) => {
        const target = counter.getAttribute("data-target").replace("+", "");
        const isPlus = counter.getAttribute("data-target").includes("+");
        const duration = 1500;
        let start = 0;
        const stepTime = Math.max(Math.floor(duration / target), 1);

        const step = () => {
            start += 1;
            counter.textContent = start + (isPlus ? "+" : "");

            if (start < target) {
                setTimeout(step, stepTime);
            } else {
                counter.textContent = target + (isPlus ? "+" : "");
            }
        };

        step();
    });
});
//глассморфизм на менюшку

document.addEventListener("DOMContentLoaded", function () {
    const header = document.getElementById("mainHeader");
    if (!header) return;
    
    const logo = header.querySelector(".center-image img");
    const triggerOffset = 50; 

    const originalLogo = "/assets/images/ltm-white.png";
    const scrolledLogo = "/assets/images/ltm.png ";

    if (window.innerWidth <= 768 || !logo) return;

    let isChanged = false;

    // Функция для обновления стилей header
    const updateHeaderStyles = (scrollY) => {
        if (scrollY > triggerOffset && !isChanged) {
            header.classList.add(
                "backdrop-blur-md",
                "bg-white/10",
                "border-b",
                "border-white/20",
                "shadow-lg"
            );
            logo.classList.add("opacity-0", "transition-opacity", "duration-300");

            setTimeout(() => {
                logo.src = scrolledLogo;
                logo.classList.remove("opacity-0");
            }, 150);

            isChanged = true;
        }

        if (scrollY <= triggerOffset && isChanged) {
            header.classList.remove(
                "backdrop-blur-md",
                "bg-white/10",
                "border-b",
                "border-white/20",
                "shadow-lg"
            );
            logo.classList.add("opacity-0", "transition-opacity", "duration-300");

            setTimeout(() => {
                logo.src = originalLogo;
                logo.classList.remove("opacity-0");
            }, 150);

            isChanged = false;
        }
    };

    // Функция для инициализации слушателей прокрутки
    const initScrollListeners = () => {
        // Используем Lenis события, если доступен, иначе fallback на нативный скролл
        if (window.lenis) {
            // Слушаем события прокрутки Lenis
            window.lenis.on('scroll', ({ scroll }) => {
                updateHeaderStyles(scroll);
            });
        } else {
            // Fallback на нативный скролл
            window.addEventListener("scroll", () => {
                updateHeaderStyles(window.scrollY || window.pageYOffset);
            }, { passive: true });
        }
    };

    // Ждем инициализации Lenis
    if (window.lenis) {
        initScrollListeners();
    } else {
        // Если Lenis еще не загружен, ждем немного и пробуем снова
        const checkLenis = setInterval(() => {
            if (window.lenis) {
                clearInterval(checkLenis);
                initScrollListeners();
            }
        }, 50);
        
        // Останавливаем проверку через 2 секунды, если Lenis так и не загрузился
        setTimeout(() => {
            clearInterval(checkLenis);
            initScrollListeners(); // Инициализируем с fallback на нативный скролл
        }, 2000);
    }
});

