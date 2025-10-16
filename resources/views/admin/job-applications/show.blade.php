@extends('admin.layouts.app')

@section('title', 'Редактировать вакансию')
@section('page-title', 'Редактировать вакансию')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-edit me-2"></i>
                Редактирование вакансии
            </h4>
            <form action="{{ route('admin.vacancies.update', $vacancy->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <!-- Основная информация -->
                    <div class="col-lg-8">
                        <!-- Мультиязычные поля -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Название вакансии</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title_ru" class="form-label">Русский *</label>
                                    <input type="text" class="form-control @error('title_ru') is-invalid @enderror" 
                                           id="title_ru" name="title_ru" 
                                           value="{{ old('title_ru', $vacancy->translation('ru')->title ?? '') }}" required>
                                    @error('title_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title_en" class="form-label">English</label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" 
                                           id="title_en" name="title_en" 
                                           value="{{ old('title_en', $vacancy->translation('en')->title ?? '') }}">
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title_tm" class="form-label">Türkmen</label>
                                    <input type="text" class="form-control @error('title_tm') is-invalid @enderror" 
                                           id="title_tm" name="title_tm" 
                                           value="{{ old('title_tm', $vacancy->translation('tm')->title ?? '') }}">
                                    @error('title_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Описание -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Описание вакансии</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="description_ru" class="form-label">Русский</label>
                                    <textarea class="form-control @error('description_ru') is-invalid @enderror" 
                                              id="description_ru" name="description_ru" rows="4">{{ old('description_ru', $vacancy->translation('ru')->description ?? '') }}</textarea>
                                    @error('description_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="description_en" class="form-label">English</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" 
                                              id="description_en" name="description_en" rows="4">{{ old('description_en', $vacancy->translation('en')->description ?? '') }}</textarea>
                                    @error('description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="description_tm" class="form-label">Türkmen</label>
                                    <textarea class="form-control @error('description_tm') is-invalid @enderror" 
                                              id="description_tm" name="description_tm" rows="4">{{ old('description_tm', $vacancy->translation('tm')->description ?? '') }}</textarea>
                                    @error('description_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Требования -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Требования</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="requirements_ru" class="form-label">Русский</label>
                                    <textarea class="form-control @error('requirements_ru') is-invalid @enderror" 
                                              id="requirements_ru" name="requirements_ru" rows="4">{{ old('requirements_ru', $vacancy->translation('ru')->requirements ?? '') }}</textarea>
                                    @error('requirements_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="requirements_en" class="form-label">English</label>
                                    <textarea class="form-control @error('requirements_en') is-invalid @enderror" 
                                              id="requirements_en" name="requirements_en" rows="4">{{ old('requirements_en', $vacancy->translation('en')->requirements ?? '') }}</textarea>
                                    @error('requirements_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="requirements_tm" class="form-label">Türkmen</label>
                                    <textarea class="form-control @error('requirements_tm') is-invalid @enderror" 
                                              id="requirements_tm" name="requirements_tm" rows="4">{{ old('requirements_tm', $vacancy->translation('tm')->requirements ?? '') }}</textarea>
                                    @error('requirements_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Обязанности -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Обязанности</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="responsibilities_ru" class="form-label">Русский</label>
                                    <textarea class="form-control @error('responsibilities_ru') is-invalid @enderror" 
                                              id="responsibilities_ru" name="responsibilities_ru" rows="4">{{ old('responsibilities_ru', $vacancy->translation('ru')->responsibilities ?? '') }}</textarea>
                                    @error('responsibilities_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="responsibilities_en" class="form-label">English</label>
                                    <textarea class="form-control @error('responsibilities_en') is-invalid @enderror" 
                                              id="responsibilities_en" name="responsibilities_en" rows="4">{{ old('responsibilities_en', $vacancy->translation('en')->responsibilities ?? '') }}</textarea>
                                    @error('responsibilities_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="responsibilities_tm" class="form-label">Türkmen</label>
                                    <textarea class="form-control @error('responsibilities_tm') is-invalid @enderror" 
                                              id="responsibilities_tm" name="responsibilities_tm" rows="4">{{ old('responsibilities_tm', $vacancy->translation('tm')->responsibilities ?? '') }}</textarea>
                                    @error('responsibilities_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Преимущества -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Преимущества/Бонусы</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="benefits_ru" class="form-label">Русский</label>
                                    <textarea class="form-control @error('benefits_ru') is-invalid @enderror" 
                                              id="benefits_ru" name="benefits_ru" rows="4">{{ old('benefits_ru', $vacancy->translation('ru')->benefits ?? '') }}</textarea>
                                    @error('benefits_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="benefits_en" class="form-label">English</label>
                                    <textarea class="form-control @error('benefits_en') is-invalid @enderror" 
                                              id="benefits_en" name="benefits_en" rows="4">{{ old('benefits_en', $vacancy->translation('en')->benefits ?? '') }}</textarea>
                                    @error('benefits_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="benefits_tm" class="form-label">Türkmen</label>
                                    <textarea class="form-control @error('benefits_tm') is-invalid @enderror" 
                                              id="benefits_tm" name="benefits_tm" rows="4">{{ old('benefits_tm', $vacancy->translation('tm')->benefits ?? '') }}</textarea>
                                    @error('benefits_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Информация о компании -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Информация о компании</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="company_name_ru" class="form-label">Название компании (Русский)</label>
                                    <input type="text" class="form-control @error('company_name_ru') is-invalid @enderror" 
                                           id="company_name_ru" name="company_name_ru" 
                                           value="{{ old('company_name_ru', $vacancy->translation('ru')->company_name ?? '') }}">
                                    @error('company_name_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="company_name_en" class="form-label">Название компании (English)</label>
                                    <input type="text" class="form-control @error('company_name_en') is-invalid @enderror" 
                                           id="company_name_en" name="company_name_en" 
                                           value="{{ old('company_name_en', $vacancy->translation('en')->company_name ?? '') }}">
                                    @error('company_name_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="company_description_ru" class="form-label">Описание компании (Русский)</label>
                                    <textarea class="form-control @error('company_description_ru') is-invalid @enderror" 
                                              id="company_description_ru" name="company_description_ru" rows="3">{{ old('company_description_ru', $vacancy->translation('ru')->company_description ?? '') }}</textarea>
                                    @error('company_description_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="company_description_en" class="form-label">Описание компании (English)</label>
                                    <textarea class="form-control @error('company_description_en') is-invalid @enderror" 
                                              id="company_description_en" name="company_description_en" rows="3">{{ old('company_description_en', $vacancy->translation('en')->company_description ?? '') }}</textarea>
                                    @error('company_description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="company_description_tm" class="form-label">Описание компании (Türkmen)</label>
                                    <textarea class="form-control @error('company_description_tm') is-invalid @enderror" 
                                              id="company_description_tm" name="company_description_tm" rows="3">{{ old('company_description_tm', $vacancy->translation('tm')->company_description ?? '') }}</textarea>
                                    @error('company_description_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Боковая панель -->
                    <div class="col-lg-4">
                        <!-- Текущее изображение -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="mb-0">Изображение</h6>
                            </div>
                            <div class="card-body">
                                @if($vacancy->getFirstMediaUrl('vacancy-images'))
                                    <div class="text-center mb-3">
                                        <img src="{{ $vacancy->getFirstMediaUrl('vacancy-images') }}" 
                                             alt="{{ $vacancy->translation('ru')->title ?? '' }}" 
                                             class="img-fluid rounded" style="max-height: 200px;">
                                        <p class="text-muted small mt-2">Текущее изображение</p>
                                    </div>
                                @endif
                                
                                <div class="mb-3">
                                    <label for="image" class="form-label">Загрузить новое изображение</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Максимальный размер: 10MB</div>
                                </div>
                                <div id="image-preview" class="text-center" style="display: none;">
                                    <img id="preview-img" class="img-fluid rounded" style="max-height: 200px;">
                                    <p class="text-muted small mt-2">Предварительный просмотр</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Настройки -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="mb-0">Настройки</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Местоположение</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location', $vacancy->location) }}"
                                           placeholder="Например: Москва, удаленно">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="employment_type" class="form-label">Тип занятости</label>
                                    <select class="form-control @error('employment_type') is-invalid @enderror" 
                                            id="employment_type" name="employment_type">
                                        <option value="">Выберите тип</option>
                                        <option value="full-time" {{ old('employment_type', $vacancy->employment_type) == 'full-time' ? 'selected' : '' }}>Полная занятость</option>
                                        <option value="part-time" {{ old('employment_type', $vacancy->employment_type) == 'part-time' ? 'selected' : '' }}>Частичная занятость</option>
                                        <option value="remote" {{ old('employment_type', $vacancy->employment_type) == 'remote' ? 'selected' : '' }}>Удаленная работа</option>
                                        <option value="contract" {{ old('employment_type', $vacancy->employment_type) == 'contract' ? 'selected' : '' }}>Договор подряда</option>
                                    </select>
                                    @error('employment_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="experience_level" class="form-label">Уровень опыта</label>
                                    <select class="form-control @error('experience_level') is-invalid @enderror" 
                                            id="experience_level" name="experience_level">
                                        <option value="">Выберите уровень</option>
                                        <option value="junior" {{ old('experience_level', $vacancy->experience_level) == 'junior' ? 'selected' : '' }}>Junior</option>
                                        <option value="middle" {{ old('experience_level', $vacancy->experience_level) == 'middle' ? 'selected' : '' }}>Middle</option>
                                        <option value="senior" {{ old('experience_level', $vacancy->experience_level) == 'senior' ? 'selected' : '' }}>Senior</option>
                                        <option value="lead" {{ old('experience_level', $vacancy->experience_level) == 'lead' ? 'selected' : '' }}>Lead</option>
                                    </select>
                                    @error('experience_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="salary_from" class="form-label">Зарплата от (₽)</label>
                                    <input type="number" class="form-control @error('salary_from') is-invalid @enderror" 
                                           id="salary_from" name="salary_from" value="{{ old('salary_from', $vacancy->salary_from) }}"
                                           min="0" step="1000">
                                    @error('salary_from')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="salary_to" class="form-label">Зарплата до (₽)</label>
                                    <input type="number" class="form-control @error('salary_to') is-invalid @enderror" 
                                           id="salary_to" name="salary_to" value="{{ old('salary_to', $vacancy->salary_to) }}"
                                           min="0" step="1000">
                                    @error('salary_to')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="application_deadline" class="form-label">Дедлайн подачи заявки</label>
                                    <input type="date" class="form-control @error('application_deadline') is-invalid @enderror" 
                                           id="application_deadline" name="application_deadline" 
                                           value="{{ old('application_deadline', $vacancy->application_deadline?->format('Y-m-d')) }}">
                                    @error('application_deadline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" 
                                               value="1" {{ old('status', $vacancy->status) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">
                                            Активна
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                                               value="1" {{ old('is_featured', $vacancy->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Рекомендуемая вакансия
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Источник информации -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="mb-0">Откуда узнали о компании</h6>
                            </div>
                            <div class="card-body">
                                @php
                                    $currentSource = $vacancy->custom_source ?? '';
                                    $isCustom = !in_array($currentSource, ['LinkedIn', 'Instagram', 'Google', 'Информационный портал (turkmenportal, business.tm)', 'Кадровое агентство']);
                                @endphp
                                <div class="mb-3">
                                    <label class="form-label">Выберите источник *</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="source" id="source_linkedin" 
                                               value="LinkedIn" {{ $currentSource == 'LinkedIn' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="source_linkedin">
                                            LinkedIn
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="source" id="source_instagram" 
                                               value="Instagram" {{ $currentSource == 'Instagram' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="source_instagram">
                                            Instagram
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="source" id="source_google" 
                                               value="Google" {{ $currentSource == 'Google' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="source_google">
                                            Google
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="source" id="source_portal" 
                                               value="Информационный портал (turkmenportal, business.tm)" {{ $currentSource == 'Информационный портал (turkmenportal, business.tm)' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="source_portal">
                                            Информационный портал (turkmenportal, business.tm)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="source" id="source_agency" 
                                               value="Кадровое агентство" {{ $currentSource == 'Кадровое агентство' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="source_agency">
                                            Кадровое агентство
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="source" id="source_other" 
                                               value="other" {{ $isCustom ? 'checked' : '' }}>
                                        <label class="form-check-label" for="source_other">
                                            Другое:
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="mb-3" id="custom_source_field" style="{{ $isCustom ? 'display: block;' : 'display: none;' }}">
                                    <input type="text" class="form-control @error('custom_source') is-invalid @enderror" 
                                           id="custom_source" name="custom_source" value="{{ old('custom_source', $isCustom ? $currentSource : '') }}"
                                           placeholder="Укажите источник">
                                    @error('custom_source')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('source')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Категории -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="mb-0">Категории</h6>
                            </div>
                            <div class="card-body">
                                @if($categories->count() > 0)
                                    @foreach($categories as $category)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="category_{{ $category->id }}" name="categories[]" 
                                                   value="{{ $category->id }}"
                                                   {{ in_array($category->id, old('categories', $vacancy->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="category_{{ $category->id }}">
                                                {{ $category->translation('ru')->name ?? 'Категория' }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">Нет доступных категорий</p>
                                @endif
                                @error('categories')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Кнопки действий -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.vacancies.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Назад к списку
                            </a>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-save me-2"></i>
                                    Сохранить изменения
                                </button>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                    <i class="fas fa-trash me-2"></i>
                                    Удалить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Форма удаления (скрытая) -->
            <form id="delete-form" method="POST" action="{{ route('admin.vacancies.destroy', $vacancy->slug) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Превью изображения
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.style.display = 'none';
        }
    });

    // Управление полем "Другое" для источника
    const sourceOther = document.getElementById('source_other');
    const customSourceField = document.getElementById('custom_source_field');
    
    function toggleCustomSourceField() {
        if (sourceOther.checked) {
            customSourceField.style.display = 'block';
            document.getElementById('custom_source').required = true;
        } else {
            customSourceField.style.display = 'none';
            document.getElementById('custom_source').required = false;
        }
    }
    
    // Проверяем при загрузке страницы
    toggleCustomSourceField();
    
    // Добавляем обработчики для всех радио-кнопок источника
    const sourceRadios = document.querySelectorAll('input[name="source"]');
    sourceRadios.forEach(radio => {
        radio.addEventListener('change', toggleCustomSourceField);
    });
});

// Мгновенное удаление без подтверждения
function confirmDelete() {
    document.getElementById('delete-form').submit();
}
</script>
@endsection
