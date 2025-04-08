@extends('layouts.admin')

    <span class="cursor-pointer text-3xl" onclick="openNav()">&#9776;</span>
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
                    {{-- tm-card-info --}}
                    <div class="p-4 info-cards" id="tm-card">
                        <div class="flex flex-col space-y-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">Title</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="firstName" name="title_tm"
                                    value="{{ $portfolio->title['tm'] ?? '' }}" autofocus />
                            </div>

                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">Who?</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="firstName" name="who_tm"
                                    value="{{ $portfolio->who['tm'] ?? '' }}" autofocus />
                            </div>
                            
                            <div class="flex flex-col space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="desc_tm" rows="3">{{ $portfolio->description['tm'] ?? '' }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Target</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="target_tm" rows="3">{{ $portfolio->target['tm'] ?? '' }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Result</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="res_tm" rows="3">{{ $portfolio->result['tm'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ru-card-info --}}
                    <div class="p-4 info-cards hidden" id="ru-card">
                        <div class="flex flex-col space-y-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">Title</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="firstName" name="title_ru"
                                    value="{{ $portfolio->title['ru'] ?? '' }}" autofocus />
                            </div>
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">Who?</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="firstName" name="who_ru"
                                    value="{{ $portfolio->who['ru'] ?? '' }}" autofocus />
                            </div>
                            
                            <div class="flex flex-col space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="desc_ru" rows="3">{{ $portfolio->description['ru'] ?? '' }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Target</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="target_ru" rows="3">{{ $portfolio->target['ru'] ?? '' }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Result</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="res_ru" rows="3">{{ $portfolio->result['ru'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- eng-card-info --}}
                    <div class="p-4 info-cards hidden" id="en-card">
                        <div class="flex flex-col space-y-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">Title</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="firstName" name="title_en"
                                    value="{{ $portfolio->title['en'] ?? '' }}" autofocus />
                            </div>
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">Who?</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="firstName" name="who_en"
                                    value="{{ $portfolio->who['en'] ?? '' }}" autofocus />
                            </div>
                            
                            <div class="flex flex-col space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="desc_en" rows="3">{{ $portfolio->description['en'] ?? '' }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Target</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="target_en" rows="3">{{ $portfolio->target['en'] ?? '' }}</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Result</label>
                                    <textarea class="border border-gray-300 rounded p-2 w-full" id="exampleFormControlTextarea1" name="res_en" rows="3">{{ $portfolio->result['en'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-4 mb-4">
                    <label for="formFile" class="block text-sm font-medium text-gray-700">Image</label>
                    <input class="border border-gray-300 rounded p-2 w-full" type="file" name="image" id="formFile" accept="image/*">
                    @if ($portfolio->photo)
                        <img src="{{ asset('storage/' . $portfolio->photo) }}" alt="Current Image"
                            class="w-24 h-auto mt-2">
                    @endif
                </div>

                <div class="bg-white shadow rounded mb-4 w-full px-4">
                    <hr class="my-0 border-gray-200" />
                    <div class="p-4">
                        <div class="flex flex-col space-y-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">When?</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="date" id="firstName" name="when"
                                    value="{{ $portfolio['when'] }}" autofocus />
                            </div>
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">What?</label>
                                <select class="border border-gray-300 rounded p-2 w-full" name="what[]" multiple onchange="handleSelectChange(this)">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ in_array($category->id, $selectedCategoryIds) ? 'selected' : '' }}>
                                            {{ $category['category_' . $lang] }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="otherInputContainer"></div>
                            </div>
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700">Button Link</label>
                                <input class="border border-gray-300 rounded p-2 w-full" type="text" id="firstName" name="urlButton"
                                    value="{{ $portfolio['urlButton'] ?? '' }}" autofocus>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Должен ли этот проект отображаться на главной странице?</label>
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <input class="form-radio text-blue-600" type="radio" name="isMainPage" id="yes"
                                            value="1" {{ $portfolio['isMainPage'] == 1 ? 'checked' : '' }}>
                                        <label class="ml-2 text-sm text-gray-700" for="yes">Да</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input class="form-radio text-blue-600" type="radio" name="isMainPage" id="no"
                                            value="0" {{ $portfolio['isMainPage'] == 0 ? 'checked' : '' }}>
                                        <label class="ml-2 text-sm text-gray-700" for="no">Нет</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 flex space-x-4 px-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Save</button>
            <button type="button" class="border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded">Cancel</button>
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

