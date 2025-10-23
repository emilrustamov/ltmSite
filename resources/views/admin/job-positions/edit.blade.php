@extends('admin.layouts.app')

@section('title', 'Редактировать должность')
@section('page-title', 'Редактировать должность')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Информация о должности</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.job-positions.update', $jobPosition) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_ru" class="form-label">Название (RU) *</label>
                                <input type="text" class="form-control @error('name_ru') is-invalid @enderror" 
                                       id="name_ru" name="name_ru" value="{{ old('name_ru', $jobPosition->name_ru) }}" required>
                                @error('name_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_en" class="form-label">Название (EN)</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror" 
                                       id="name_en" name="name_en" value="{{ old('name_en', $jobPosition->name_en) }}">
                                @error('name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_tm" class="form-label">Название (TM)</label>
                                <input type="text" class="form-control @error('name_tm') is-invalid @enderror" 
                                       id="name_tm" name="name_tm" value="{{ old('name_tm', $jobPosition->name_tm) }}">
                                @error('name_tm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Порядок сортировки</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $jobPosition->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Новые поля -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Загрузить изображение</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Максимальный размер: 10MB. Оставьте пустым, чтобы не изменять текущее изображение.</div>
                                
                                @if($jobPosition->image)
                                    <div class="mt-3">
                                        <label class="form-label">Текущее изображение:</label>
                                        <div class="text-center">
                                            <img src="{{ asset($jobPosition->image) }}" class="img-fluid rounded" style="max-height: 200px;" alt="Текущее изображение">
                                        </div>
                                    </div>
                                @endif
                                
                                <div id="image-preview" class="text-center mt-3" style="display: none;">
                                    <img id="preview-img" class="img-fluid rounded" style="max-height: 200px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ordering" class="form-label">Порядок на главной</label>
                                <input type="number" class="form-control @error('ordering') is-invalid @enderror" 
                                       id="ordering" name="ordering" value="{{ old('ordering', $jobPosition->ordering) }}" min="0">
                                @error('ordering')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Описание -->
                    <div class="mb-4">
                        <h6 class="mb-3">Описание должности</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="description_ru" class="form-label">Описание (RU)</label>
                                    <textarea class="form-control @error('description_ru') is-invalid @enderror" 
                                              id="description_ru" name="description_ru" rows="4">{{ old('description_ru', $jobPosition->description_ru) }}</textarea>
                                    @error('description_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="description_en" class="form-label">Описание (EN)</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" 
                                              id="description_en" name="description_en" rows="4">{{ old('description_en', $jobPosition->description_en) }}</textarea>
                                    @error('description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="description_tm" class="form-label">Описание (TM)</label>
                                    <textarea class="form-control @error('description_tm') is-invalid @enderror" 
                                              id="description_tm" name="description_tm" rows="4">{{ old('description_tm', $jobPosition->description_tm) }}</textarea>
                                    @error('description_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Обязанности -->
                    <div class="mb-4">
                        <h6 class="mb-3">Обязанности</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="responsibilities_ru" class="form-label">Обязанности (RU)</label>
                                    <textarea class="form-control @error('responsibilities_ru') is-invalid @enderror" 
                                              id="responsibilities_ru" name="responsibilities_ru" rows="4">{{ old('responsibilities_ru', $jobPosition->responsibilities_ru) }}</textarea>
                                    @error('responsibilities_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="responsibilities_en" class="form-label">Обязанности (EN)</label>
                                    <textarea class="form-control @error('responsibilities_en') is-invalid @enderror" 
                                              id="responsibilities_en" name="responsibilities_en" rows="4">{{ old('responsibilities_en', $jobPosition->responsibilities_en) }}</textarea>
                                    @error('responsibilities_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="responsibilities_tm" class="form-label">Обязанности (TM)</label>
                                    <textarea class="form-control @error('responsibilities_tm') is-invalid @enderror" 
                                              id="responsibilities_tm" name="responsibilities_tm" rows="4">{{ old('responsibilities_tm', $jobPosition->responsibilities_tm) }}</textarea>
                                    @error('responsibilities_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Преимущества -->
                    <div class="mb-4">
                        <h6 class="mb-3">Преимущества работы</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="benefits_ru" class="form-label">Преимущества (RU)</label>
                                    <textarea class="form-control @error('benefits_ru') is-invalid @enderror" 
                                              id="benefits_ru" name="benefits_ru" rows="4">{{ old('benefits_ru', $jobPosition->benefits_ru) }}</textarea>
                                    @error('benefits_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="benefits_en" class="form-label">Преимущества (EN)</label>
                                    <textarea class="form-control @error('benefits_en') is-invalid @enderror" 
                                              id="benefits_en" name="benefits_en" rows="4">{{ old('benefits_en', $jobPosition->benefits_en) }}</textarea>
                                    @error('benefits_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="benefits_tm" class="form-label">Преимущества (TM)</label>
                                    <textarea class="form-control @error('benefits_tm') is-invalid @enderror" 
                                              id="benefits_tm" name="benefits_tm" rows="4">{{ old('benefits_tm', $jobPosition->benefits_tm) }}</textarea>
                                    @error('benefits_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Статусы -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                           {{ old('is_active', $jobPosition->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Активна
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" value="1" 
                                           {{ old('status', $jobPosition->status) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">
                                        Опубликовано
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Связь с техническими навыками -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Технические навыки для должности</label>
                        
                        <!-- Чекбокс "Выбрать все" -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="select_all_skills" onchange="toggleAllSkills()">
                                <label class="form-check-label fw-bold text-primary" for="select_all_skills">
                                    <i class="fas fa-check-double me-1"></i>Выбрать все навыки
                                </label>
                            </div>
                        </div>
                        
                        <div class="row">
                            @foreach(\App\Models\TechnicalSkill::active()->ordered()->get() as $skill)
                                @php
                                    $isSelected = $jobPosition->technicalSkills->contains($skill->id);
                                @endphp
                                <div class="col-md-6 col-lg-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input skill-checkbox" type="checkbox" 
                                               id="skill_{{ $skill->id }}" 
                                               name="technical_skills[]" 
                                               value="{{ $skill->id }}"
                                               {{ $isSelected ? 'checked' : '' }}>
                                        <label class="form-check-label" for="skill_{{ $skill->id }}">
                                            {{ $skill->name_ru }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            Выберите навыки, которые требуются для этой должности
                        </div>
                        @error('technical_skills')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.job-positions.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Назад к списку
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Сохранить изменения
                        </button>
                        <button type="button" class="btn btn-danger delete-btn delete-position" 
                                data-id="{{ $jobPosition->id }}" 
                                data-name="{{ $jobPosition->name_ru }}">
                            <i class="fas fa-trash me-2"></i>
                            Удалить должность
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function toggleAllSkills() {
    const selectAllCheckbox = document.getElementById('select_all_skills');
    const skillCheckboxes = document.querySelectorAll('.skill-checkbox');
    
    skillCheckboxes.forEach(checkbox => {
        checkbox.checked = selectAllCheckbox.checked;
    });
}

// Предварительный просмотр изображения
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
</script>

<!-- Скрытая форма для удаления -->
<form id="delete-form-{{ $jobPosition->id }}" action="{{ route('admin.job-positions.destroy', $jobPosition) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection
