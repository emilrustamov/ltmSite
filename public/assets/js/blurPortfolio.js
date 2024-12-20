document.addEventListener('DOMContentLoaded', () => {
    const gridContainer = document.querySelector('.grid_portfolio');
  
    const onMouseEnter = (event) => {
      const gridItem = event.target.closest('.grid-item');
      if (!gridItem) return;
  
      const image = gridItem.querySelector('img');
      const line = gridItem.querySelector('.line');
      const arrow = gridItem.querySelector('.arrow');
  
      const allImages = gridContainer.querySelectorAll('.grid-item img');
  
      allImages.forEach((img) => {
        if (img !== image) {
          img.classList.add('blur-effect');
        }
      });
  
      if (line) {
        line.style.backgroundColor = '#e31e24';
        line.style.boxShadow = '0px 0px 30px 10px rgba(255, 107, 107, 0.4)';
      }
  
      if (arrow) {
        arrow.classList.add('arrow-visible');
      }
      
      
    };
  
    const onMouseLeave = (event) => {
      const gridItem = event.target.closest('.grid-item');
      if (!gridItem) return;
  
      const allImages = gridContainer.querySelectorAll('.grid-item img');
      allImages.forEach((img) => {
        img.classList.remove('blur-effect');
      });
  
      const line = gridItem.querySelector('.line');
      const arrow = gridItem.querySelector('.arrow');
  
      if (line) {
        line.style.backgroundColor = '';
        line.style.boxShadow = 'none';
      }
  
      if (arrow) {
        arrow.classList.remove('arrow-visible');
      }
      
      
    };
  
    gridContainer.addEventListener('mouseenter', onMouseEnter, true);
    gridContainer.addEventListener('mouseleave', onMouseLeave, true);
  });