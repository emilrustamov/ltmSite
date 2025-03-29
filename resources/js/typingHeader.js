document.addEventListener('DOMContentLoaded', () => {
    let textIndex = 0;
    let charIndex = 0;
    const typingDelay = 100;
    const erasingDelay = 50;
    const newTextDelay = 2000;
    const typingElement = document.querySelector(".typing-text");

    function typeText() {
        if (charIndex < texts[textIndex].length) {
            typingElement.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(typeText, typingDelay);
        } else {
            setTimeout(eraseText, newTextDelay);
        }
    }

    function eraseText() {
        if (charIndex > 0) {
            typingElement.textContent = texts[textIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(eraseText, erasingDelay);
        } else {
            textIndex++;
            if (textIndex >= texts.length) textIndex = 0;
            setTimeout(typeText, typingDelay + 500);
        }
    }

    setTimeout(typeText, newTextDelay);
});
