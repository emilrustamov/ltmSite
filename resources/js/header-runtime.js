const initMobileMenu = () => {
    const openBtn = document.getElementById("mobileMenuOpen");
    const closeBtn = document.getElementById("mobileMenuClose");
    const modal = document.getElementById("mobileMenuModal");

    if (!openBtn || !closeBtn || !modal) {
        return;
    }

    openBtn.addEventListener("click", () => {
        modal.classList.remove("translate-y-full");
    });

    closeBtn.addEventListener("click", () => {
        modal.classList.add("translate-y-full");
    });
};

const initServicesMenu = () => {
    const toggle = document.getElementById("servicesToggle");
    const menu = document.getElementById("servicesMenu");
    const arrow = document.getElementById("servicesArrow");
    if (!toggle || !menu || !arrow) {
        return;
    }

    const navItem = toggle.closest(".nav-item");
    if (!navItem) {
        return;
    }

    const openMenu = () => {
        menu.classList.remove("hidden");
        arrow.classList.add("rotate-180");
    };

    const closeMenu = () => {
        menu.classList.add("hidden");
        arrow.classList.remove("rotate-180");
    };

    const toggleMenu = () => {
        menu.classList.toggle("hidden");
        arrow.classList.toggle("rotate-180");
    };

    navItem.addEventListener("mouseenter", () => {
        if (window.innerWidth >= 1024) {
            openMenu();
        }
    });

    navItem.addEventListener("mouseleave", () => {
        if (window.innerWidth >= 1024) {
            closeMenu();
        }
    });

    toggle.addEventListener("click", (event) => {
        event.preventDefault();
        event.stopPropagation();

        if (window.innerWidth < 1024) {
            toggleMenu();
        }
    });

    document.addEventListener("click", (event) => {
        if (!navItem.contains(event.target)) {
            closeMenu();
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            closeMenu();
        }
    });
};

const initProjectBadge = async () => {
    const badge = document.getElementById("newProjectBadge");
    if (!badge) {
        return;
    }

    const countUrl = badge.dataset.portfolioCountUrl;
    let totalProjects = Number(window.totalProjectsCount || 0);

    const updateBadge = () => {
        const viewedProjects = JSON.parse(localStorage.getItem("viewedProjects") || "[]");
        const newCount = Math.max(totalProjects - viewedProjects.length, 0);

        if (newCount > 0) {
            badge.textContent = String(newCount);
            badge.style.display = "inline-block";
        } else {
            badge.textContent = "";
            badge.style.display = "none";
        }
    };

    const ensureTotalProjects = async () => {
        if (totalProjects > 0 || !countUrl) {
            return totalProjects;
        }

        try {
            const response = await fetch(countUrl);
            if (!response.ok) {
                throw new Error(`Request failed with status ${response.status}`);
            }

            const data = await response.json();
            totalProjects = Number(data.total || 0);
            window.totalProjectsCount = totalProjects;
        } catch (_error) {
            totalProjects = 0;
        }

        return totalProjects;
    };

    await ensureTotalProjects();
    updateBadge();
    document.addEventListener("portfolio-viewed-updated", updateBadge);
};

const initLangMenu = () => {
    const toggle = document.getElementById("langToggle");
    const menu = document.getElementById("langMenu");
    const arrow = document.getElementById("langArrow");

    if (!toggle || !menu || !arrow) {
        return;
    }

    toggle.addEventListener("click", () => {
        menu.classList.toggle("hidden");
        arrow.classList.toggle("rotate-180");
        toggle.setAttribute("aria-expanded", menu.classList.contains("hidden") ? "false" : "true");
    });

    document.addEventListener("click", (event) => {
        if (!toggle.contains(event.target) && !menu.contains(event.target)) {
            if (!menu.classList.contains("hidden")) {
                menu.classList.add("hidden");
                arrow.classList.remove("rotate-180");
                toggle.setAttribute("aria-expanded", "false");
            }
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && !menu.classList.contains("hidden")) {
            menu.classList.add("hidden");
            arrow.classList.remove("rotate-180");
            toggle.setAttribute("aria-expanded", "false");
        }
    });
};

document.addEventListener("DOMContentLoaded", () => {
    initMobileMenu();
    initServicesMenu();
    initProjectBadge();
    initLangMenu();
});
