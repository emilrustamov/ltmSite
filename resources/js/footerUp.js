// jQuery
$(document).ready(function () {
  const $modal = $('#modal');
  const $openModalButton = $('#openModalButton');
  const $openFromMenu = $('#openFromMenu');
  const $requestSign = $('#requestSign');
  const $suggestProject = $('#suggestProject');
  const $closeModalButton = $('#closeModalButton');
  const $scrollToTopButton = $('#scrollBtn');

  function checkScrollAndShowButton() {
    if ($(document).scrollTop() > 20) {
      $scrollToTopButton.show();
    } else {
      $scrollToTopButton.hide();
    }
  }

  $openModalButton.click(function () {
    $('.modal-mobile-content').removeClass('slide-out');
    $modal.show();
    $('body').css('overflow', 'hidden'); // Отключаем прокрутку
  });
  $openFromMenu.click(function () {
    $modal.show();
    $('body').css('overflow', 'hidden'); // Отключаем прокрутку
  });
  $requestSign.click(function () {
    $modal.show();
    $('body').css('overflow', 'hidden'); // Отключаем прокрутку
  });
  $suggestProject.click(function () {
    $modal.show();
    $('body').css('overflow', 'hidden'); // Отключаем прокрутку
  });

  $closeModalButton.click(function () {
    $modal.slideUp();
    $('body').css('overflow', 'auto'); // Включаем прокрутку обратно
    checkScrollAndShowButton(); // Проверяем положение прокрутки и показываем кнопку
  });





  // Закрываем модальное окно при клике вне его
  $(window).click(function (event) {
    if (event.target === $modal[0]) {
      $modal.hide();
      $('body').css('overflow', 'auto'); // Включаем прокрутку обратно
      checkScrollAndShowButton(); // Проверяем положение прокрутки и показываем кнопку
    }
  });

  // Обновляем отображение кнопки при прокрутке
  // Используем Lenis события, если доступен, иначе fallback на нативный скролл
  const initScrollListeners = () => {
    if (window.lenis) {
      // Слушаем события прокрутки Lenis
      window.lenis.on('scroll', ({ scroll }) => {
        if (scroll > 20) {
          $scrollToTopButton.show();
        } else {
          $scrollToTopButton.hide();
        }
      });
    } else {
      // Fallback на нативный скролл
      $(window).scroll(function () {
        checkScrollAndShowButton();
      });
    }
  };

  // Ждем инициализации Lenis
  if (window.lenis) {
    initScrollListeners();
  } else {
    // Если Lenis еще не загружен, ждем немного и пробуем снова
    const checkLenis = setInterval(() => {
      if (window.lenis) {
        clearInterval(checkLenis);
        initScrollListeners();
      }
    }, 50);
    
    // Останавливаем проверку через 2 секунды, если Lenis так и не загрузился
    setTimeout(() => {
      clearInterval(checkLenis);
      initScrollListeners(); // Инициализируем с fallback на нативный скролл
    }, 2000);
  }



});
