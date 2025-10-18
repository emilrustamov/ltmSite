@extends('admin.layouts.app')

@section('title', 'Создать должность')
@section('page-title', 'Создать должность')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Информация о должности</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.job-positions.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_ru" class="form-label">Название (RU) *</label>
                                <input type="text" class="form-control @error('name_ru') is-invalid @enderror" 
                                       id="name_ru" name="name_ru" value="{{ old('name_ru') }}" required>
                                @error('name_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_en" class="form-label">Название (EN)</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror" 
                                       id="name_en" name="name_en" value="{{ old('name_en') }}">
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
                                       id="name_tm" name="name_tm" value="{{ old('name_tm') }}">
                                @error('name_tm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Порядок сортировки</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <div class="col-md-6 col-lg-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input skill-checkbox" type="checkbox" 
                                               id="skill_{{ $skill->id }}" 
                                               name="technical_skills[]" 
                                               value="{{ $skill->id }}">
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
                            Создать должность
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
</script>
@endsection
