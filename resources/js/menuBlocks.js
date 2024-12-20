$(document).ready(function () {
    var menuOpen = false; // Флаг для отслеживания состояния модального окна

    $('#menuButton').click(function () {
        if (!menuOpen) {
            animateBlocks();
            console.log('что-то точно произошло, но что...');

            if ($(window).width() < 991) {
                var windowHeight = $(window).height();
                $('.mobile-menu-body').height(windowHeight);
            }
            menuOpen = true; // Устанавливаем флаг, что модальное окно открыто
        }
    });

    $('#closeDesktopModal, #closeMobileModal').click(function () {
        var menu = $('#complexMenuModal');
        menu.fadeOut(); // Используем fadeOut вместо slideUp
        menuOpen = false; // Устанавливаем флаг, что модальное окно закрыто
        simulateButtonClick(); // Вызываем функцию для симуляции клика
    });

    // Функция для симуляции клика на кнопку
    function simulateButtonClick() {
        $('#menuButton').click();
    }

    function animateBlocks() {
        $('#instLink').mouseenter(function () {
            $('#linkAddress').text('https://www.instagram.com/');
        });

        $('#linkedLink').mouseenter(function () {
            $('#linkAddress').text('https://www.linkedin.com/');
        });

        $('#blogLink').mouseenter(function () {
            $('#linkAddress').text('https://arassanusga.com/blog');
        });

        $('#links a').mouseleave(function () {
            $('#linkAddress').text('Выберите ссылку');
        });
    }
});
