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
                                <label for="employment_type" class="form-label fw-bold">Тип занятости</label>
                                <select class="form-control @error('employment_type') is-invalid @enderror" id="employment_type" name="employment_type">
                                    <option value="">-- Выберите тип --</option>
                                    <option value="full-time" {{ old('employment_type', $jobPosition->employment_type) == 'full-time' ? 'selected' : '' }}>Полная занятость (Full-time)</option>
                                    <option value="part-time" {{ old('employment_type', $jobPosition->employment_type) == 'part-time' ? 'selected' : '' }}>Частичная занятость (Part-time)</option>
                                    <option value="contract" {{ old('employment_type', $jobPosition->employment_type) == 'contract' ? 'selected' : '' }}>Контракт (Contract)</option>
                                    <option value="temporary" {{ old('employment_type', $jobPosition->employment_type) == 'temporary' ? 'selected' : '' }}>Временная работа (Temporary)</option>
                                    <option value="internship" {{ old('employment_type', $jobPosition->employment_type) == 'internship' ? 'selected' : '' }}>Стажировка (Internship)</option>
                                    <option value="volunteer" {{ old('employment_type', $jobPosition->employment_type) == 'volunteer' ? 'selected' : '' }}>Волонтерство (Volunteer)</option>
                                </select>
                                @error('employment_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="work_format" class="form-label fw-bold">Формат работы</label>
                                <select class="form-control @error('work_format') is-invalid @enderror" id="work_format" name="work_format">
                                    <option value="">-- Выберите формат --</option>
                                    <option value="on-site" {{ old('work_format', $jobPosition->work_format) == 'on-site' ? 'selected' : '' }}>В офисе (On-site)</option>
                                    <option value="remote" {{ old('work_format', $jobPosition->work_format) == 'remote' ? 'selected' : '' }}>Удаленно (Remote)</option>
                                    <option value="hybrid" {{ old('work_format', $jobPosition->work_format) == 'hybrid' ? 'selected' : '' }}>Гибридный (Hybrid)</option>
                                </select>
                                @error('work_format')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Заработная плата (ru/en/tm)</label>
                                <input type="text" name="salary_ru" class="form-control mb-2" placeholder="Русский" value="{{ old('salary_ru', $jobPosition->salary_ru) }}">
                                <input type="text" name="salary_en" class="form-control mb-2" placeholder="English" value="{{ old('salary_en', $jobPosition->salary_en) }}">
                                <input type="text" name="salary_tm" class="form-control" placeholder="Türkmen" value="{{ old('salary_tm', $jobPosition->salary_tm) }}">
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

                    <!-- Требования -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Требования</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="requirements_ru" class="form-label">Русский</label>
                                <textarea class="form-control" id="requirements_ru" name="requirements_ru" rows="5">{{ old('requirements_ru', $jobPosition->requirements_ru) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="requirements_en" class="form-label">English</label>
                                <textarea class="form-control" id="requirements_en" name="requirements_en" rows="5">{{ old('requirements_en', $jobPosition->requirements_en) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="requirements_tm" class="form-label">Türkmen</label>
                                <textarea class="form-control" id="requirements_tm" name="requirements_tm" rows="5">{{ old('requirements_tm', $jobPosition->requirements_tm) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Условия -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Условия</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="conditions_ru" class="form-label">Русский</label>
                                <textarea class="form-control" id="conditions_ru" name="conditions_ru" rows="5">{{ old('conditions_ru', $jobPosition->conditions_ru) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="conditions_en" class="form-label">English</label>
                                <textarea class="form-control" id="conditions_en" name="conditions_en" rows="5">{{ old('conditions_en', $jobPosition->conditions_en) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="conditions_tm" class="form-label">Türkmen</label>
                                <textarea class="form-control" id="conditions_tm" name="conditions_tm" rows="5">{{ old('conditions_tm', $jobPosition->conditions_tm) }}</textarea>
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
                        
                        <!-- Блок для добавления новых навыков -->
                        <div class="card-footer bg-white border-top">
                            <button type="button" class="btn btn-sm btn-outline-primary w-100" id="addNewSkillBtn">
                                <i class="fas fa-plus me-2"></i>
                                Добавить новый навык
                            </button>
                            <div id="newSkillsContainer" class="mt-3"></div>
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
    const addNewSkillBtn = document.getElementById('addNewSkillBtn');
    const newSkillsContainer = document.getElementById('newSkillsContainer');
    let skillCounter = 0;
    
    selectAllBtn.addEventListener('click', function() {
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        checkboxes.forEach(cb => cb.checked = !allChecked);
        this.textContent = !allChecked ? 'Снять все' : 'Все';
    });

    addNewSkillBtn.addEventListener('click', function() {
        const skillIndex = skillCounter++;
        const skillHtml = `
            <div class="new-skill-item mb-3 p-3 border rounded" data-skill-index="${skillIndex}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Новый навык #${skillIndex + 1}</strong>
                    <button type="button" class="btn btn-sm btn-outline-danger remove-skill-btn">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label class="form-label small">Русский *</label>
                        <input type="text" class="form-control form-control-sm" 
                               name="new_technical_skills[${skillIndex}][name_ru]" 
                               placeholder="Название на русском" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small">English</label>
                        <input type="text" class="form-control form-control-sm" 
                               name="new_technical_skills[${skillIndex}][name_en]" 
                               placeholder="Name in English">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label small">Türkmen</label>
                        <input type="text" class="form-control form-control-sm" 
                               name="new_technical_skills[${skillIndex}][name_tm]" 
                               placeholder="Türkmençe ady">
                    </div>
                </div>
            </div>
        `;
        newSkillsContainer.insertAdjacentHTML('beforeend', skillHtml);
    });

    // Удаление нового навыка
    newSkillsContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-skill-btn')) {
            e.target.closest('.new-skill-item').remove();
        }
    });
});
</script>
@endsection
