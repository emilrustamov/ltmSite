document.addEventListener('DOMContentLoaded', () => {
    const followedButton = document.querySelector('.followed-button');
  
    followedButton.addEventListener('mouseenter', () => {
        followedButton.style.transform = 'scale(1.2)';
    });
  
    followedButton.addEventListener('mouseleave', () => {
        followedButton.style.transform = 'scale(1)';
    });
  
    followedButton.addEventListener('mousemove', (e) => {
        const {
            offsetX,
            offsetY
        } = e;
        const {
            clientWidth,
            clientHeight
        } = followedButton;
  
        if (offsetX >= 0 && offsetX <= clientWidth && offsetY >= 0 && offsetY <= clientHeight) {
            const x = (offsetX - clientWidth / 2) / 5;
            const y = (offsetY - clientHeight / 2) / 5;
            followedButton.style.transform = `translate(${x}px, ${y}px) scale(1.2)`;
        }
    });
  });
  