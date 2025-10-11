@extends('layouts.admin')

@section('page-title', 'Добавить проект')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="mb-6">
        <h4 class="text-2xl font-bold text-gray-800">
            <span class="text-gray-500">Проекты / </span> Добавить проект
        </h4>
    </div>

<form method="POST" action="{{ route('lang.admin.add_project.submit', ['lang' => $lang]) }}" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4">
            <ul class="flex flex-col md:flex-row mb-3" id="language-tabs">
                <li class="mr-2 mb-2 md:mb-0">
                    <span class="cursor-pointer px-4 py-2 rounded bg-blue-500 text-white" data-lang="tm">Turkmen</span>
                </li>
                <li class="mr-2 mb-2 md:mb-0">
                    <span class="cursor-pointer px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white" data-lang="ru">Russian</span>
                </li>
                <li class="mr-2 mb-2 md:mb-0">
                    <span class="cursor-pointer px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white" data-lang="en">English</span>
                </li>
            </ul>
        </div>

        <div class="w-full px-4">
            <div class="bg-white shadow rounded mb-4">
                <hr class="my-0 border-gray-200" />
                @foreach (['tm', 'ru', 'en'] as $lang)
                    <div class="p-4 info-cards {{ $loop->first ? '' : 'hidden' }}" id="{{ $lang }}-card">
                        <div class="flex flex-col space-y-4">
                            <div>
                                <label for="title_{{ $lang }}" class="block text-sm font-medium text-gray-700">Title</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="title_{{ $lang }}" name="title_{{ $lang }}" placeholder="Title" autofocus />
                            </div>
                            <div>
                                <label for="who_{{ $lang }}" class="block text-sm font-medium text-gray-700">Who?</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="who_{{ $lang }}" name="who_{{ $lang }}" placeholder="Who?" autofocus />
                            </div>
                            <div>
                                <label for="desc_{{ $lang }}" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea class="border border-gray-300 rounded p-2 w-full" id="desc_{{ $lang }}" name="desc_{{ $lang }}" rows="3" placeholder="Description of Product"></textarea>
                            </div>
                            <div>
                                <label for="target_{{ $lang }}" class="block text-sm font-medium text-gray-700">Target</label>
                                <textarea class="border border-gray-300 rounded p-2 w-full rich-editor" id="target_{{ $lang }}" name="target_{{ $lang }}" rows="3" placeholder="Target"></textarea>
                            </div>
                            <div>
                                <label for="res_{{ $lang }}" class="block text-sm font-medium text-gray-700">Result</label>
                                <textarea class="border border-gray-300 rounded p-2 w-full rich-editor" id="res_{{ $lang }}" name="res_{{ $lang }}" rows="3" placeholder="Result"></textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="w-full px-4 mb-4">
                <label for="formFile" class="block text-sm font-medium text-gray-700">Image</label>
                <input class="border border-gray-300 rounded p-2 w-full" type="file" name="image" id="formFile" accept="image/*">
            </div>

            <div class="bg-white shadow rounded mb-4 w-full px-4">
                <hr class="my-0 border-gray-200" />
                <div class="p-4">
                    <div class="flex flex-col space-y-4">
                        <div>
                            <label for="when" class="block text-sm font-medium text-gray-700">When?</label>
                            <input class="border border-gray-300 rounded p-2 w-full" type="date" id="when" name="when" placeholder="When?" autofocus />
                        </div>
                        <div>
                            <label for="what" class="block text-sm font-medium text-gray-700">What?</label>
                                <select class="border border-gray-300 rounded p-2 w-full" name="what[]" multiple onchange="handleSelectChange(this)">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->translation($lang)?->name ?? '' }}</option>
                                @endforeach
                            </select>
                            <div id="otherInputContainer"></div>
                        </div>
                        <div>
                            <label for="url_button" class="block text-sm font-medium text-gray-700">Button Link</label>
                            <input class="border border-gray-300 rounded p-2 w-full" type="text" id="url_button" name="url_button" placeholder="URL" autofocus />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Должен ли этот проект отображаться на главной странице?</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input class="form-radio text-blue-600" type="radio" name="is_main_page" id="yes" value="1">
                                    <label class="ml-2 text-sm text-gray-700" for="yes">Да</label>
                                </div>
                                <div class="flex items-center">
                                    <input class="form-radio text-blue-600" type="radio" name="is_main_page" id="no" value="0" checked>
                                    <label class="ml-2 text-sm text-gray-700" for="no">Нет</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center space-x-3">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-sm hover:shadow-md">
            <i class="fas fa-save mr-2"></i> Сохранить
        </button>
        <a href="{{ route('lang.admin.all_projects', ['lang' => $lang]) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-lg transition duration-200">
            <i class="fas fa-times mr-2"></i> Отмена
        </a>
    </div>
</form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('#language-tabs .cursor-pointer');
        const cards = document.querySelectorAll('.info-cards');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                const lang = this.getAttribute('data-lang');

                tabs.forEach(t => t.classList.remove('bg-blue-500','text-white'));
                tabs.forEach(t => t.classList.add('bg-gray-200','text-gray-700'));
                this.classList.remove('bg-gray-200','text-gray-700');
                this.classList.add('bg-blue-500','text-white');

                cards.forEach(card => card.classList.add('hidden'));
                document.getElementById(`${lang}-card`).classList.remove('hidden');
            });
        });
    });
</script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    document.querySelectorAll('.rich-editor').forEach(editor => {
         CKEDITOR.replace(editor);
    });
</script>

<style>
    .cke_notification_warning {
        display: none !important;
    }
</style>
@endsection