// const typingTextElement = document.querySelector('.typing-text');
// const cursorElement = document.querySelector('.cursor');
// const textArray = ["IT решения", "Автоматизация","Разработка веб-сайта","Внедрение ISO стандартов"]; // Add your array of strings here
// let currentTextIndex = 0;
// let currentCharIndex = -1;
// let isDeleting = false;

// function typeText() {
//     const currentText = textArray[currentTextIndex];

//     if (!isDeleting) {
//         currentCharIndex++;

//         if (currentCharIndex < currentText.length) {
//             // typingTextElement.textContent += currentText[currentCharIndex];
//             setTimeout(typeText, 100); // Typing speed (adjust as needed)
//         } else {
//             isDeleting = true;
//             setTimeout(typeText, 1000); // Delay before starting deletion
//         }
//     } else {
//         currentCharIndex--;

//         if (currentCharIndex >= 0) {
//             // typingTextElement.textContent = currentText.slice(0, currentCharIndex);
//             setTimeout(typeText, 20); // Deletion speed (adjust as needed)
//         } else {
//             isDeleting = false;
//             currentTextIndex = (currentTextIndex + 1) % textArray.length;
//             setTimeout(typeText, 500); // Delay before typing next text
//         }
//     }
// }
// setTimeout(typeText, 500); // Start the typing and deleting process

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
