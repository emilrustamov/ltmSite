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
    const scrolledLogo = "/assets/images/ltm.png";

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

    const getNativeScrollY = () => window.scrollY || window.pageYOffset;

    const initScrollListeners = () => {
        if (window.lenis) {
            window.lenis.on("scroll", ({ scroll }) => {
                updateHeaderStyles(scroll);
            });
            return;
        }

        window.addEventListener("scroll", () => {
            updateHeaderStyles(getNativeScrollY());
        }, { passive: true });
    };

    updateHeaderStyles(getNativeScrollY());

    if (window.lenis) {
        initScrollListeners();
    } else {
        const checkLenis = setInterval(() => {
            if (window.lenis) {
                clearInterval(checkLenis);
                initScrollListeners();
            }
        }, 50);

        setTimeout(() => {
            clearInterval(checkLenis);
            initScrollListeners();
        }, 2000);
    }
});

