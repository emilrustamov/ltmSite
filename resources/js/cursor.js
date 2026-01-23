document.addEventListener('DOMContentLoaded', () => {
    // Проверка на мобильное устройство через navigator.userAgent
    if (/Mobi|Android/i.test(navigator.userAgent)) {
        const dot = document.querySelector('.follow-cursor');
        const outer = document.getElementById('custom-cursor');
        const inner = document.getElementById('cursor-inner');

        if (dot) dot.style.display = 'none';
        if (outer) outer.style.display = 'none';
        if (inner) inner.style.display = 'none';
        return;
    }

    const dot = document.querySelector('.follow-cursor');
    const outer = document.getElementById('custom-cursor');
    const inner = document.getElementById('cursor-inner');

    // Проверяем наличие всех элементов перед инициализацией
    if (!dot || !outer || !inner) {
        console.warn('Cursor elements not found, skipping cursor initialization');
        return;
    }

    let mouseX = 0, mouseY = 0;
    let outerX = 0, outerY = 0;
    const speed = 0.15;

    // Отслеживание курсора
    window.addEventListener('mousemove', e => {
        mouseX = e.clientX;
        mouseY = e.clientY;

        if (dot) {
            dot.style.left = `${mouseX}px`;
            dot.style.top = `${mouseY}px`;
        }
        if (inner) {
            inner.style.left = `${mouseX}px`;
            inner.style.top = `${mouseY}px`;
        }

        const hoveringLink = e.target && e.target.closest ? e.target.closest('a, button') : null;

        if (hoveringLink) {
            if (dot) dot.classList.add('follow-cursor_active');
            if (inner) inner.classList.add('active');
            if (outer) outer.classList.add('active');
        } else {
            if (dot) dot.classList.remove('follow-cursor_active');
            if (inner) inner.classList.remove('active');
            if (outer) outer.classList.remove('active');
        }
    });

    // Плавная анимация внешнего круга
    function animate() {
        if (!outer) return;
        
        outerX += (mouseX - outerX) * speed;
        outerY += (mouseY - outerY) * speed;

        outer.style.left = `${outerX}px`;
        outer.style.top = `${outerY}px`;

        requestAnimationFrame(animate);
    }

    animate();
});
