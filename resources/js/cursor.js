
document.addEventListener('DOMContentLoaded', () => {
    const dot = document.querySelector('.follow-cursor');
    const outer = document.getElementById('custom-cursor');
    const inner = document.getElementById('cursor-inner');

    let mouseX = 0, mouseY = 0;
    let outerX = 0, outerY = 0;
    const speed = 0.15;

    // Следим за мышкой
    window.addEventListener('mousemove', e => {
        mouseX = e.clientX;
        mouseY = e.clientY;

        dot.style.left = `${mouseX}px`;
        dot.style.top = `${mouseY}px`;
        inner.style.left = `${mouseX}px`;
        inner.style.top = `${mouseY}px`;

        const hoveringLink = e.target.closest('a, button');

        if (hoveringLink) {
            dot.classList.add('follow-cursor_active');
            inner.classList.add('active');
            outer.classList.add('active');
        } else {
            dot.classList.remove('follow-cursor_active');
            inner.classList.remove('active');
            outer.classList.remove('active');
        }
    });

    // Плавная анимация внешнего круга
    function animate() {
        outerX += (mouseX - outerX) * speed;
        outerY += (mouseY - outerY) * speed;

        outer.style.left = `${outerX}px`;
        outer.style.top = `${outerY}px`;

        requestAnimationFrame(animate);
    }

    animate();
});

