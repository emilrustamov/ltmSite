@extends('layouts.admin')
@section('content')
    {{-- <div class="row"> --}}
    {{-- <span class="navBtn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> --}}
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Projects / </span> Add Projects
    </h4>
    {{-- </div> --}}

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item" id="tm-btn">
                        <span class="nav-link active">
                            {{--          <img src="/assets/img/icons/unicons/tm-flag.png" width="20"> --}}
                            Turkmen
                        </span>
                    </li>
                    <li class="nav-item" id="ru-btn">
                        <span class="nav-link">
                            {{--          <img src="/assets/img/icons/unicons/ru-flag.png" width="20"> --}}
                            Russian
                        </span>
                    </li>
                    <li class="nav-item" id="eng-btn">
                        <span class="nav-link">
                            {{--          <img src="/assets/img/icons/unicons/en-flag.png" width="20"> --}}
                            English
                        </span>
                    </li>
                </ul>
            </div>

            {{--    <div class="card-body info-cards"> --}}

            {{--  @if ($errors->any()) --}}
            {{--  <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert"> --}}
            {{--    @foreach ($errors->all() as $err) --}}
            {{--    <span>{{$err}}; </span> --}}
            {{--    @endforeach --}}
            {{--    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            {{--  </div> --}}
            {{--  @endif --}}

            {{-- </div> --}}
            {{-- <div class="col-md-6" h-75> --}}
            <div class="card mb-4">
                <hr class="my-0" />
                {{-- tm-card-info --}}
                <div class="card-body info-cards" id="tm-card">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Title</label>
                            <input class="form-control" type="text" id="firstName" name="title_tm" placeholder="Title"
                                autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Who?</label>
                            <input class="form-control" type="text" id="firstName" name="who_tm" placeholder="Who?"
                                autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc_tm" rows="3"
                                    placeholder="Description of Product"></textarea>
                            </div>
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Target</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="target_tm" rows="3" placeholder="Target"></textarea>
                            </div>
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Result</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="res_tm" rows="3" placeholder="Result"></textarea>
                            </div>
                            @include('editor', [
                                'lang' => 'editor_tm',
                                'fieldName' => 'what_was_done_tm',
                                'content' => $what_was_done_tm,
                            ])
                            {{-- <textarea class="whatWasDone">
              Welcome to TinyMCE!
            </textarea> --}}
                        </div>
                    </div>
                </div>

                {{-- ru-card-info --}}
                <div class="card-body info-cards dnone" id="ru-card">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Title</label>

                            <input class="form-control" type="text" id="firstName" name="title_ru" placeholder="Title"
                                autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Who?</label>
                            <input class="form-control" type="text" id="firstName" name="who_ru" placeholder="Who?"
                                autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc_ru" rows="3"
                                    placeholder="Description of Product"></textarea>
                            </div>
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Target</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="target_ru" rows="3" placeholder="Target"></textarea>
                            </div>
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Result</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="res_ru" rows="3" placeholder="Result"></textarea>
                            </div>
                            @include('editor', [
                                'lang' => 'editor_ru',
                                'fieldName' => 'what_was_done_ru',
                                'content' => $what_was_done_ru,
                            ])
                            {{-- <textarea class="whatWasDone">
            Welcome to TinyMCE!
          </textarea> --}}
                        </div>
                    </div>
                </div>


                {{-- eng-card-info --}}
                <div class="card-body info-cards dnone" id="eng-card">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Title</label>
                            <input class="form-control" type="text" id="firstName" name="title_en"
                                placeholder="Title" autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Who?</label>
                            <input class="form-control" type="text" id="firstName" name="who_en" placeholder="Who?"
                                autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="desc_en" rows="3"
                                    placeholder="Description of Product"></textarea>
                            </div>
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Target</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="target_en" rows="3"
                                    placeholder="Target"></textarea>
                            </div>
                            <div class="mb-3 col-md-12" id="tm-card">
                                <label for="lastName" class="form-label">Result</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="res_en" rows="3" placeholder="Result"></textarea>
                            </div>
                            <style>
                                .toolbar a {
                                    display: inline-block;
                                    border: 1px solid #888;
                                    padding: 5px 8px;
                                    margin: 0 5px 10px 0;
                                    color: #000;
                                    border-radius: 3px;
                                    font-size: 12px;
                                    box-shadow: 1px 1px 2px #ddd;
                                    background: #fff;
                                    vertical-align: top;
                                    text-decoration: none;
                                }

                                .toolbar select {
                                    display: inline-block;
                                    height: 28px;
                                    line-height: 28px;
                                    background: #fff;
                                    padding: 0;
                                    margin: 0 5px 10px 0;
                                    color: #000;
                                    box-shadow: 1px 1px 2px #ddd;
                                    border-radius: 3px;
                                    vertical-align: top;
                                    font-size: 12px;
                                }

                                .toolbar input {
                                    display: inline-block;
                                    height: 28px;
                                    line-height: 28px;
                                    background: #fff;
                                    padding: 0;
                                    margin: 0 5px 10px 0;
                                    color: #000;
                                    box-shadow: 1px 1px 2px #ddd;
                                    border-radius: 3px;
                                    vertical-align: top;
                                    font-size: 12px;
                                }

                                .toolbar span {
                                    display: inline-block;
                                    height: 30px;
                                    line-height: 30px;
                                    padding: 0;
                                    margin: 0 0 10px 0;
                                    color: #000;
                                    vertical-align: top;
                                    font-size: 12px;
                                }

                                .editor {
                                    min-height: 150px;
                                    border: 1px solid #ddd;
                                    padding: 10px;
                                    border-radius: 2px;
                                    box-shadow: 1px 1px 2px #ddd;
                                    background: #fff;
                                }
                            </style>
                            @include('editor', [
                                'lang' => 'editor_en',
                                'fieldName' => 'what_was_done_en',
                                'content' => $what_was_done_en,
                            ])
                            {{-- <textarea class="whatWasDone"> --}}
                            {{-- Welcome to TinyMCE!
            </textarea> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image" id="formFile" accept="image/*">
                </div>
            </div>
            {{-- <div class="col-md-6 h-75"> --}}
            <div class="card mb-4">
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">When?</label>
                            <input class="form-control" type="date" id="firstName" name="when"
                                placeholder="When?" autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">What?</label>
                            <select class="form-control" name="what[]" multiple onchange="handleSelectChange(this)">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['category_' . $lang] }}</option>
                                @endforeach
                            </select>
                            <div id="otherInputContainer"></div>
                        </div>
                        {{-- <div class="mb-3 col-md-12">
            <label for="firstName" class="form-label">What?</label>
            <select class="form-control" name="what[]" multiple onchange="handleSelectChange(this)">
              <option value="CRM">CRM </option>
              <option value="Landing">Landing </option>
              <option value="MultiPage Website">Multi-page website </option>
              <option value="Dashboards">Dashboards </option>
              <option value="Mobile Applications">Mobile Applications </option>
              <option value="Online Shop">Online Shop </option>
              <option value="WebCatalog"> Web-site catalogue </option>
              <option value="Classifieds">Доска Объявлении </option>
              <option value="LogoTiger">LogoTiger</option>
              <option value="Other">Other</option>
            </select>
    <div id="otherInputContainer"></div>
        </div> --}}
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Button Link</label>
                            <input class="form-control" type="text" id="firstName" name="urlButton"
                                placeholder="URL" autofocus />
                            {{--              <span class="text-danger">@error('ru_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Customer</label>
                            <input class="form-control" type="text" id="firstName" name="customer"
                                placeholder="Who ordered the product?" autofocus />
                            {{--              <span class="text-danger">@error('eng_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Curator</label>
                            <input class="form-control" type="text" id="firstName" name="curator"
                                placeholder="Curator" autofocus />
                            {{--              <span class="text-danger">@error('eng_name'){{$message}}@enderror</span> --}}
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="lastName" class="form-label">IT-solutions</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="devNames" rows="3"
                                placeholder="Names of developers"></textarea>
                            <span class="text-danger">
                                @error('tm_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="isMainPage" class="form-label">Должен ли этот проект отображаться на главной
                                странице?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isMainPage" id="yes"
                                    value="1">
                                <label class="form-check-label" for="yes">
                                    Да
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="isMainPage" id="no"
                                    value="0" checked>
                                <label class="form-check-label" for="no">
                                    Нет
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--                <option <?php echo count() != 0 ? 'hidden' : ''; ?> value="">{{__('words.select-hall')}}</option> --}}
        </div>
        <div class="row">
            @include('uploadImage')
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary me-2 send">
                Save
            </button>
            {{-- <a href="/{{$lang}}/admin/exhibits"> --}}
            <button type="button" class="btn btn-outline-secondary ">
                Cancel
            </button>
            {{-- </a> --}}
        </div>
    </form>
    {{-- </div> --}}

    <script>
        function handleSelectChange(selectElement) {
            const selectedValue = selectElement.value;
            const otherInputContainer = document.getElementById('otherInputContainer');

            if (selectedValue === 'Other') {
                // Replace select with an input field
                const inputElement = document.createElement('input');
                inputElement.type = 'text';
                inputElement.id = 'otherInput';
                inputElement.name = 'otherInput'; // Set a name if you need to submit it in a form
                inputElement.placeholder = 'Enter other option...';

                // Copy select's attributes
                const selectAttributes = selectElement.attributes;
                for (let i = 0; i < selectAttributes.length; i++) {
                    const attr = selectAttributes[i];
                    if (attr.name !== 'id' && attr.name !== 'onchange') {
                        inputElement.setAttribute(attr.name, attr.value);
                    }
                }

                // Copy select's options
                const selectOptions = selectElement.querySelectorAll('option');
                selectOptions.forEach(function(option) {
                    const newOption = document.createElement('option');
                    newOption.value = option.value;
                    newOption.text = option.text;
                    inputElement.appendChild(newOption);
                });

                // Replace the select element with the input element
                selectElement.parentNode.replaceChild(inputElement, selectElement);
            }
        }
    </script>
@endsection
