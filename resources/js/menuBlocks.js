document.addEventListener("DOMContentLoaded", function () {
    let menuOpen = false;

    const menuButton = document.getElementById("menuButton");
    const mobileMenuBody = document.querySelector(".mobile-menu-body");
    const complexMenuModal = document.getElementById("complexMenuModal");
    const closeButtons = [
        document.getElementById("closeDesktopModal"),
        document.getElementById("closeMobileModal")
    ];

    menuButton.addEventListener("click", function () {
        if (!menuOpen) {
            animateBlocks();
            console.log('что-то точно произошло, но что...');

            if (window.innerWidth < 991 && mobileMenuBody) {
                mobileMenuBody.style.height = `${window.innerHeight}px`;
            }

            menuOpen = true;
        }
    });

    closeButtons.forEach(btn => {
        if (btn) {
            btn.addEventListener("click", function () {
                if (complexMenuModal) {
                    complexMenuModal.style.opacity = "1";
                    complexMenuModal.style.transition = "opacity 0.3s";
                    complexMenuModal.style.opacity = "0";

                    // Прячем после анимации
                    setTimeout(() => {
                        complexMenuModal.style.display = "none";
                    }, 300);
                }

                menuOpen = false;
                simulateButtonClick();
            });
        }
    });

    function simulateButtonClick() {
        menuButton.click();
    }

    function animateBlocks() {
        const instLink = document.getElementById("instLink");
        const linkedLink = document.getElementById("linkedLink");
        const blogLink = document.getElementById("blogLink");
        const linkAddress = document.getElementById("linkAddress");
        const allLinks = document.querySelectorAll("#links a");

        if (instLink) {
            instLink.addEventListener("mouseenter", () => {
                linkAddress.textContent = "https://www.instagram.com/";
            });
        }

        if (linkedLink) {
            linkedLink.addEventListener("mouseenter", () => {
                linkAddress.textContent = "https://www.linkedin.com/";
            });
        }

        if (blogLink) {
            blogLink.addEventListener("mouseenter", () => {
                linkAddress.textContent = "/";
            });
        }

        allLinks.forEach(link => {
            link.addEventListener("mouseleave", () => {
                linkAddress.textContent = "Выберите ссылку";
            });
        });
    }
});
