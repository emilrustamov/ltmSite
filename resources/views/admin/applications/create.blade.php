@extends('admin.layouts.app')

@section('title', 'Создать заявку')
@section('page-title', 'Создать заявку')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">
            <i class="fas fa-plus me-2"></i>
            Создание новой заявки кандидата
        </h4>
        <small class="text-muted">Заполните все необходимые поля для создания заявки</small>
    </div>
    <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Назад к списку
    </a>
</div>

<form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <!-- Основная информация -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Основная информация
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Личная информация кандидата -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       placeholder="Введите имя">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="surname" class="form-label">
                                    Фамилия <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('surname') is-invalid @enderror" 
                                       id="surname" 
                                       name="surname" 
                                       value="{{ old('surname') }}" 
                                       placeholder="Введите фамилию"
                                       required>
                                @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="example@email.com"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">
                                    Телефон <span class="text-danger">*</span>
                                </label>
                                <input type="tel" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone') }}" 
                                       placeholder="+993 XX XXXXXX"
                                       required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">
                                    Дата рождения <span class="text-danger">*</span>
                                </label>
                                <input type="date" 
                                       class="form-control @error('date_of_birth') is-invalid @enderror" 
                                       id="date_of_birth" 
                                       name="date_of_birth" 
                                       value="{{ old('date_of_birth') }}"
                                       required>
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="expected_salary" class="form-label">
                                    Ожидаемая зарплата <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('expected_salary') is-invalid @enderror" 
                                       id="expected_salary" 
                                       name="expected_salary" 
                                       value="{{ old('expected_salary') }}" 
                                       placeholder="Например: 2000-3000 USD"
                                       required>
                                @error('expected_salary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Дополнительная информация -->
                    <div class="mb-3">
                        <label for="personal_info" class="form-label">Личная информация</label>
                        <textarea class="form-control @error('personal_info') is-invalid @enderror" 
                                  id="personal_info" 
                                  name="personal_info" 
                                  rows="3"
                                  placeholder="Расскажите о себе, своих интересах и увлечениях">{{ old('personal_info') }}</textarea>
                        @error('personal_info')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact_info" class="form-label">Контактная информация</label>
                        <textarea class="form-control @error('contact_info') is-invalid @enderror" 
                                  id="contact_info" 
                                  name="contact_info" 
                                  rows="2"
                                  placeholder="Дополнительные способы связи">{{ old('contact_info') }}</textarea>
                        @error('contact_info')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="general_info" class="form-label">Общая информация</label>
                        <textarea class="form-control @error('general_info') is-invalid @enderror" 
                                  id="general_info" 
                                  name="general_info" 
                                  rows="3"
                                  placeholder="Любая дополнительная информация">{{ old('general_info') }}</textarea>
                        @error('general_info')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="linkedin_url" class="form-label">LinkedIn профиль</label>
                                <input type="url" 
                                       class="form-control @error('linkedin_url') is-invalid @enderror" 
                                       id="linkedin_url" 
                                       name="linkedin_url" 
                                       value="{{ old('linkedin_url') }}" 
                                       placeholder="https://linkedin.com/in/username">
                                @error('linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="github_url" class="form-label">GitHub профиль</label>
                                <input type="url" 
                                       class="form-control @error('github_url') is-invalid @enderror" 
                                       id="github_url" 
                                       name="github_url" 
                                       value="{{ old('github_url') }}" 
                                       placeholder="https://github.com/username">
                                @error('github_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="professional_plans" class="form-label">
                            Профессиональные планы на ближайшие годы <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('professional_plans') is-invalid @enderror" 
                                  id="professional_plans" 
                                  name="professional_plans" 
                                  rows="3"
                                  placeholder="Расскажите о ваших профессиональных целях и планах развития"
                                  required>{{ old('professional_plans') }}</textarea>
                        @error('professional_plans')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="other_notes" class="form-label">Другие заметки</label>
                        <textarea class="form-control @error('other_notes') is-invalid @enderror" 
                                  id="other_notes" 
                                  name="other_notes" 
                                  rows="2"
                                  placeholder="Любая дополнительная информация">{{ old('other_notes') }}</textarea>
                        @error('other_notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Дополнительные параметры -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-cog me-2"></i>
                        Дополнительные параметры
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Город -->
                    <div class="mb-3">
                        <label for="city_id" class="form-label">Город</label>
                        <select class="form-select @error('city_id') is-invalid @enderror" 
                                id="city_id" 
                                name="city_id">
                            <option value="">Выберите город</option>
                            @foreach(\App\Models\City::active()->ordered()->get() as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- Поле для произвольного города -->
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="custom_city_check" name="custom_city_check">
                                <label class="form-check-label" for="custom_city_check">
                                    Указать другой город
                                </label>
                            </div>
                            <input type="text" 
                                   class="form-control mt-2 @error('custom_city') is-invalid @enderror" 
                                   id="custom_city" 
                                   name="custom_city" 
                                   value="{{ old('custom_city') }}"
                                   placeholder="Введите название города"
                                   style="display: none;">
                            @error('custom_city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Адрес по прописке -->
                    <div class="mb-3">
                        <label for="registration_address" class="form-label">
                            Адрес по прописке <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('registration_address') is-invalid @enderror" 
                               id="registration_address" 
                               name="registration_address" 
                               value="{{ old('registration_address') }}" 
                               placeholder="Полный адрес по прописке"
                               required>
                        @error('registration_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Источник информации -->
                    <div class="mb-3">
                        <label for="source_id" class="form-label">
                            Источник информации <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('source_id') is-invalid @enderror" 
                                id="source_id" 
                                name="source_id"
                                required>
                            <option value="">Выберите источник</option>
                            @foreach(\App\Models\Source::active()->ordered()->get() as $source)
                                <option value="{{ $source->id }}" {{ old('source_id') == $source->id ? 'selected' : '' }}>
                                    {{ $source->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        @error('source_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- Поле для произвольного источника -->
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="custom_source_check" name="custom_source_check">
                                <label class="form-check-label" for="custom_source_check">
                                    Указать другой источник
                                </label>
                            </div>
                            <input type="text" 
                                   class="form-control mt-2 @error('custom_source') is-invalid @enderror" 
                                   id="custom_source" 
                                   name="custom_source" 
                                   value="{{ old('custom_source') }}"
                                   placeholder="Введите источник"
                                   style="display: none;">
                            @error('custom_source')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Формат работы -->
                    <div class="mb-3">
                        <label for="work_format_id" class="form-label">
                            Формат работы <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('work_format_id') is-invalid @enderror" 
                                id="work_format_id" 
                                name="work_format_id"
                                required>
                            <option value="">Выберите формат</option>
                            @foreach(\App\Models\WorkFormat::active()->ordered()->get() as $format)
                                <option value="{{ $format->id }}" {{ old('work_format_id') == $format->id ? 'selected' : '' }}>
                                    {{ $format->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        @error('work_format_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- Поле для произвольного формата -->
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="custom_work_format_check" name="custom_work_format_check">
                                <label class="form-check-label" for="custom_work_format_check">
                                    Указать другой формат
                                </label>
                            </div>
                            <input type="text" 
                                   class="form-control mt-2 @error('custom_work_format') is-invalid @enderror" 
                                   id="custom_work_format" 
                                   name="custom_work_format" 
                                   value="{{ old('custom_work_format') }}"
                                   placeholder="Введите формат работы"
                                   style="display: none;">
                            @error('custom_work_format')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Образование -->
                    <div class="mb-3">
                        <label for="education_id" class="form-label">
                            Образование <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('education_id') is-invalid @enderror" 
                                id="education_id" 
                                name="education_id"
                                required>
                            <option value="">Выберите образование</option>
                            @foreach(\App\Models\Education::active()->ordered()->get() as $education)
                                <option value="{{ $education->id }}" {{ old('education_id') == $education->id ? 'selected' : '' }}>
                                    {{ $education->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        @error('education_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- Поле для произвольного образования -->
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="custom_education_check" name="custom_education_check">
                                <label class="form-check-label" for="custom_education_check">
                                    Указать другое образование
                                </label>
                            </div>
                            <input type="text" 
                                   class="form-control mt-2 @error('custom_education') is-invalid @enderror" 
                                   id="custom_education" 
                                   name="custom_education" 
                                   value="{{ old('custom_education') }}"
                                   placeholder="Введите образование"
                                   style="display: none;">
                            @error('custom_education')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Опыт работы -->
                    <div class="mb-3">
                        <label class="form-label">
                            Опыт работы
                        </label>
                        <div id="work-experiences-container">
                            <!-- Записи опыта работы будут добавляться здесь -->
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="addWorkExperience()">
                            <i class="fas fa-plus me-1"></i>
                            Добавить место работы
                        </button>
                        @error('work_experiences')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- CV файл -->
                    <div class="mb-3">
                        <label for="cv_file" class="form-label">
                            CV/Резюме <span class="text-danger">*</span>
                        </label>
                        <input type="file" 
                               class="form-control @error('cv_file') is-invalid @enderror" 
                               id="cv_file" 
                               name="cv_file" 
                               accept=".pdf,.doc,.docx"
                               required>
                        <div class="form-text">Поддерживаются форматы: PDF, DOC, DOCX. Максимальный размер: 10MB</div>
                        @error('cv_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Образовательные учреждения -->
                    <div class="mb-3">
                        <label class="form-label">
                            Образовательные учреждения
                        </label>
                        <div id="educational-institutions-container">
                            <!-- Записи образовательных учреждений будут добавляться здесь -->
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="addEducationalInstitution()">
                            <i class="fas fa-plus me-1"></i>
                            Добавить учебное заведение
                        </button>
                        @error('educational_institutions')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Статус -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="status" 
                                   name="status" 
                                   value="1" 
                                   {{ old('status', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Активная заявка
                            </label>
                        </div>
                    </div>


                    <!-- Должности (интересы) -->
                    <div class="mb-3">
                        <label class="form-label">Интересующие должности</label>
                        <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                            @foreach(\App\Models\JobPosition::active()->ordered()->get() as $position)
                                <div class="form-check">
                                    <input class="form-check-input @error('job_positions') is-invalid @enderror" 
                                           type="checkbox" 
                                           id="job_position_{{ $position->id }}" 
                                           name="job_positions[]" 
                                           value="{{ $position->id }}"
                                           {{ in_array($position->id, old('job_positions', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="job_position_{{ $position->id }}">
                                        {{ $position->name_ru }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-text">Выберите все интересующие вас должности</div>
                        @error('job_positions')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Технические навыки -->
                    <div class="mb-3">
                        <label class="form-label">Технические навыки</label>
                        <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                            @foreach(\App\Models\TechnicalSkill::active()->ordered()->get() as $skill)
                                <div class="form-check">
                                    <input class="form-check-input @error('technical_skills') is-invalid @enderror" 
                                           type="checkbox" 
                                           id="technical_skill_{{ $skill->id }}" 
                                           name="technical_skills[]" 
                                           value="{{ $skill->id }}"
                                           {{ in_array($skill->id, old('technical_skills', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="technical_skill_{{ $skill->id }}">
                                        {{ $skill->name_ru }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-text">Выберите все подходящие технические навыки</div>
                        @error('technical_skills')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Языки -->
                    <div class="mb-3">
                        <label class="form-label">Языки</label>
                        <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                            @foreach(\App\Models\Language::active()->ordered()->get() as $language)
                                <div class="form-check">
                                    <input class="form-check-input @error('languages') is-invalid @enderror" 
                                           type="checkbox" 
                                           id="language_{{ $language->id }}" 
                                           name="languages[]" 
                                           value="{{ $language->id }}"
                                           {{ in_array($language->id, old('languages', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="language_{{ $language->id }}">
                                        {{ $language->name_ru }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-text">Выберите все языки, которыми владеете</div>
                        @error('languages')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Кастомный язык -->
                    <div class="mb-3">
                        <label for="custom_language" class="form-label">Другой язык</label>
                        <input type="text" 
                               class="form-control @error('custom_language') is-invalid @enderror" 
                               id="custom_language" 
                               name="custom_language" 
                               value="{{ old('custom_language') }}"
                               placeholder="Укажите другой язык">
                        @error('custom_language')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Кнопки действий -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="text-muted">
            <small>
                <i class="fas fa-info-circle me-1"></i>
                Поля, отмеченные звездочкой (*), обязательны для заполнения
            </small>
        </div>
        <div>
            <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-secondary me-2">
                Отмена
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                Создать заявку
            </button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Переключение поля для произвольного города
    const customCityCheck = document.getElementById('custom_city_check');
    const customCityInput = document.getElementById('custom_city');
    const citySelect = document.getElementById('city_id');
    
    if (customCityCheck && customCityInput && citySelect) {
        customCityCheck.addEventListener('change', function() {
            if (this.checked) {
                customCityInput.style.display = 'block';
                citySelect.disabled = true;
                customCityInput.required = true;
            } else {
                customCityInput.style.display = 'none';
                citySelect.disabled = false;
                customCityInput.required = false;
                customCityInput.value = '';
            }
        });
    }

    // Переключение поля для произвольного источника
    const customSourceCheck = document.getElementById('custom_source_check');
    const customSourceInput = document.getElementById('custom_source');
    const sourceSelect = document.getElementById('source_id');
    
    if (customSourceCheck && customSourceInput && sourceSelect) {
        customSourceCheck.addEventListener('change', function() {
            if (this.checked) {
                customSourceInput.style.display = 'block';
                sourceSelect.disabled = true;
                customSourceInput.required = true;
            } else {
                customSourceInput.style.display = 'none';
                sourceSelect.disabled = false;
                customSourceInput.required = false;
                customSourceInput.value = '';
            }
        });
    }

    // Переключение поля для произвольного формата работы
    const customWorkFormatCheck = document.getElementById('custom_work_format_check');
    const customWorkFormatInput = document.getElementById('custom_work_format');
    const workFormatSelect = document.getElementById('work_format_id');
    
    if (customWorkFormatCheck && customWorkFormatInput && workFormatSelect) {
        customWorkFormatCheck.addEventListener('change', function() {
            if (this.checked) {
                customWorkFormatInput.style.display = 'block';
                workFormatSelect.disabled = true;
                customWorkFormatInput.required = true;
            } else {
                customWorkFormatInput.style.display = 'none';
                workFormatSelect.disabled = false;
                customWorkFormatInput.required = false;
                customWorkFormatInput.value = '';
            }
        });
    }

    // Переключение поля для произвольного образования
    const customEducationCheck = document.getElementById('custom_education_check');
    const customEducationInput = document.getElementById('custom_education');
    const educationSelect = document.getElementById('education_id');
    
    if (customEducationCheck && customEducationInput && educationSelect) {
        customEducationCheck.addEventListener('change', function() {
            if (this.checked) {
                customEducationInput.style.display = 'block';
                educationSelect.disabled = true;
                customEducationInput.required = true;
            } else {
                customEducationInput.style.display = 'none';
                educationSelect.disabled = false;
                customEducationInput.required = false;
                customEducationInput.value = '';
            }
        });
    }
});

</script>
@endsection
