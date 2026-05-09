$(document).ready(function () {
  const $modal = $('#modal');
  const $closeModalButton = $('#closeModalButton');
  const $openTriggers = $('#openModalButton, #openFromMenu, #requestSign, #suggestProject');

  $openTriggers.on('click', function () {
    $('.modal-mobile-content').removeClass('slide-out');
    $modal.show();
    $('body').css('overflow', 'hidden');
  });

  $closeModalButton.on('click', function () {
    $modal.slideUp();
    $('body').css('overflow', 'auto');
  });

  $(window).on('click', function (event) {
    if (event.target === $modal[0]) {
      $modal.hide();
      $('body').css('overflow', 'auto');
    }
  });
});
