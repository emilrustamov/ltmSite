@extends('layouts.base')

@section('title', 'Подать заявку на работу - LTM')
@section('metaDesc', 'Подайте заявку на работу в LTM. Заполните форму и станьте частью нашей команды!')
@section('metaKey', 'работа, заявка, LTM, вакансии, карьера')

@section('content')
<section class="container mx-auto px-4 py-8">
    <!-- Заголовок -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white">
            Подать заявку на работу
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Заполните форму ниже, чтобы подать заявку на работу в нашей компании
        </p>
                </div>
           <!-- Сообщения об ошибках и успехе -->
                    @if (session('success'))
               <div style="background: linear-gradient(135deg, #10B981, #059669); color: white; padding: 20px; margin: 20px; border-radius: 10px; text-align: center; font-size: 18px; font-weight: bold; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);">
                   <i class="fas fa-check-circle" style="font-size: 24px; margin-right: 10px;"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-6 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

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

    <!-- Форма в стиле LTM -->
    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto">
                        @csrf
                        
                        <!-- Личная информация -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Личная информация</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                 <label class="field">
                                    <input type="text" 
                            class="field-input w-100 @error('name') border-red-500 @enderror" 
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
                           class="field-input w-100 @error('surname') border-red-500 @enderror" 
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
                           class="field-input w-100 @error('email') border-red-500 @enderror" 
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
                           class="field-input w-100 @error('phone') border-red-500 @enderror" 
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
                <label class="field">
                                    <input type="date" 
                           class="field-input w-100 @error('date_of_birth') border-red-500 @enderror" 
                                           name="date_of_birth" 
                                           value="{{ old('date_of_birth') }}"
                                           required>
                                    </label>
                <label class="field">
                                    <input type="text" 
                           class="field-input w-100 @error('expected_salary') border-red-500 @enderror" 
                                           name="expected_salary" 
                                           value="{{ old('expected_salary') }}" 
                           placeholder="Ожидаемая зарплата *"
                                           required>
                </label>
                            </div>
                        </div>

                        <!-- Дополнительная информация -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Дополнительная информация</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <label class="field">
                                    <input type="url" 
                           class="field-input w-100 @error('linkedin_url') border-red-500 @enderror" 
                                           name="linkedin_url" 
                                           value="{{ old('linkedin_url') }}" 
                           placeholder="LinkedIn профиль">
                </label>
                <label class="field">
                                    <input type="url" 
                           class="field-input w-100 @error('github_url') border-red-500 @enderror" 
                                           name="github_url" 
                                           value="{{ old('github_url') }}" 
                           placeholder="GitHub профиль">
                </label>
                            </div>
                        </div>

                        <!-- CV файл -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Резюме</h2>
            <label class="field">
                                    <input type="file" 
                       class="field-input w-100 @error('cv_file') border-red-500 @enderror" 
                                           name="cv_file" 
                                           accept=".pdf,.doc,.docx"
                                           required>
                <div class="text-gray-400 text-sm mt-2">Поддерживаемые форматы: PDF, DOC, DOCX. Максимальный размер: 10MB</div>
            </label>
                        </div>

                        <!-- Дополнительная информация -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Дополнительная информация</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <label class="field">
                    <textarea class="field-input field-textarea w-100 @error('personal_info') border-red-500 @enderror" 
                                              name="personal_info" 
                                              rows="3" 
                                              placeholder="Расскажите о себе...">{{ old('personal_info') }}</textarea>
                </label>
                <label class="field">
                    <textarea class="field-input field-textarea w-100 @error('contact_info') border-red-500 @enderror" 
                                              name="contact_info" 
                                              rows="3" 
                                              placeholder="Дополнительные контакты...">{{ old('contact_info') }}</textarea>
                </label>
                                </div>
            <label class="field">
                <textarea class="field-input field-textarea w-100 @error('general_info') border-red-500 @enderror" 
                                              name="general_info" 
                                              rows="3" 
                                              placeholder="Любая дополнительная информация...">{{ old('general_info') }}</textarea>
            </label>
                        </div>

        <!-- Местоположение -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Местоположение</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="field">
                        <select class="field-input w-100 @error('city_id') border-red-500 @enderror" 
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
                    </label>
                     <div class="flex items-center mt-4">
                         <input type="checkbox" id="custom_city_check" name="custom_city_check" {{ old('custom_city_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                         <label for="custom_city_check" class="text-white text-3xl cursor-pointer">Моего города нет в списке</label>
                                    </div>
                                    <input type="text" 
                           class="field-input w-100 mt-2 @error('custom_city') border-red-500 @enderror" 
                                           id="custom_city" 
                                           name="custom_city" 
                                           value="{{ old('custom_city') }}" 
                                           placeholder="Введите свой город" 
                                           style="{{ old('custom_city_check') ? '' : 'display:none;' }}">
                                </div>
                <label class="field">
                                    <input type="text" 
                           class="field-input w-100 @error('registration_address') border-red-500 @enderror" 
                                           name="registration_address" 
                                           value="{{ old('registration_address') }}" 
                           placeholder="Адрес по прописке *"
                                           required>
                </label>
                            </div>
                        </div>

                        <!-- Источник информации -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Как вы узнали о нас?</h2>
            <div>
                <label class="field">
                    <select class="field-input w-100 @error('source_id') border-red-500 @enderror" 
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
                </label>
                 <div class="flex items-center mt-4">
                     <input type="checkbox" id="custom_source_check" name="custom_source_check" {{ old('custom_source_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                     <label for="custom_source_check" class="text-white text-3xl cursor-pointer">Другой источник</label>
                                    </div>
                                    <input type="text" 
                       class="field-input w-100 mt-2 @error('custom_source') border-red-500 @enderror" 
                                           id="custom_source" 
                                           name="custom_source" 
                                           value="{{ old('custom_source') }}" 
                                           placeholder="Укажите источник" 
                                           style="{{ old('custom_source_check') ? '' : 'display:none;' }}">
                            </div>
                        </div>

        <!-- Работа и образование -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Работа и образование</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="field">
                        <select class="field-input w-100 @error('work_format_id') border-red-500 @enderror" 
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
                    </label>
                     <div class="flex items-center mt-4">
                         <input type="checkbox" id="custom_work_format_check" name="custom_work_format_check" {{ old('custom_work_format_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                         <label for="custom_work_format_check" class="text-white text-3xl cursor-pointer">Другой формат работы</label>
                                    </div>
                                    <input type="text" 
                           class="field-input w-100 mt-2 @error('custom_work_format') border-red-500 @enderror" 
                                           id="custom_work_format" 
                                           name="custom_work_format" 
                                           value="{{ old('custom_work_format') }}" 
                                           placeholder="Укажите формат работы" 
                                           style="{{ old('custom_work_format_check') ? '' : 'display:none;' }}">
                                </div>
                <div>
                    <label class="field">
                        <select class="field-input w-100 @error('education_id') border-red-500 @enderror" 
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
                    </label>
                     <div class="flex items-center mt-4">
                         <input type="checkbox" id="custom_education_check" name="custom_education_check" {{ old('custom_education_check') ? 'checked' : '' }} class="mr-4 w-7 h-7 text-red-600 bg-gray-700 border-gray-600 rounded focus:ring-red-500 focus:ring-2">
                         <label for="custom_education_check" class="text-white text-3xl cursor-pointer">Другое образование</label>
                                    </div>
                                    <input type="text" 
                           class="field-input w-100 mt-2 @error('custom_education') border-red-500 @enderror" 
                                           id="custom_education" 
                                           name="custom_education" 
                                           value="{{ old('custom_education') }}" 
                                           placeholder="Укажите образование" 
                                           style="{{ old('custom_education_check') ? '' : 'display:none;' }}">
                                </div>
                            </div>
                        </div>

                        <!-- Профессиональные планы -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Профессиональные планы</h2>
            <label class="field">
                <textarea class="field-input field-textarea w-100 @error('professional_plans') border-red-500 @enderror" 
                                              name="professional_plans" 
                                              rows="4" 
                          placeholder="Расскажите о ваших профессиональных планах *"
                                              required>{{ old('professional_plans') }}</textarea>
            </label>
                        </div>

                        <!-- Профессиональные данные -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Профессиональные данные</h2>
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
                               class="field-input w-100 @error('custom_language') border-red-500 @enderror" 
                                           name="custom_language" 
                                           value="{{ old('custom_language') }}" 
                                           placeholder="Другие языки (через запятую)">
                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Опыт работы -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Опыт работы</h2>
                            <div id="work_experiences_container">
                                @if(old('work_experiences'))
                                    @foreach(old('work_experiences') as $index => $experience)
                        <div class="work-experience-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">
                            <button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <label class="field">
                                    <input type="text" 
                                           class="field-input w-100 @error('work_experiences.'.$index.'.company_name') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][company_name]" 
                                           value="{{ $experience['company_name'] ?? '' }}" 
                                           placeholder="Название компании *"
                                           required>
                                </label>
                                <label class="field">
                                    <input type="text" 
                                           class="field-input w-100 @error('work_experiences.'.$index.'.position') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][position]" 
                                           value="{{ $experience['position'] ?? '' }}" 
                                           placeholder="Должность *"
                                           required>
                                </label>
                                                </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <label class="field">
                                    <input type="date" 
                                           class="field-input w-100 @error('work_experiences.'.$index.'.start_date') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][start_date]" 
                                           value="{{ $experience['start_date'] ?? '' }}" 
                                           required>
                                </label>
                                <label class="field">
                                    <input type="date" 
                                           class="field-input w-100 @error('work_experiences.'.$index.'.end_date') border-red-500 @enderror" 
                                           name="work_experiences[{{ $index }}][end_date]" 
                                           value="{{ $experience['end_date'] ?? '' }}">
                                </label>
                                                </div>
                            <label class="field">
                                <textarea class="field-input field-textarea w-100 @error('work_experiences.'.$index.'.description') border-red-500 @enderror" 
                                          name="work_experiences[{{ $index }}][description]" 
                                          rows="3" 
                                          placeholder="Описание обязанностей">{{ $experience['description'] ?? '' }}</textarea>
                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
            <button type="button" class="btn send-p text-white bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg transition-colors cursor-pointer border-2 border-red-600 hover:border-red-700" id="add_work_experience" onclick="if(typeof addWorkExperience === 'function') { addWorkExperience(); } else { console.error('addWorkExperience не найдена'); }">
                Добавить опыт работы
                            </button>
                        </div>

                        <!-- Образование -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Образование</h2>
                            <div id="educational_institutions_container">
                                @if(old('educational_institutions'))
                                    @foreach(old('educational_institutions') as $index => $institution)
                        <div class="educational-institution-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">
                            <button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>
                            <div class="mb-4">
                                <label class="field">
                                    <input type="text" 
                                           class="field-input w-100 @error('educational_institutions.'.$index.'.institution_name') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][institution_name]" 
                                           value="{{ $institution['institution_name'] ?? '' }}" 
                                           placeholder="Название учебного заведения *"
                                           required>
                                </label>
                                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <label class="field">
                                    <input type="text" 
                                           class="field-input w-100 @error('educational_institutions.'.$index.'.degree') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][degree]" 
                                           value="{{ $institution['degree'] ?? '' }}" 
                                           placeholder="Степень/Специальность">
                                </label>
                                <label class="field">
                                    <input type="text" 
                                           class="field-input w-100 @error('educational_institutions.'.$index.'.faculty') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][faculty]" 
                                           value="{{ $institution['faculty'] ?? '' }}" 
                                           placeholder="Факультет">
                                </label>
                                                </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                <label class="field">
                                    <input type="date" 
                                           class="field-input w-100 @error('educational_institutions.'.$index.'.start_date') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][start_date]" 
                                           value="{{ $institution['start_date'] ?? '' }}">
                                </label>
                                <label class="field">
                                    <input type="date" 
                                           class="field-input w-100 @error('educational_institutions.'.$index.'.end_date') border-red-500 @enderror" 
                                           name="educational_institutions[{{ $index }}][end_date]" 
                                           value="{{ $institution['end_date'] ?? '' }}">
                                </label>
                                                </div>
                            <label class="field">
                                <textarea class="field-input field-textarea w-100 @error('educational_institutions.'.$index.'.description') border-red-500 @enderror" 
                                          name="educational_institutions[{{ $index }}][description]" 
                                          rows="3" 
                                          placeholder="Дополнительная информация">{{ $institution['description'] ?? '' }}</textarea>
                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
            <button type="button" class="btn send-p text-white bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg transition-colors cursor-pointer border-2 border-red-600 hover:border-red-700" id="add_educational_institution" onclick="if(typeof addEducationalInstitution === 'function') { addEducationalInstitution(); } else { console.error('addEducationalInstitution не найдена'); }">
                Добавить образование
                            </button>
                        </div>

                        <!-- Дополнительные заметки -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-white">Дополнительные заметки</h2>
            <label class="field">
                <textarea class="field-input field-textarea w-100 @error('other_notes') border-red-500 @enderror" 
                                          name="other_notes" 
                                          rows="3" 
                                          placeholder="Любая дополнительная информация...">{{ old('other_notes') }}</textarea>
            </label>
                        </div>

                        <!-- Кнопки -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
            <a href="/" class="text-white hover:text-red-400 transition-colors">
                ← Назад на главную
            </a>
            <button type="submit" class="btn send-p text-white bg-red-600 hover:bg-red-700 px-8 py-4 rounded-lg text-lg font-bold">
                                        Отправить заявку
                                    </button>
                        </div>
                    </form>
</section>

    <script>
// Глобальные переменные
let workExperienceIndex = {{ old('work_experiences') ? count(old('work_experiences')) : 0 }};
let educationalInstitutionIndex = {{ old('educational_institutions') ? count(old('educational_institutions')) : 0 }};

// Простые глобальные функции
function addWorkExperience() {
    const container = document.getElementById('work_experiences_container');
    if (!container) {
        return;
    }
    
    const newFieldHtml = '<div class="work-experience-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">' +
        '<button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>' +
        '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
            '<label class="field">' +
                '<input type="text" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][company_name]" placeholder="Название компании *" required>' +
            '</label>' +
            '<label class="field">' +
                '<input type="text" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][position]" placeholder="Должность *" required>' +
            '</label>' +
        '</div>' +
        '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
            '<label class="field">' +
                '<input type="date" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][start_date]" required>' +
            '</label>' +
            '<label class="field">' +
                '<input type="date" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][end_date]">' +
            '</label>' +
        '</div>' +
        '<label class="field">' +
            '<textarea class="field-input field-textarea w-100" name="work_experiences[' + workExperienceIndex + '][description]" rows="3" placeholder="Описание обязанностей"></textarea>' +
        '</label>' +
    '</div>';
    
    container.insertAdjacentHTML('beforeend', newFieldHtml);
    workExperienceIndex++;
}

function addEducationalInstitution() {
    const container = document.getElementById('educational_institutions_container');
    if (!container) {
        console.error('Контейнер для образования не найден');
        return;
    }
    
    const newFieldHtml = '<div class="educational-institution-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">' +
        '<button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>' +
        '<div class="mb-4">' +
            '<label class="field">' +
                '<input type="text" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][institution_name]" placeholder="Название учебного заведения *" required>' +
            '</label>' +
        '</div>' +
        '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
            '<label class="field">' +
                '<input type="text" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][degree]" placeholder="Степень/Специальность">' +
            '</label>' +
            '<label class="field">' +
                '<input type="text" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][faculty]" placeholder="Факультет">' +
            '</label>' +
        '</div>' +
        '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
            '<label class="field">' +
                '<input type="date" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][start_date]">' +
            '</label>' +
            '<label class="field">' +
                '<input type="date" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][end_date]">' +
            '</label>' +
        '</div>' +
        '<label class="field">' +
            '<textarea class="field-input field-textarea w-100" name="educational_institutions[' + educationalInstitutionIndex + '][description]" rows="3" placeholder="Дополнительная информация"></textarea>' +
        '</label>' +
    '</div>';
    
    container.insertAdjacentHTML('beforeend', newFieldHtml);
    educationalInstitutionIndex++;
}

function removeItem(event) {
    if (event.target.classList.contains('remove-item')) {
        event.target.closest('.work-experience-item, .educational-institution-item').remove();
    }
}


// Дублируем функции в window для надежности
window.addWorkExperience = addWorkExperience;
window.addEducationalInstitution = addEducationalInstitution;
window.removeItem = removeItem;


// Инициализация после загрузки DOM
document.addEventListener('DOMContentLoaded', function() {
    
    // Обработчик для удаления полей
    document.addEventListener('click', removeItem);

    // Управление кастомными полями
    function setupCustomFieldToggle(checkboxId, inputId, selectId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);
        const select = document.getElementById(selectId);

        if (checkbox && input && select) {
            const toggleVisibility = () => {
                if (checkbox.checked) {
                    // Если включено кастомное поле - обнуляем основное и показываем кастомное
                    select.value = '';
                    input.style.display = 'block';
                    select.removeAttribute('required');
                    input.setAttribute('required', 'required');
                } else {
                    // Если выключено кастомное поле - скрываем и обнуляем кастомное
                    input.style.display = 'none';
                    input.value = '';
                    select.setAttribute('required', 'required');
                    input.removeAttribute('required');
                }
            };
            
            // Обработчик для чекбокса
            checkbox.addEventListener('change', toggleVisibility);
            
            // Обработчик для основного поля - если что-то выбрано, снимаем чекбокс
            select.addEventListener('change', function() {
                if (this.value !== '') {
                    checkbox.checked = false;
                    input.style.display = 'none';
                    input.value = '';
                    input.removeAttribute('required');
                    select.setAttribute('required', 'required');
                }
            });
            
            toggleVisibility();
        }
    }

           // Настройка кастомных полей
           setupCustomFieldToggle('custom_city_check', 'custom_city', 'city_id');
           setupCustomFieldToggle('custom_source_check', 'custom_source', 'source_id');
           setupCustomFieldToggle('custom_work_format_check', 'custom_work_format', 'work_format_id');
           setupCustomFieldToggle('custom_education_check', 'custom_education', 'education_id');

           // Фильтрация навыков по должностям
           setupSkillsFiltering();

       // Функция для фильтрации навыков по должностям
       function setupSkillsFiltering() {
           const jobPositionCheckboxes = document.querySelectorAll('input[name="job_positions[]"]');
           const skillsPlaceholder = document.getElementById('skills-placeholder');
           const skillCheckboxes = document.querySelectorAll('input[name="technical_skills[]"]');
           
           // Обработчик изменения должностей
           jobPositionCheckboxes.forEach(checkbox => {
               checkbox.addEventListener('change', function() {
                   updateSkillsVisibility();
               });
           });
           
           // Функция обновления видимости навыков
           function updateSkillsVisibility() {
               const selectedPositions = Array.from(jobPositionCheckboxes)
                   .filter(cb => cb.checked)
                   .map(cb => cb.value);
               
               if (selectedPositions.length === 0) {
                   // Если не выбрано должностей - показываем placeholder
                   skillsPlaceholder.style.display = 'block';
                   skillCheckboxes.forEach(cb => {
                       cb.closest('div').style.display = 'none';
                   });
               } else {
                   // Загружаем навыки для выбранных должностей
                   fetchSkillsForPositions(selectedPositions);
               }
           }
           
           // Функция загрузки навыков
           function fetchSkillsForPositions(positionIds) {
               fetch('{{ route("api.positions.skills") }}', {
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json',
                       'X-CSRF-TOKEN': document.querySelector('meta[name="csrf_token"]').getAttribute('content')
                   },
                   body: JSON.stringify({ positions: positionIds })
               })
               .then(response => response.json())
               .then(data => {
                   updateSkillsDisplay(data.skills);
               })
               .catch(error => {
                   console.error('Ошибка загрузки навыков:', error);
               });
           }
           
           // Функция обновления отображения навыков
           function updateSkillsDisplay(relevantSkillIds) {
               skillsPlaceholder.style.display = 'none';
               
               skillCheckboxes.forEach(cb => {
                   const skillId = cb.value;
                   const skillDiv = cb.closest('div');
                   
                   if (relevantSkillIds.includes(parseInt(skillId))) {
                       skillDiv.style.display = 'flex';
                   } else {
                       skillDiv.style.display = 'none';
                       cb.checked = false; // Снимаем выбор с нерелевантных навыков
                   }
               });
           }
           
           // Инициализация при загрузке
           updateSkillsVisibility();
       }

});

// Финальная проверка функций

// Принудительно создаем функции в window если они не существуют
if (typeof window.addWorkExperience !== 'function') {
    window.addWorkExperience = function() {
        const container = document.getElementById('work_experiences_container');
        if (container) {
            const newFieldHtml = '<div class="work-experience-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">' +
                '<button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>' +
                '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
                    '<label class="field"><input type="text" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][company_name]" placeholder="Название компании *" required></label>' +
                    '<label class="field"><input type="text" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][position]" placeholder="Должность *" required></label>' +
                '</div>' +
                '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
                    '<label class="field"><input type="date" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][start_date]" required></label>' +
                    '<label class="field"><input type="date" class="field-input w-100" name="work_experiences[' + workExperienceIndex + '][end_date]"></label>' +
                '</div>' +
                '<label class="field"><textarea class="field-input field-textarea w-100" name="work_experiences[' + workExperienceIndex + '][description]" rows="3" placeholder="Описание обязанностей"></textarea></label>' +
            '</div>';
        container.insertAdjacentHTML('beforeend', newFieldHtml);
        workExperienceIndex++;
        }
    };
}

if (typeof window.addEducationalInstitution !== 'function') {
    window.addEducationalInstitution = function() {
        const container = document.getElementById('educational_institutions_container');
        if (container) {
            const newFieldHtml = '<div class="educational-institution-item border border-gray-600 rounded-lg p-6 mb-6 relative bg-gray-800/50">' +
                '<button type="button" class="absolute top-4 right-4 text-red-500 hover:text-red-400 remove-item" aria-label="Close">×</button>' +
                '<div class="mb-4"><label class="field"><input type="text" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][institution_name]" placeholder="Название учебного заведения *" required></label></div>' +
                '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
                    '<label class="field"><input type="text" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][degree]" placeholder="Степень/Специальность"></label>' +
                    '<label class="field"><input type="text" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][faculty]" placeholder="Факультет"></label>' +
                '</div>' +
                '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">' +
                    '<label class="field"><input type="date" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][start_date]"></label>' +
                    '<label class="field"><input type="date" class="field-input w-100" name="educational_institutions[' + educationalInstitutionIndex + '][end_date]"></label>' +
                '</div>' +
                '<label class="field"><textarea class="field-input field-textarea w-100" name="educational_institutions[' + educationalInstitutionIndex + '][description]" rows="3" placeholder="Дополнительная информация"></textarea></label>' +
            '</div>';
        container.insertAdjacentHTML('beforeend', newFieldHtml);
        educationalInstitutionIndex++;
        }
    };
}

</script>
@endsection
