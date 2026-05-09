function initScrollTopButton() {
    const scrollBtn = document.getElementById("scrollBtn");
    if (!scrollBtn) {
        return;
    }

    let isAutoScrolling = false;
    let completeTimeoutId = null;

    const updateButtonVisibility = (scrollY) => {
        if (isAutoScrolling) {
            return;
        }

        scrollBtn.style.display = scrollY > 20 ? "block" : "none";
    };

    const clearFlightState = () => {
        isAutoScrolling = false;
        scrollBtn.classList.remove("launched", "launch-complete");
        if (completeTimeoutId) {
            clearTimeout(completeTimeoutId);
            completeTimeoutId = null;
        }
    };

    const handleReachedTop = () => {
        if (!isAutoScrolling) {
            return;
        }

        scrollBtn.classList.add("launch-complete");
        completeTimeoutId = window.setTimeout(() => {
            clearFlightState();
            scrollBtn.style.display = "none";
        }, 420);
    };

    const handleScroll = (scrollY) => {
        updateButtonVisibility(scrollY);

        if (isAutoScrolling && scrollY <= 5) {
            handleReachedTop();
        }
    };

    if (window.lenis) {
        window.lenis.on("scroll", ({ scroll }) => {
            handleScroll(scroll);
        });
    } else {
        window.addEventListener("scroll", () => {
            handleScroll(window.scrollY || window.pageYOffset);
        }, { passive: true });
    }

    scrollBtn.addEventListener("click", (event) => {
        event.preventDefault();
        event.stopPropagation();

        if (isAutoScrolling) {
            return;
        }

        isAutoScrolling = true;
        scrollBtn.style.display = "block";
        scrollBtn.classList.remove("launch-complete");
        scrollBtn.classList.add("launched");

        if (window.lenis) {
            try {
                window.lenis.scrollTo(0);
            } catch (error) {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }
        } else {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    });
}

function initScrollTop() {
    const tryInit = () => {
        if (!document.getElementById("scrollBtn")) {
            return false;
        }

        initScrollTopButton();
        return true;
    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", () => {
            window.addEventListener("lenis:ready", tryInit, { once: true });
            setTimeout(() => {
                if (!tryInit()) {
                    setTimeout(tryInit, 100);
                }
            }, 100);
        });
        return;
    }

    window.addEventListener("lenis:ready", tryInit, { once: true });
    setTimeout(tryInit, 100);
}

initScrollTop();
