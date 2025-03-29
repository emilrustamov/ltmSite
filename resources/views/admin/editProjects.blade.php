@extends('layouts.admin')
@section('content')
    <span class="navBtn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Projects / </span> Add Projects
    </h4>

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item" id="tm-btn">
                        <span class="nav-link active">Turkmen</span>
                    </li>
                    <li class="nav-item" id="ru-btn">
                        <span class="nav-link">Russian</span>
                    </li>
                    <li class="nav-item" id="eng-btn">
                        <span class="nav-link">English</span>
                    </li>
                </ul>
            </div>

            <div class="card mb-4">
                <hr class="my-0" />
                {{-- tm-card-info --}}
                <div class="card-body info-cards" id="tm-card">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Title</label>
                            <input class="form-control" type="text" id="firstName" name="title_tm"
                                value="{{ json_decode($portfolio['title'], true)['tm'] ?? '' }}" autofocus />
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Who?</label>
                            <input class="form-control" type="text" id="firstName" name="who_tm"
                                value="{{ json_decode($portfolio['who'], true)['tm'] ?? '' }}" autofocus />
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc_tm" rows="3">{{ json_decode($portfolio['description'], true)['tm'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Target</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="target_tm" rows="3">{{ json_decode($portfolio['target'], true)['tm'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Result</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="res_tm" rows="3">{{ json_decode($portfolio['result'], true)['tm'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ru-card-info --}}
                <div class="card-body info-cards dnone" id="ru-card">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Title</label>
                            <input class="form-control" type="text" id="firstName" name="title_ru"
                                value="{{ json_decode($portfolio['title'], true)['ru'] ?? '' }}" autofocus />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Who?</label>
                            <input class="form-control" type="text" id="firstName" name="who_ru"
                                value="{{ json_decode($portfolio['who'], true)['ru'] ?? '' }}" autofocus />
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc_ru" rows="3">{{ json_decode($portfolio['description'], true)['ru'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Target</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="target_ru" rows="3">{{ json_decode($portfolio['target'], true)['ru'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Result</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="res_ru" rows="3">{{ json_decode($portfolio['result'], true)['ru'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- eng-card-info --}}
                <div class="card-body info-cards dnone" id="eng-card">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Title</label>
                            <input class="form-control" type="text" id="firstName" name="title_en"
                                value="{{ json_decode($portfolio['title'], true)['en'] ?? '' }}" autofocus />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Who?</label>
                            <input class="form-control" type="text" id="firstName" name="who_en"
                                value="{{ json_decode($portfolio['who'], true)['en'] ?? '' }}" autofocus />
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc_en" rows="3">{{ json_decode($portfolio['description'], true)['en'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Target</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="target_en" rows="3">{{ json_decode($portfolio['target'], true)['en'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="lastName" class="form-label">Result</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="res_en" rows="3">{{ json_decode($portfolio['result'], true)['en'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 col-md-12">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                @if ($portfolio->photo)
                    <img src="{{ asset('storage/' . $portfolio->photo) }}" alt="Current Image" style="width: 100px; height: auto; margin-top: 10px;">
                @endif
            </div>

            <div class="card mb-4">
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">When?</label>
                            <input class="form-control" type="date" id="firstName" name="when"
                                value="{{ $portfolio['when'] }}" autofocus />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">What?</label>
                            <select class="form-control" name="what[]" multiple onchange="handleSelectChange(this)">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, $selectedCategoryIds) ? 'selected' : '' }}>
                                        {{ $category['category_' . $lang] }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="otherInputContainer"></div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Button Link</label>
                            <input class="form-control" type="text" id="firstName" name="urlButton"
                                value="{{ $portfolio['urlButton'] ?? '' }}" autofocus>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="isMainPage" class="form-label">Должен ли этот проект отображаться на главной
                                странице?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isMainPage" id="yes"
                                    value="1" {{ $portfolio['isMainPage'] == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="yes">Да</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isMainPage" id="no"
                                    value="0" {{ $portfolio['isMainPage'] == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="no">Нет</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary me-2 send">Save</button>
            <button type="button" class="btn btn-outline-secondary">Cancel</button>
        </div>
    </form>

    <script>
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