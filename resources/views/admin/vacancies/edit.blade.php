@extends('admin.layouts.app')

@section('title', 'Редактировать вакансию')
@section('page-title', 'Редактировать вакансию')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">
            <i class="fas fa-edit me-2"></i>
            Редактирование вакансии
        </h4>
        <small class="text-muted">{{ $vacancy->translation('ru')?->title ?? 'Без названия' }}</small>
    </div>
    <a href="{{ route('admin.vacancies.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Назад к списку
    </a>
</div>

<form action="{{ route('admin.vacancies.update', $vacancy->slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
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
                    <!-- Название вакансии -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="title_ru" class="form-label">
                                    Название (RU) <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('title_ru') is-invalid @enderror" 
                                       id="title_ru" 
                                       name="title_ru" 
                                       value="{{ old('title_ru', $vacancy->translation('ru')?->title) }}" 
                                       required>
                                @error('title_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="title_en" class="form-label">Название (EN)</label>
                                <input type="text" 
                                       class="form-control @error('title_en') is-invalid @enderror" 
                                       id="title_en" 
                                       name="title_en" 
                                       value="{{ old('title_en', $vacancy->translation('en')?->title) }}">
                                @error('title_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="title_tm" class="form-label">Название (TM)</label>
                                <input type="text" 
                                       class="form-control @error('title_tm') is-invalid @enderror" 
                                       id="title_tm" 
                                       name="title_tm" 
                                       value="{{ old('title_tm', $vacancy->translation('tm')?->title) }}">
                                @error('title_tm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Описание вакансии -->
                    <div class="mb-3">
                        <label for="description_ru" class="form-label">Описание (RU)</label>
                        <textarea class="form-control @error('description_ru') is-invalid @enderror" 
                                  id="description_ru" 
                                  name="description_ru" 
                                  rows="4">{{ old('description_ru', $vacancy->translation('ru')?->description) }}</textarea>
                        @error('description_ru')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description_en" class="form-label">Описание (EN)</label>
                        <textarea class="form-control @error('description_en') is-invalid @enderror" 
                                  id="description_en" 
                                  name="description_en" 
                                  rows="4">{{ old('description_en', $vacancy->translation('en')?->description) }}</textarea>
                        @error('description_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description_tm" class="form-label">Описание (TM)</label>
                        <textarea class="form-control @error('description_tm') is-invalid @enderror" 
                                  id="description_tm" 
                                  name="description_tm" 
                                  rows="4">{{ old('description_tm', $vacancy->translation('tm')?->description) }}</textarea>
                        @error('description_tm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Требования -->
                    <div class="mb-3">
                        <label for="requirements_ru" class="form-label">Требования (RU)</label>
                        <textarea class="form-control @error('requirements_ru') is-invalid @enderror" 
                                  id="requirements_ru" 
                                  name="requirements_ru" 
                                  rows="3">{{ old('requirements_ru', $vacancy->translation('ru')?->requirements) }}</textarea>
                        @error('requirements_ru')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="requirements_en" class="form-label">Требования (EN)</label>
                        <textarea class="form-control @error('requirements_en') is-invalid @enderror" 
                                  id="requirements_en" 
                                  name="requirements_en" 
                                  rows="3">{{ old('requirements_en', $vacancy->translation('en')?->requirements) }}</textarea>
                        @error('requirements_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="requirements_tm" class="form-label">Требования (TM)</label>
                        <textarea class="form-control @error('requirements_tm') is-invalid @enderror" 
                                  id="requirements_tm" 
                                  name="requirements_tm" 
                                  rows="3">{{ old('requirements_tm', $vacancy->translation('tm')?->requirements) }}</textarea>
                        @error('requirements_tm')
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
                        Параметры
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
                                <option value="{{ $city->id }}" {{ old('city_id', $vacancy->city_id) == $city->id ? 'selected' : '' }}>
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
                                <input class="form-check-input" type="checkbox" id="custom_city_check" name="custom_city_check" {{ old('custom_city_check') || $vacancy->custom_city ? 'checked' : '' }}>
                                <label class="form-check-label" for="custom_city_check">
                                    Указать другой город
                                </label>
                            </div>
                            <input type="text" 
                                   class="form-control mt-2 @error('custom_city') is-invalid @enderror" 
                                   id="custom_city" 
                                   name="custom_city" 
                                   value="{{ old('custom_city', $vacancy->custom_city) }}"
                                   placeholder="Введите название города"
                                   style="{{ old('custom_city_check') || $vacancy->custom_city ? 'display: block;' : 'display: none;' }}">
                            @error('custom_city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Тип занятости -->
                    <div class="mb-3">
                        <label for="employment_type" class="form-label">Тип занятости</label>
                        <select class="form-select @error('employment_type') is-invalid @enderror" 
                                id="employment_type" 
                                name="employment_type">
                            <option value="">Выберите тип</option>
                            <option value="full-time" {{ old('employment_type', $vacancy->employment_type) == 'full-time' ? 'selected' : '' }}>Полная занятость</option>
                            <option value="part-time" {{ old('employment_type', $vacancy->employment_type) == 'part-time' ? 'selected' : '' }}>Частичная занятость</option>
                            <option value="contract" {{ old('employment_type', $vacancy->employment_type) == 'contract' ? 'selected' : '' }}>Контракт</option>
                            <option value="freelance" {{ old('employment_type', $vacancy->employment_type) == 'freelance' ? 'selected' : '' }}>Фриланс</option>
                            <option value="internship" {{ old('employment_type', $vacancy->employment_type) == 'internship' ? 'selected' : '' }}>Стажировка</option>
                        </select>
                        @error('employment_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Уровень опыта -->
                    <div class="mb-3">
                        <label for="experience_level" class="form-label">Уровень опыта</label>
                        <select class="form-select @error('experience_level') is-invalid @enderror" 
                                id="experience_level" 
                                name="experience_level">
                            <option value="">Выберите уровень</option>
                            <option value="intern" {{ old('experience_level', $vacancy->experience_level) == 'intern' ? 'selected' : '' }}>Стажер</option>
                            <option value="junior" {{ old('experience_level', $vacancy->experience_level) == 'junior' ? 'selected' : '' }}>Junior</option>
                            <option value="middle" {{ old('experience_level', $vacancy->experience_level) == 'middle' ? 'selected' : '' }}>Middle</option>
                            <option value="senior" {{ old('experience_level', $vacancy->experience_level) == 'senior' ? 'selected' : '' }}>Senior</option>
                            <option value="lead" {{ old('experience_level', $vacancy->experience_level) == 'lead' ? 'selected' : '' }}>Lead</option>
                        </select>
                        @error('experience_level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Зарплата -->
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="salary_from" class="form-label">Зарплата от</label>
                                <input type="number" 
                                       class="form-control @error('salary_from') is-invalid @enderror" 
                                       id="salary_from" 
                                       name="salary_from" 
                                       value="{{ old('salary_from', $vacancy->salary_from) }}"
                                       min="0"
                                       placeholder="0">
                                @error('salary_from')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="salary_to" class="form-label">Зарплата до</label>
                                <input type="number" 
                                       class="form-control @error('salary_to') is-invalid @enderror" 
                                       id="salary_to" 
                                       name="salary_to" 
                                       value="{{ old('salary_to', $vacancy->salary_to) }}"
                                       min="0"
                                       placeholder="0">
                                @error('salary_to')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Статус -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="status" 
                                   name="status" 
                                   value="1" 
                                   {{ old('status', $vacancy->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Активная вакансия
                            </label>
                        </div>
                    </div>

                    <!-- Рекомендуемая -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="is_featured" 
                                   name="is_featured" 
                                   value="1" 
                                   {{ old('is_featured', $vacancy->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                Рекомендуемая вакансия
                            </label>
                        </div>
                    </div>

                    <!-- Текущее изображение -->
                    @if($vacancy->getFirstMediaUrl('vacancy-images'))
                    <div class="mb-3">
                        <label class="form-label">Текущее изображение</label>
                        <div>
                            <img src="{{ $vacancy->getFirstMediaUrl('vacancy-images') }}" 
                                 alt="{{ $vacancy->translation('ru')?->title }}" 
                                 class="img-thumbnail" 
                                 style="max-width: 200px; max-height: 150px;">
                        </div>
                    </div>
                    @endif

                    <!-- Должности -->
                    <div class="mb-3">
                        <label for="job_positions" class="form-label">Должности</label>
                        <select class="form-select @error('job_positions') is-invalid @enderror" 
                                id="job_positions" 
                                name="job_positions[]" 
                                multiple>
                            @foreach(\App\Models\JobPosition::active()->ordered()->get() as $position)
                                <option value="{{ $position->id }}" {{ in_array($position->id, old('job_positions', $vacancy->jobPositions->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $position->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Удерживайте Ctrl для выбора нескольких должностей</div>
                        @error('job_positions')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Технические навыки -->
                    <div class="mb-3">
                        <label for="technical_skills" class="form-label">Технические навыки</label>
                        <select class="form-select @error('technical_skills') is-invalid @enderror" 
                                id="technical_skills" 
                                name="technical_skills[]" 
                                multiple>
                            @foreach(\App\Models\TechnicalSkill::active()->ordered()->get() as $skill)
                                <option value="{{ $skill->id }}" {{ in_array($skill->id, old('technical_skills', $vacancy->technicalSkills->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $skill->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Удерживайте Ctrl для выбора нескольких навыков</div>
                        @error('technical_skills')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Языки -->
                    <div class="mb-3">
                        <label for="languages" class="form-label">Языки</label>
                        <select class="form-select @error('languages') is-invalid @enderror" 
                                id="languages" 
                                name="languages[]" 
                                multiple>
                            @foreach(\App\Models\Language::active()->ordered()->get() as $language)
                                <option value="{{ $language->id }}" {{ in_array($language->id, old('languages', $vacancy->languages->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $language->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Удерживайте Ctrl для выбора нескольких языков</div>
                        @error('languages')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Форматы работы -->
                    <div class="mb-3">
                        <label for="work_formats" class="form-label">Форматы работы</label>
                        <select class="form-select @error('work_formats') is-invalid @enderror" 
                                id="work_formats" 
                                name="work_formats[]" 
                                multiple>
                            @foreach(\App\Models\WorkFormat::active()->ordered()->get() as $format)
                                <option value="{{ $format->id }}" {{ in_array($format->id, old('work_formats', $vacancy->workFormats->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $format->name_ru }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Удерживайте Ctrl для выбора нескольких форматов</div>
                        @error('work_formats')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Новое изображение -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Новое изображение</label>
                        <input type="file" 
                               class="form-control @error('image') is-invalid @enderror" 
                               id="image" 
                               name="image" 
                               accept="image/*">
                        <div class="form-text">Поддерживаются форматы: JPEG, PNG, JPG, GIF, WebP. Максимальный размер: 10MB</div>
                        @error('image')
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
            <a href="{{ route('admin.vacancies.index') }}" class="btn btn-outline-secondary me-2">
                Отмена
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                Сохранить изменения
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
    
    // Инициализация состояния при загрузке
    if (customCityCheck.checked) {
        customCityInput.style.display = 'block';
        citySelect.disabled = true;
        customCityInput.required = true;
    }
});
</script>
@endsection
