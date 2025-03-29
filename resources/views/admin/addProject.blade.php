@extends('layouts.admin')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Projects / </span> Add Projects
    </h4>

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <!-- Языковые вкладки -->
                <ul class="nav nav-pills flex-column flex-md-row mb-3" id="language-tabs">
                    <li class="nav-item">
                        <span class="nav-link active" data-lang="tm">Turkmen</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-lang="ru">Russian</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-lang="en">English</span>
                    </li>
                </ul>
            </div>

            <!-- Карточки для каждого языка -->
            <div class="card mb-4">
                <hr class="my-0" />
                @foreach (['tm', 'ru', 'en'] as $lang)
                    <div class="card-body info-cards {{ $loop->first ? '' : 'dnone' }}" id="{{ $lang }}-card">
                        <div class="row">
                            <!-- Поля для каждого языка -->
                            <div class="mb-3 col-md-12">
                                <label for="title_{{ $lang }}" class="form-label">Title</label>
                                <input class="form-control" type="text" id="title_{{ $lang }}" name="title_{{ $lang }}" placeholder="Title" autofocus />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="who_{{ $lang }}" class="form-label">Who?</label>
                                <input class="form-control" type="text" id="who_{{ $lang }}" name="who_{{ $lang }}" placeholder="Who?" autofocus />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="desc_{{ $lang }}" class="form-label">Description</label>
                                <textarea class="form-control" id="desc_{{ $lang }}" name="desc_{{ $lang }}" rows="3" placeholder="Description of Product"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="target_{{ $lang }}" class="form-label">Target</label>
                                <textarea class="form-control" id="target_{{ $lang }}" name="target_{{ $lang }}" rows="3" placeholder="Target"></textarea>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="res{{ $lang }}" class="form-label">Result</label>
                                <textarea class="form-control" id="res_{{ $lang }}" name="res_{{ $lang }}" rows="3" placeholder="Result"></textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Общие поля -->
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                </div>
            </div>

            <div class="card mb-4">
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="when" class="form-label">When?</label>
                            <input class="form-control" type="date" id="when" name="when" placeholder="When?" autofocus />
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="what" class="form-label">What?</label>
                            <select class="form-control" name="what[]" multiple onchange="handleSelectChange(this)">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['category_' . $lang] }}</option>
                                @endforeach
                            </select>
                            <div id="otherInputContainer"></div>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="urlButton" class="form-label">Button Link</label>
                            <input class="form-control" type="text" id="urlButton" name="urlButton" placeholder="URL" autofocus />
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="isMainPage" class="form-label">Должен ли этот проект отображаться на главной странице?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isMainPage" id="yes" value="1">
                                <label class="form-check-label" for="yes">Да</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isMainPage" id="no" value="0" checked>
                                <label class="form-check-label" for="no">Нет</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Кнопки отправки и отмены -->
        <div class="mt-5">
            <button type="submit" class="btn btn-primary me-2 send">Save</button>
            <button type="button" class="btn btn-outline-secondary">Cancel</button>
        </div>
    </form>

    <!-- Скрипт для переключения языковых вкладок -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('#language-tabs .nav-link');
            const cards = document.querySelectorAll('.info-cards');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const lang = this.getAttribute('data-lang');

                    // Убираем активный класс у всех вкладок
                    tabs.forEach(t => t.classList.remove('active'));
                    // Добавляем активный класс текущей вкладке
                    this.classList.add('active');

                    // Скрываем все карточки
                    cards.forEach(card => card.classList.add('dnone'));
                    // Показываем карточку для выбранного языка
                    document.getElementById(`${lang}-card`).classList.remove('dnone');
                });
            });
        });

        function handleSelectChange(selectElement) {
            const selectedValue = selectElement.value;
            const otherInputContainer = document.getElementById('otherInputContainer');

            if (selectedValue === 'Other') {
                const inputElement = document.createElement('input');
                inputElement.type = 'text';
                inputElement.id = 'otherInput';
                inputElement.name = 'otherInput';
                inputElement.placeholder = 'Enter other option...';

                const selectAttributes = selectElement.attributes;
                for (let i = 0; i < selectAttributes.length; i++) {
                    const attr = selectAttributes[i];
                    if (attr.name !== 'id' && attr.name !== 'onchange') {
                        inputElement.setAttribute(attr.name, attr.value);
                    }
                }

                const selectOptions = selectElement.querySelectorAll('option');
                selectOptions.forEach(function(option) {
                    const newOption = document.createElement('option');
                    newOption.value = option.value;
                    newOption.text = option.text;
                    inputElement.appendChild(newOption);
                });

                selectElement.parentNode.replaceChild(inputElement, selectElement);
            }
        }
    </script>
@endsection