<div class="editors" style="font-size: 14px; position: relative; padding: 15px 20px;">
    <div class="toolbar">
        <a href="#" class="toolbar-b fas fa-bold" title="Жирный"></a>
        <a href="#" class="toolbar-i fas fa-italic" title="Курсив"></a>
        <a href="#" class="toolbar-u fas fa-underline" title="Подчёркнутый"></a>
        <a href="#" class="toolbar-s fas fa-strikethrough" title="Зачёркнутый"></a>
        <a href="#" class="toolbar-sup fas fa-superscript" title="Верхний индекс"></a>
        <a href="#" class="toolbar-sub fas fa-subscript" title="Нижний индекс"></a>
        <a href="#" class="toolbar-ul fas fa-list-ul" title="Маркированный список"></a>
        <a href="#" class="toolbar-ol fas fa-list-ol" title="Нумерованный список"></a>
        <a href="#" class="toolbar-p" title="Параграф">p</a>
        <a href="#" class="toolbar-h1" title="Заголовок">H1</a>
        <a href="#" class="toolbar-hr" title="Горизонтальная линия">hr</a>
        <a href="#" class="toolbar-blockquote fas fa-quote-right" title="Цитата"></a>
        <a href="#" class="toolbar-img far fa-image" title="Изображение"></a>
        <a href="#" class="toolbar-a fas fa-link" title="Ссылка"></a>
        <a href="#" class="toolbar-unlink fas fa-unlink" title="Удаление ссылки"></a>
        <a href="#" class="toolbar-html" title="Вставить html">HTML</a>
        <a href="#" class="toolbar-text" title="Вставить текст">Text</a>
        <br>
        <a href="#" class="toolbar-left fas fa-align-left" title="по левому краю"></a>
        <a href="#" class="toolbar-center fas fa-align-center" title="по центру"></a>
        <a href="#" class="toolbar-right fas fa-align-right" title="по правому краю"></a>
        <a href="#" class="toolbar-justify fas fa-align-justify" title="по ширине"></a>
        <select class="toolbar-font">
            <option selected="selected" disabled="disabled">Шрифт</option>
            <option value="arial">Arial</option>
            <option value="Courier New">Courier New</option>
            <option value="georgia">Georgia</option>
            <option value="impact">Impact</option>
            <option value="roboto">Tahoma</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="verdana">Verdana</option>
        </select>
        <select class="toolbar-size">
            <option selected="selected" disabled="disabled">Размер</option>
            <option value="1">10px</option>
            <option value="2">12px</option>
            <option value="3">14px</option>
            <option value="4">16px</option>
            <option value="5">18px</option>
            <option value="6">21px</option>
            <option value="7">26px</option>
        </select>
        <span>Цвет</span> <input class="toolbar-color" type="color" value="#ff0000">
        <span>Фон</span> <input class="toolbar-bg" type="color" value="#ffff00">
        <br>
        <a href="#" class="toolbar-undo fas fa-undo" title="Отмена"></a>
        <a href="#" class="toolbar-redo fas fa-redo" title="Повтор"></a>
        <a href="#" class="toolbar-delete far fa-trash-alt" title="Удалить"></a>
        <a href="#" class="toolbar-selectAll">Выделить всё</a>
        <a href="#" class="toolbar-removeFormat">Очистить стили</a>
        <a href="#" class="toolbar-cut fas fa-cut" title="Вырезать"></a>
        <a href="#" class="toolbar-copy fas fa-copy" title="Копировать"></a>
    </div>

    <div class="editor" edit="{{ $lang }}" contenteditable="true"
        oninput="updateHiddenField(this, '{{ $fieldName }}')">
        {!! $content !!}
    </div>
    <input type="hidden" name="{{ $fieldName }}" class="editor_{{ $lang }}" value="{{ $content }}">
</div>

<script>
    function updateHiddenField(editor, name) {
        const hiddenField = document.querySelector(`input[name="${name}"]`);
        hiddenField.value = editor.innerHTML; // Обновляем значение скрытого поля
    }
</script>
