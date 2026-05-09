@extends('layouts.base')

@section('title', 'Подать заявку на работу - LTM')
@section('metaDesc', 'Подайте заявку на работу в LTM. Заполните форму и станьте частью нашей команды!')
@section('metaKey', 'работа, заявка, LTM, вакансии, карьера')

@section('content')
<section class="container">
    <style>
        .application-section-title {
            font-size: clamp(24px, 4vw, 32px);
            font-weight: 600;
            line-height: 1.2;
        }
        
        /* Скрытие значка reCAPTCHA */
        .grecaptcha-badge {
            visibility: hidden !important;
            opacity: 0 !important;
            display: none !important;
        }
    </style>
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white">
            Подать заявку на работу
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Заполните форму ниже, чтобы подать заявку на работу в нашей компании
        </p>
                </div>
                    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                            <h6 class="font-semibold flex items-center mb-2">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Пожалуйста, исправьте следующие ошибки:
                            </h6>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="w-full" data-protected-form="true" data-recaptcha-action="submit_application" data-ajax-submit="true" data-work-experience-index="{{ old('work_experiences') ? count(old('work_experiences')) : 0 }}" data-educational-institution-index="{{ old('educational_institutions') ? count(old('educational_institutions')) : 0 }}" data-skills-url="{{ route('api.positions.skills') }}" id="application-form">
                        @csrf
                        <input type="hidden" name="position" value="{{ old('position', request('position')) }}">
                        <x-protected-form-fields id-prefix="application" />
                        
        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Личная информация</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                 <label class="field">
                                    <input type="text" 
                            class="field-input field-input-full-width @error('name') border-red-500 @enderror" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                            placeholder="Ваше имя *"
                            required>
                                    @error('name')
                         <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    </label>
                <label class="field">
                                    <input type="text" 
                           class="field-input field-input-full-width @error('surname') border-red-500 @enderror" 
                                           name="surname" 
                                           value="{{ old('surname') }}" 
                           placeholder="Ваша фамилия *"
                                           required>
                                    @error('surname')
                         <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <label class="field">
                                    <input type="email" 
                           class="field-input field-input-full-width @error('email') border-red-500 @enderror" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                           placeholder="Ваш email *"
                                           required>
                                    @error('email')
                         <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    </label>
                <label class="field">
                                    <input type="tel" 
                           class="field-input field-input-full-width @error('phone') border-red-500 @enderror" 
                                           name="phone" 
                                           value="{{ old('phone') }}" 
                           placeholder="Ваш телефон *"
                                           required>
                                    @error('phone')
                         <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="field">
                                    <div class="field-label">Дата рождения *</div>
                                    <input type="date" 
                           class="field-input field-input-full-width @error('date_of_birth') border-red-500 @enderror" 
                                           name="date_of_birth" 
                                           value="{{ old('date_of_birth') }}"
                                           required>
                                    @error('date_of_birth')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    </div>
                <div class="field">
                                    <div class="field-label">Ожидаемая зарплата *</div>
                                    <input type="text" 
                           class="field-input field-input-full-width @error('expected_salary') border-red-500 @enderror" 
                                           name="expected_salary" 
                                           value="{{ old('expected_salary') }}" 
                                           required>
                                    @error('expected_salary')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                </div>
                            </div>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Дополнительная информация</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <label class="field">
                                    <input type="url" 
                           class="field-input field-input-full-width @error('linkedin_url') border-red-500 @enderror" 
                                           name="linkedin_url" 
                                           value="{{ old('linkedin_url') }}" 
                           placeholder="LinkedIn профиль">
                                    @error('linkedin_url')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                </label>
                <label class="field">
                                    <input type="url" 
                           class="field-input field-input-full-width @error('github_url') border-red-500 @enderror" 
                                           name="github_url" 
                                           value="{{ old('github_url') }}" 
                           placeholder="GitHub профиль">
                                    @error('github_url')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                </label>
                            </div>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Резюме</h2>
            <label class="field">
                                    <input type="file" 
                       class="field-input field-input-full-width @error('cv_file') border-red-500 @enderror" 
                                           name="cv_file" 
                                           accept=".pdf,.doc,.docx"
                                           required>
                <div class="text-gray-400 text-sm mt-2">Поддерживаемые форматы: PDF, DOC, DOCX. Максимальный размер: 10MB</div>
                                    @error('cv_file')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
            </label>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Дополнительная информация</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <label class="field">
                    <textarea class="field-input field-textarea w-100 @error('personal_info') border-red-500 @enderror" 
                                              name="personal_info" 
                                              rows="3" 
                                              placeholder="Расскажите о себе...">{{ old('personal_info') }}</textarea>
                                    @error('personal_info')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                </label>
                <label class="field">
                    <textarea class="field-input field-textarea w-100 @error('contact_info') border-red-500 @enderror" 
                                              name="contact_info" 
                                              rows="3" 
                                              placeholder="Дополнительные контакты...">{{ old('contact_info') }}</textarea>
                                    @error('contact_info')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                </label>
                                </div>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Местоположение</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="field">
                        <select class="field-input field-input-full-width @error('city_id') border-red-500 @enderror" 
                                            name="city_id" 
                                id="city_id"
                                            required>
                                        <option value="">Выберите город</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                    </label>
                     <div class="flex items-center mt-4">
                         <input type="checkbox" id="custom_city_check" name="custom_city_check" {{ old('custom_city_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                         <label for="custom_city_check" class="text-white text-3xl cursor-pointer">Моего города нет в списке</label>
                                    </div>
                                    <input type="text" 
                           class="field-input field-input-full-width mt-2 @error('custom_city') border-red-500 @enderror" 
                                           id="custom_city" 
                                           name="custom_city" 
                                           value="{{ old('custom_city') }}" 
                                           placeholder="Введите свой город" 
                                           style="{{ old('custom_city_check') ? '' : 'display:none;' }}">
                                    @error('custom_city')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                <label class="field">
                                    <input type="text" 
                           class="field-input field-input-full-width @error('registration_address') border-red-500 @enderror" 
                                           name="registration_address" 
                                           value="{{ old('registration_address') }}" 
                           placeholder="Адрес по прописке *"
                                           required>
                                    @error('registration_address')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                </label>
                            </div>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Как вы узнали о нас?</h2>
            <div>
                <label class="field">
                    <select class="field-input field-input-full-width @error('source_id') border-red-500 @enderror" 
                                            name="source_id" 
                            id="source_id"
                                            required>
                                        <option value="">Выберите источник</option>
                                        @foreach($sources as $source)
                                            <option value="{{ $source->id }}" {{ old('source_id') == $source->id ? 'selected' : '' }}>
                                                {{ $source->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('source_id')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                </label>
                 <div class="flex items-center mt-4">
                     <input type="checkbox" id="custom_source_check" name="custom_source_check" {{ old('custom_source_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                     <label for="custom_source_check" class="text-white text-3xl cursor-pointer">Другой источник</label>
                                    </div>
                                    <input type="text" 
                       class="field-input field-input-full-width mt-2 @error('custom_source') border-red-500 @enderror" 
                                           id="custom_source" 
                                           name="custom_source" 
                                           value="{{ old('custom_source') }}" 
                                           placeholder="Укажите источник" 
                                           style="{{ old('custom_source_check') ? '' : 'display:none;' }}">
                                    @error('custom_source')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Работа и образование</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="field">
                        <select class="field-input field-input-full-width @error('work_format_id') border-red-500 @enderror" 
                                            name="work_format_id" 
                                id="work_format_id"
                                            required>
                            <option value="">Выберите формат работы</option>
                                        @foreach($workFormats as $format)
                                            <option value="{{ $format->id }}" {{ old('work_format_id') == $format->id ? 'selected' : '' }}>
                                                {{ $format->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('work_format_id')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                    </label>
                     <div class="flex items-center mt-4">
                         <input type="checkbox" id="custom_work_format_check" name="custom_work_format_check" {{ old('custom_work_format_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                         <label for="custom_work_format_check" class="text-white text-3xl cursor-pointer">Другой формат работы</label>
                                    </div>
                                    <input type="text" 
                           class="field-input field-input-full-width mt-2 @error('custom_work_format') border-red-500 @enderror" 
                                           id="custom_work_format" 
                                           name="custom_work_format" 
                                           value="{{ old('custom_work_format') }}" 
                                           placeholder="Укажите формат работы" 
                                           style="{{ old('custom_work_format_check') ? '' : 'display:none;' }}">
                                    @error('custom_work_format')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                <div>
                    <label class="field">
                        <select class="field-input field-input-full-width @error('education_id') border-red-500 @enderror" 
                                            name="education_id" 
                                id="education_id"
                                            required>
                                        <option value="">Выберите образование</option>
                                        @foreach($educations as $education)
                                            <option value="{{ $education->id }}" {{ old('education_id') == $education->id ? 'selected' : '' }}>
                                                {{ $education->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('education_id')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                    </label>
                     <div class="flex items-center mt-4">
                         <input type="checkbox" id="custom_education_check" name="custom_education_check" {{ old('custom_education_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                         <label for="custom_education_check" class="text-white text-3xl cursor-pointer">Другое образование</label>
                                    </div>
                                    <input type="text" 
                           class="field-input field-input-full-width mt-2 @error('custom_education') border-red-500 @enderror" 
                                           id="custom_education" 
                                           name="custom_education" 
                                           value="{{ old('custom_education') }}" 
                                           placeholder="Укажите образование" 
                                           style="{{ old('custom_education_check') ? '' : 'display:none;' }}">
                                    @error('custom_education')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Профессиональные планы</h2>
            <label class="field">
                <textarea class="field-input field-textarea w-100 @error('professional_plans') border-red-500 @enderror" 
                                              name="professional_plans" 
                                              rows="4" 
                          placeholder="Расскажите о ваших профессиональных планах *"
                                              required>{{ old('professional_plans') }}</textarea>
                                    @error('professional_plans')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
            </label>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Профессиональные данные</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4 text-white">Интересующие должности</h3>
                    <div class="space-y-3">
                                        @foreach($jobPositions as $position)
                            <div class="flex items-center">
                                <input type="checkbox" 
                                                       id="job_position_{{ $position->id }}" 
                                                       name="job_positions[]" 
                                                       value="{{ $position->id }}"
                                       {{ in_array($position->id, old('job_positions', $selectedPosition ? [$selectedPosition->id] : [])) ? 'checked' : '' }}
                                       class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                                <label for="job_position_{{ $position->id }}" class="text-white text-3xl cursor-pointer">
                                                    {{ $position->name_ru }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4 text-white">Технические навыки</h3>
                    <div id="skills-placeholder" class="text-gray-400 mb-4" style="display: none;">
                                            Выберите интересующие должности, чтобы увидеть релевантные навыки
                                        </div>
                    <div class="space-y-3">
                                        @foreach($technicalSkills as $skill)
                            <div class="flex items-center">
                                <input type="checkbox" 
                                                       id="technical_skill_{{ $skill->id }}" 
                                                       name="technical_skills[]" 
                                                       value="{{ $skill->id }}"
                                       {{ in_array($skill->id, old('technical_skills', [])) ? 'checked' : '' }}
                                       class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                                <label for="technical_skill_{{ $skill->id }}" class="text-white text-3xl cursor-pointer">
                                                    {{ $skill->name_ru }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                    <label class="field mt-4">
                                    <input type="text" 
                               class="field-input field-input-full-width @error('custom_technical_skill') border-red-500 @enderror" 
                                           name="custom_technical_skill" 
                                           value="{{ old('custom_technical_skill') }}" 
                                           placeholder="Другие навыки (через запятую)">
                                    @error('custom_technical_skill')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                    </label>
                                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4 text-white">Языки</h3>
                    <div class="space-y-3">
                                        @foreach($languages as $language)
                            <div class="flex items-center">
                                <input type="checkbox" 
                                                       id="language_{{ $language->id }}" 
                                                       name="languages[]" 
                                                       value="{{ $language->id }}"
                                       {{ in_array($language->id, old('languages', [])) ? 'checked' : '' }}
                                       class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                                <label for="language_{{ $language->id }}" class="text-white text-3xl cursor-pointer">
                                                    {{ $language->name_ru }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                    <label class="field mt-4">
                                    <input type="text" 
                               class="field-input field-input-full-width @error('custom_language') border-red-500 @enderror" 
                                           name="custom_language" 
                                           value="{{ old('custom_language') }}" 
                                           placeholder="Другие языки (через запятую)">
                                    @error('custom_language')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                    </label>
                                </div>
                            </div>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Опыт работы</h2>
                            <div id="work_experiences_container">
                                @if(old('work_experiences'))
                                    @foreach(old('work_experiences') as $index => $experience)
                        <div class="work-experience-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">
                            <button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <label class="field">
                                    <input type="text" 
                                           class="field-input field-input-full-width @error('work_experiences.'.$index.'.company_name') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][company_name]" 
                                           value="{{ $experience['company_name'] ?? '' }}" 
                                           placeholder="Название компании *"
                                           required>
                                    <span class="field-label">Название компании *</span>
                                    @error('work_experiences.'.$index.'.company_name')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </label>
                                <label class="field">
                                    <input type="text" 
                                           class="field-input field-input-full-width @error('work_experiences.'.$index.'.position') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][position]" 
                                           value="{{ $experience['position'] ?? '' }}" 
                                           placeholder="Должность *"
                                           required>
                                    <span class="field-label">Должность *</span>
                                    @error('work_experiences.'.$index.'.position')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </label>
                                                </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <div class="field">
                                    <div class="field-label">Дата начала *</div>
                                    <input type="date" 
                                           class="field-input field-input-full-width @error('work_experiences.'.$index.'.start_date') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][start_date]" 
                                           value="{{ $experience['start_date'] ?? '' }}" 
                                           required>
                                    @error('work_experiences.'.$index.'.start_date')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field">
                                    <div class="field-label">Дата окончания</div>
                                    <input type="date" 
                                           class="field-input field-input-full-width @error('work_experiences.'.$index.'.end_date') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][end_date]" 
                                           value="{{ $experience['end_date'] ?? '' }}">
                                    @error('work_experiences.'.$index.'.end_date')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                                </div>
                            <label class="field">
                                <textarea class="field-input field-textarea w-100 @error('work_experiences.'.$index.'.description') border-red-500 @enderror" 
                                          name="work_experiences[{{ $index }}][description]" 
                                          rows="3" 
                                          placeholder="Описание обязанностей">{{ $experience['description'] ?? '' }}</textarea>
                                    @error('work_experiences.'.$index.'.description')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
            <button type="button" class="btn add-plus text-white bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg transition-colors cursor-pointer border-2 border-red-600 hover:border-red-700" id="add_work_experience" onclick="if(typeof addWorkExperience === 'function') { addWorkExperience(); } else { console.error('addWorkExperience не найдена'); }">
                Добавить опыт работы
            </button>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Образование</h2>
                            <div id="educational_institutions_container">
                                @if(old('educational_institutions'))
                                    @foreach(old('educational_institutions') as $index => $institution)
                        <div class="educational-institution-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">
                            <button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>
                            <div class="mb-4">
                                <label class="field">
                                    <input type="text" 
                                           class="field-input field-input-full-width @error('educational_institutions.'.$index.'.institution_name') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][institution_name]" 
                                           value="{{ $institution['institution_name'] ?? '' }}" 
                                           placeholder="Название учебного заведения *"
                                           required>
                                    @error('educational_institutions.'.$index.'.institution_name')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </label>
                                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <label class="field">
                                    <input type="text" 
                                           class="field-input field-input-full-width @error('educational_institutions.'.$index.'.degree') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][degree]" 
                                           value="{{ $institution['degree'] ?? '' }}" 
                                           placeholder="Степень/Специальность">
                                    @error('educational_institutions.'.$index.'.degree')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </label>
                                <label class="field">
                                    <input type="text" 
                                           class="field-input field-input-full-width @error('educational_institutions.'.$index.'.faculty') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][faculty]" 
                                           value="{{ $institution['faculty'] ?? '' }}" 
                                           placeholder="Факультет">
                                    @error('educational_institutions.'.$index.'.faculty')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </label>
                                                </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <label class="field">
                                    <input type="date" 
                                           class="field-input field-input-full-width @error('educational_institutions.'.$index.'.start_date') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][start_date]" 
                                           value="{{ $institution['start_date'] ?? '' }}">
                                    @error('educational_institutions.'.$index.'.start_date')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </label>
                                <label class="field">
                                    <input type="date" 
                                           class="field-input field-input-full-width @error('educational_institutions.'.$index.'.end_date') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][end_date]" 
                                           value="{{ $institution['end_date'] ?? '' }}">
                                    @error('educational_institutions.'.$index.'.end_date')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </label>
                                                </div>
                            <label class="field">
                                <textarea class="field-input field-textarea w-100 @error('educational_institutions.'.$index.'.description') border-red-500 @enderror" 
                                          name="educational_institutions[{{ $index }}][description]" 
                                          rows="3" 
                                          placeholder="Дополнительная информация">{{ $institution['description'] ?? '' }}</textarea>
                                    @error('educational_institutions.'.$index.'.description')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
            <button type="button" class="btn add-plus text-white bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg transition-colors cursor-pointer border-2 border-red-600 hover:border-red-700" id="add_educational_institution" onclick="if(typeof addEducationalInstitution === 'function') { addEducationalInstitution(); } else { console.error('addEducationalInstitution не найдена'); }">
                Добавить образование
            </button>
                        </div>

        <div class="mb-12">
            <h2 class="application-section-title mb-8 text-white">Дополнительные заметки</h2>
            <label class="field">
                <textarea class="field-input field-textarea w-100 @error('other_notes') border-red-500 @enderror" 
                                          name="other_notes" 
                                          rows="3" 
                                          placeholder="Любая дополнительная информация...">{{ old('other_notes') }}</textarea>
                                    @error('other_notes')
                        <div class="text-red-400 text-sm mt-2">{{ $message }}</div>
                                    @enderror
            </label>
                        </div>

        <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
            <a href="/" class="text-white hover:text-red-400 transition-colors">
                ← Назад на главную
            </a>
            <button type="submit" class="btn send-p text-white bg-red-600 hover:bg-red-700 px-8 py-4 rounded-lg text-lg font-bold" data-form-submit data-submitting-text="Отправляем...">
                Отправить заявку
            </button>
                        </div>
                        
        <!-- Требование Google reCAPTCHA: ссылка на политику конфиденциальности -->
        <div class="text-center mb-6">
            <p class="text-gray-400 text-sm">
                Этот сайт защищен reCAPTCHA. Применяются 
                <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer" class="text-red-400 hover:text-red-300 underline">Политика конфиденциальности</a> 
                и 
                <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer" class="text-red-400 hover:text-red-300 underline">Условия использования</a> 
                Google.
            </p>
        </div>
                    </form>
</section>

@endsection
