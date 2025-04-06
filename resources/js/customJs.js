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
    const triggerOffset = header.offsetTop + 10;

    window.addEventListener("scroll", () => {
        if (window.scrollY > triggerOffset) {
            header.classList.add(
                "backdrop-blur-md",
                "bg-white/10",
                "border-b",
                "border-white/20",
                "shadow-lg"
            );
        } else {
            header.classList.remove(
                "backdrop-blur-md",
                "bg-white/10",
                "border-b",
                "border-white/20",
                "shadow-lg"
            );
        }
    });
});
