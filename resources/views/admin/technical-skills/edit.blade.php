@extends('admin.layouts.app')

@section('title', 'Редактировать навык')
@section('page-title', 'Редактировать технический навык')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Информация о навыке</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.technical-skills.update', $technicalSkill) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_ru" class="form-label">Название (RU) *</label>
                                <input type="text" class="form-control @error('name_ru') is-invalid @enderror" 
                                       id="name_ru" name="name_ru" value="{{ old('name_ru', $technicalSkill->name_ru) }}" required>
                                @error('name_ru')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_en" class="form-label">Название (EN)</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror" 
                                       id="name_en" name="name_en" value="{{ old('name_en', $technicalSkill->name_en) }}">
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
                                       id="name_tm" name="name_tm" value="{{ old('name_tm', $technicalSkill->name_tm) }}">
                                @error('name_tm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Порядок сортировки</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $technicalSkill->sort_order) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                   {{ old('is_active', $technicalSkill->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Активен
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.technical-skills.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Назад к списку
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Сохранить изменения
                        </button>
                        <button type="button" class="btn btn-danger delete-btn delete-skill" 
                                data-id="{{ $technicalSkill->id }}" 
                                data-name="{{ $technicalSkill->name_ru }}">
                            <i class="fas fa-trash me-2"></i>
                            Удалить навык
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Скрытая форма для удаления -->
<form id="delete-form-{{ $technicalSkill->id }}" action="{{ route('admin.technical-skills.destroy', $technicalSkill) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection
