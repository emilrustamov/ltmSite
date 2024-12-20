@extends('layouts.admin')
@section('content')

<span class="navBtn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Articles / </span> Edit Article
</h4>

<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-tm-tab" data-bs-toggle="pill" href="#pills-tm" role="tab" aria-controls="pills-tm" aria-selected="true">Turkmen</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-ru-tab" data-bs-toggle="pill" href="#pills-ru" role="tab" aria-controls="pills-ru" aria-selected="false">Russian</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-eng-tab" data-bs-toggle="pill" href="#pills-eng" role="tab" aria-controls="pills-eng" aria-selected="false">English</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                {{-- Turkmen Tab --}}
                <div class="tab-pane fade show active" id="pills-tm" role="tabpanel" aria-labelledby="pills-tm-tab">
                    <div class="mb-3">
                        <label for="title_tm" class="form-label">Title</label>
                        <input class="form-control" type="text" id="title_tm" name="title_tm" value="{{$blog['title_tm']}}" placeholder="Title" autofocus/>
                    </div>
                    @include('editor', ['lang' => 'editor_tm', 'fieldName' => 'desc_tm']) <!-- Вставка редактора для Туркменского -->
                </div>

                {{-- Russian Tab --}}
                <div class="tab-pane fade" id="pills-ru" role="tabpanel" aria-labelledby="pills-ru-tab">
                    <div class="mb-3">
                        <label for="title_ru" class="form-label">Title</label>
                        <input class="form-control" type="text" id="title_ru" name="title_ru" value="{{$blog['title_ru']}}" placeholder="Title"/>
                    </div>
                    @include('editor', ['lang' => 'editor_ru', 'fieldName' => 'desc_ru']) <!-- Вставка редактора для Русского -->
                </div>

                {{-- English Tab --}}
                <div class="tab-pane fade" id="pills-eng" role="tabpanel" aria-labelledby="pills-eng-tab">
                    <div class="mb-3">
                        <label for="title_en" class="form-label">Title</label>
                        <input class="form-control" type="text" id="title_en" name="title_en" value="{{$blog['title_en']}}" placeholder="Title"/>
                    </div>
                    @include('editor', ['lang' => 'editor_en', 'fieldName' => 'desc_en']) <!-- Вставка редактора для Английского -->
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
            </div>
        </div>

        <div class="card mb-4">
            <hr class="my-0" />
            <div class="card-body">
                <div class="mb-3 col-md-12">
                    <label for="select" class="form-label">What?</label>
                    <select class="form-control" name="what" id="select" onchange="handleSelectChange(this)">
                        <option value="Different">Всякое</option>
                        <option value="News">Новости</option>
                        <option value="Useful">Полезности</option>
                        <option value="Digital">Статьи про диджитал</option>
                        <option value="Other">Other</option>
                    </select>
                    <div id="otherInputContainer-blog"></div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary me-2 send">
                Save
            </button>
            <button type="button" class="btn btn-outline-secondary">
                Cancel
            </button>
        </div>
    </div>
</form>

<script>
    function handleSelectChange(selectElement) {
        const selectedValue = selectElement.value;
        const otherInputContainer = document.getElementById('otherInputContainer-blog');

        if (selectedValue === 'Other') {
            const inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.id = 'otherInput';
            inputElement.name = 'otherInput'; // Set a name if you need to submit it in a form
            inputElement.placeholder = 'Enter other option...';

            selectElement.parentNode.replaceChild(inputElement, selectElement);
        }
    }
</script>
@endsection
