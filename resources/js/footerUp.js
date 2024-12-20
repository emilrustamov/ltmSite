// jQuery
$(document).ready(function () {
  const $modal = $('#modal');
  const $openModalButton = $('#openModalButton');
  const $openFromMenu = $('#openFromMenu');
  const $requestSign = $('#requestSign');
  const $suggestProject = $('#suggestProject');
  const $closeModalButton = $('#closeModalButton');
  const $closeMobileModalButton = $('#closeMobileModalButton');
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
  $closeMobileModalButton.click(function () {
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
  $(window).scroll(function () {
    checkScrollAndShowButton();
  });

  


});
