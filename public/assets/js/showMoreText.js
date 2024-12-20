$(document).ready(function() {
    // Находим элементы внутри <summary>
    var summaryText = $('summary p');
    var icon = $('summary svg');

    // Слушаем событие toggle на элементе <details>
    $('details').on('toggle', function() {
        // Если <details> открыт, изменяем текст и иконку
        if ($(this).attr('open')) {
            summaryText.text('Скрыть');
            icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        } else { // Если <details> закрыт, возвращаем изначальные значения
            summaryText.text('Показать ещё');
            icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });

    // Инициализируем иконку при загрузке страницы
    updateIcon();

    // Функция для обновления иконки в зависимости от состояния <details>
    function updateIcon() {
        if ($('details').attr('open')) {
            icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        } else {
            icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    }
    
});
