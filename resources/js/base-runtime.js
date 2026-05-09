const initLenis = () => {
    const LenisCtor = window.Lenis || (typeof Lenis !== "undefined" ? Lenis : null);
    if (!LenisCtor && typeof window.lenis === "undefined") {
        return;
    }

    if (window.lenis) {
        return;
    }

    window.lenis = new LenisCtor({
        duration: 1.5,
        easing: (t) => 1 - Math.pow(1 - t, 4),
        smooth: true,
        smoothTouch: false,
        direction: "vertical",
    });

    const raf = (time) => {
        window.lenis.raf(time);
        requestAnimationFrame(raf);
    };

    requestAnimationFrame(raf);
    requestAnimationFrame(() => {
        window.dispatchEvent(new CustomEvent("lenis:ready"));
    });
};

const initCrtOverlayBackground = () => {
    window.setTimeout(() => {
        const overlay = document.querySelector(".crt-overlay");
        if (!overlay) {
            return;
        }

        const bgUrl = overlay.getAttribute("data-bg");
        if (bgUrl) {
            overlay.style.setProperty("--bg", `url(${bgUrl})`);
        }
    }, 5000);
};

window.addEventListener("load", () => {
    initLenis();
    initCrtOverlayBackground();
});
