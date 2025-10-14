@extends('admin.layouts.app')

@section('title', 'Редактировать категорию')
@section('page-title', 'Редактировать категорию')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-edit me-2"></i>
                Редактирование категории
            </h4>
            <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <!-- Основная информация -->
                    <div class="col-lg-8">
                        <!-- Мультиязычные поля -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Название</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name_ru" class="form-label">Русский *</label>
                                    <input type="text" class="form-control @error('name_ru') is-invalid @enderror" 
                                           id="name_ru" name="name_ru" 
                                           value="{{ old('name_ru', $category->translation('ru')->name ?? '') }}" required>
                                    @error('name_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="name_en" class="form-label">English</label>
                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" 
                                           id="name_en" name="name_en" 
                                           value="{{ old('name_en', $category->translation('en')->name ?? '') }}">
                                    @error('name_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="name_tm" class="form-label">Türkmen</label>
                                    <input type="text" class="form-control @error('name_tm') is-invalid @enderror" 
                                           id="name_tm" name="name_tm" 
                                           value="{{ old('name_tm', $category->translation('tm')->name ?? '') }}">
                                    @error('name_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Описание -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Описание</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="description_ru" class="form-label">Русский</label>
                                    <textarea class="form-control @error('description_ru') is-invalid @enderror" 
                                              id="description_ru" name="description_ru" rows="4">{{ old('description_ru', $category->translation('ru')->description ?? '') }}</textarea>
                                    @error('description_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="description_en" class="form-label">English</label>
                                    <textarea class="form-control @error('description_en') is-invalid @enderror" 
                                              id="description_en" name="description_en" rows="4">{{ old('description_en', $category->translation('en')->description ?? '') }}</textarea>
                                    @error('description_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="description_tm" class="form-label">Türkmen</label>
                                    <textarea class="form-control @error('description_tm') is-invalid @enderror" 
                                              id="description_tm" name="description_tm" rows="4">{{ old('description_tm', $category->translation('tm')->description ?? '') }}</textarea>
                                    @error('description_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Боковая панель -->
                    <div class="col-lg-4">
                        <!-- Настройки -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="mb-0">Настройки</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" 
                                               value="1" {{ old('status', $category->status) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">
                                            Активна
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Кнопки действий -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
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
            <form id="delete-form" method="POST" action="{{ route('admin.categories.destroy', $category->slug) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

<script>
// Функция удаления без подтверждения
function confirmDelete() {
    document.getElementById('delete-form').submit();
}
</script>
@endsection