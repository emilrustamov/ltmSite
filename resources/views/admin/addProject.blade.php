@extends('layouts.admin')
<!-- ...existing header code... -->
<h4 class="font-bold py-3 mb-4 text-lg">
    <span class="text-gray-500">Projects / </span> Add Projects
</h4>

<form method="POST" enctype="multipart/form-data">
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
                                <textarea class="border border-gray-300 rounded p-2 w-full" id="target_{{ $lang }}" name="target_{{ $lang }}" rows="3" placeholder="Target"></textarea>
                            </div>
                            <div>
                                <label for="res_{{ $lang }}" class="block text-sm font-medium text-gray-700">Result</label>
                                <textarea class="border border-gray-300 rounded p-2 w-full" id="res_{{ $lang }}" name="res_{{ $lang }}" rows="3" placeholder="Result"></textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="w-full px-4 mb-4">
                <label for="formFile" class="block text-sm font-medium text-gray-700">Image</label>
                <input class="border border-gray-300 rounded p-2 w-full" type="file" name="photo" id="formFile" accept="image/*">
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
                                    <option value="{{ $category['id'] }}">{{ $category['category_' . $lang] }}</option>
                                @endforeach
                            </select>
                            <div id="otherInputContainer"></div>
                        </div>
                        <div>
                            <label for="urlButton" class="block text-sm font-medium text-gray-700">Button Link</label>
                            <input class="border border-gray-300 rounded p-2 w-full" type="text" id="urlButton" name="urlButton" placeholder="URL" autofocus />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Должен ли этот проект отображаться на главной странице?</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input class="form-radio text-blue-600" type="radio" name="isMainPage" id="yes" value="1">
                                    <label class="ml-2 text-sm text-gray-700" for="yes">Да</label>
                                </div>
                                <div class="flex items-center">
                                    <input class="form-radio text-blue-600" type="radio" name="isMainPage" id="no" value="0" checked>
                                    <label class="ml-2 text-sm text-gray-700" for="no">Нет</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded me-2">Save</button>
    </div>
</form>

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

