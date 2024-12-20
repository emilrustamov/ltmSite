window.addEventListener('scroll', function () {
  requestAnimationFrame(scrollFunction);
});

function scrollFunction() {
  var scrollVal = window.pageYOffset;
  var scrollSlow = scrollVal / 4;

  var triggerElement = document.querySelector('.about_company');

  if (triggerElement) {
    var triggerRect = triggerElement.getBoundingClientRect();

    // Проверяем, виден ли элемент на экране
    if (triggerRect.top <= window.innerHeight && triggerRect.bottom >= 0) {
      var h2Width = 0;
      var h3Width = 0;

      // Определяем ширину в зависимости от ширины окна
      if (window.innerWidth < 349) {
        h2Width = 64;
        h3Width = 70;
      } else if (window.innerWidth > 349 && window.innerWidth < 487) {
        h2Width = 90;
        h3Width = 64;
      } else if (window.innerWidth > 488 && window.innerWidth < 767) {
        h2Width = 72;
        h3Width = 54;
      } else if (window.innerWidth > 768 && window.innerWidth < 991) {
        h2Width = 52;
        h3Width = 42;
      } else if (window.innerWidth > 991) {
        document.querySelectorAll('.title_back').forEach(function (element) {
          element.style.width = "0";
        });
        h2Width = 48;
        h3Width = 40;
      }

      // Применяем ширину заголовков, ограничивая её значением h2Width и h3Width
      document.getElementById("h2").style.width = Math.min(Math.max(scrollSlow, 0), h2Width) + "%";
      document.getElementById("h3").style.width = Math.min(Math.max(scrollSlow, 0), h3Width) + "%";
      document.getElementById("h2Mobile").style.width = Math.min(Math.max(scrollSlow, 0), h3Width) + "%";
      document.getElementById("h3Mobile").style.width = Math.min(Math.max(scrollSlow, 0), h3Width) + "%";

    } else {
      // Когда элемент выходит из зоны видимости, сбрасываем ширину
      document.getElementById("h2").style.width = "0%";
      document.getElementById("h3").style.width = "0%";
      document.getElementById("h2Mobile").style.width = "0%";
      document.getElementById("h3Mobile").style.width = "0%";
    }
  }
}
