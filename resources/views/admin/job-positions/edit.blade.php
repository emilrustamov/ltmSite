@extends('admin.layouts.app')

@section('title', 'Редактировать вакансию')
@section('page-title', 'Редактировать вакансию')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>
                <i class="fas fa-edit me-2"></i>
                Редактирование: {{ $jobPosition->name_ru }}
            </h4>
            <form action="{{ route('admin.job-positions.destroy', $jobPosition->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту вакансию?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash me-2"></i>
                    Удалить вакансию
                </button>
            </form>
        </div>

        <form action="{{ route('admin.job-positions.update', $jobPosition->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <!-- Основная информация -->
                <div class="col-lg-8">
                    <!-- Название -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Название должности</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name_ru" class="form-label">Русский *</label>
                                <input type="text" class="form-control @error('name_ru') is-invalid @enderror" 
                                       id="name_ru" name="name_ru" value="{{ old('name_ru', $jobPosition->name_ru) }}" required>
                                @error('name_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="name_en" class="form-label">English</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror" 
                                       id="name_en" name="name_en" value="{{ old('name_en', $jobPosition->name_en) }}">
                                @error('name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="name_tm" class="form-label">Türkmen</label>
                                <input type="text" class="form-control @error('name_tm') is-invalid @enderror" 
                                       id="name_tm" name="name_tm" value="{{ old('name_tm', $jobPosition->name_tm) }}">
                                @error('name_tm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Мета поля (Тип, Формат, З/П) -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Детали вакансии</h6>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Тип занятости (ru/en/tm)</label>
                                <input type="text" name="employment_type_ru" class="form-control mb-2" placeholder="Русский" value="{{ old('employment_type_ru', $jobPosition->employment_type_ru) }}">
                                <input type="text" name="employment_type_en" class="form-control mb-2" placeholder="English" value="{{ old('employment_type_en', $jobPosition->employment_type_en) }}">
                                <input type="text" name="employment_type_tm" class="form-control" placeholder="Türkmen" value="{{ old('employment_type_tm', $jobPosition->employment_type_tm) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Формат работы (ru/en/tm)</label>
                                <input type="text" name="work_format_ru" class="form-control mb-2" placeholder="Русский" value="{{ old('work_format_ru', $jobPosition->work_format_ru) }}">
                                <input type="text" name="work_format_en" class="form-control mb-2" placeholder="English" value="{{ old('work_format_en', $jobPosition->work_format_en) }}">
                                <input type="text" name="work_format_tm" class="form-control" placeholder="Türkmen" value="{{ old('work_format_tm', $jobPosition->work_format_tm) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Заработная плата (ru/en/tm)</label>
                                <input type="text" name="salary_ru" class="form-control mb-2" placeholder="Русский" value="{{ old('salary_ru', $jobPosition->salary_ru) }}">
                                <input type="text" name="salary_en" class="form-control mb-2" placeholder="English" value="{{ old('salary_en', $jobPosition->salary_en) }}">
                                <input type="text" name="salary_tm" class="form-control" placeholder="Türkmen" value="{{ old('salary_tm', $jobPosition->salary_tm) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Описание -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Описание вакансии</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="description_ru" class="form-label">Русский</label>
                                <textarea class="form-control" id="description_ru" name="description_ru" rows="5">{{ old('description_ru', $jobPosition->description_ru) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="description_en" class="form-label">English</label>
                                <textarea class="form-control" id="description_en" name="description_en" rows="5">{{ old('description_en', $jobPosition->description_en) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="description_tm" class="form-label">Türkmen</label>
                                <textarea class="form-control" id="description_tm" name="description_tm" rows="5">{{ old('description_tm', $jobPosition->description_tm) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Обязанности -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Обязанности</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="responsibilities_ru" class="form-label">Русский</label>
                                <textarea class="form-control" id="responsibilities_ru" name="responsibilities_ru" rows="5">{{ old('responsibilities_ru', $jobPosition->responsibilities_ru) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="responsibilities_en" class="form-label">English</label>
                                <textarea class="form-control" id="responsibilities_en" name="responsibilities_en" rows="5">{{ old('responsibilities_en', $jobPosition->responsibilities_en) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="responsibilities_tm" class="form-label">Türkmen</label>
                                <textarea class="form-control" id="responsibilities_tm" name="responsibilities_tm" rows="5">{{ old('responsibilities_tm', $jobPosition->responsibilities_tm) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Преимущества -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Условия и бонусы</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="benefits_ru" class="form-label">Русский</label>
                                <textarea class="form-control" id="benefits_ru" name="benefits_ru" rows="5">{{ old('benefits_ru', $jobPosition->benefits_ru) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="benefits_en" class="form-label">English</label>
                                <textarea class="form-control" id="benefits_en" name="benefits_en" rows="5">{{ old('benefits_en', $jobPosition->benefits_en) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="benefits_tm" class="form-label">Türkmen</label>
                                <textarea class="form-control" id="benefits_tm" name="benefits_tm" rows="5">{{ old('benefits_tm', $jobPosition->benefits_tm) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Боковая панель -->
                <div class="col-lg-4">
                    <!-- Настройки -->
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-white">
                            <h6 class="mb-0 fw-bold">Настройки</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Порядок сортировки</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $jobPosition->sort_order) }}">
                            </div>

                            <div class="mb-3">
                                <label for="ordering" class="form-label">Сортировка на главной</label>
                                <input type="number" class="form-control" id="ordering" name="ordering" value="{{ old('ordering', $jobPosition->ordering) }}">
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $jobPosition->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Активна</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" value="1" {{ old('status', $jobPosition->status) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Показывать на главной</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Навыки -->
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 fw-bold">Технические навыки</h6>
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="selectAllSkills">Все</button>
                        </div>
                        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                            @php
                                $selectedSkills = old('technical_skills', $jobPosition->technicalSkills->pluck('id')->toArray());
                            @endphp
                            @foreach($technicalSkills as $skill)
                                <div class="form-check mb-2">
                                    <input class="form-check-input skill-checkbox" type="checkbox" name="technical_skills[]" 
                                           value="{{ $skill->id }}" id="skill_{{ $skill->id }}"
                                           {{ in_array($skill->id, $selectedSkills) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="skill_{{ $skill->id }}">
                                        {{ $skill->name_ru }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Кнопки действий -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between">
                            <a href="{{ route('admin.job-positions.index') }}" class="btn btn-secondary px-4">
                                <i class="fas fa-arrow-left me-2"></i>
                                Назад к списку
                            </a>
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="fas fa-save me-2"></i>
                                Сохранить изменения
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllBtn = document.getElementById('selectAllSkills');
    const checkboxes = document.querySelectorAll('.skill-checkbox');
    
    selectAllBtn.addEventListener('click', function() {
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        checkboxes.forEach(cb => cb.checked = !allChecked);
        this.textContent = !allChecked ? 'Снять все' : 'Все';
    });
});
</script>
@endsection
