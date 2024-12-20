var cursorOuter = document.querySelector('.cursor-outer');
var cursorInner = document.querySelector('.cursor-inner');
var links = document.querySelectorAll('a');

document.addEventListener('mousemove', function(e) {
  var x = e.clientX;
  var y = e.clientY;

  cursorOuter.style.transform = 'translate3d(' + (x - 27) + 'px, ' + (y - 27) + 'px, 0)';
  
  
  // Вычисляем координаты для cursor-inner
  var innerX = x - cursorInner.offsetWidth / 2;
  var innerY = y - cursorInner.offsetHeight / 2;

  cursorInner.style.left = innerX + 'px';
  cursorInner.style.top = innerY + 'px';
});

document.addEventListener('click', function() {
  cursorOuter.classList.add('click');
  cursorInner.classList.add('cursorinnerhover');
  setTimeout(function() {
    cursorOuter.classList.remove('click');
    cursorInner.classList.remove('cursorinnerhover');
  }, 100);
});

links.forEach(function(link) {
  link.addEventListener('mouseover', function() {
    cursorOuter.classList.add('hover');
  });
  link.addEventListener('mouseleave', function() {
    cursorOuter.classList.remove('hover');
  });
});
