@extends('admin.layouts.app')

@section('title', 'Создать новость')
@section('page-title', 'Создать новость')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-plus me-2"></i>
                Создание новости
            </h4>
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <!-- Основная информация -->
                    <div class="col-lg-8">
                        <!-- Мультиязычные поля -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Название</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title_ru" class="form-label">Русский *</label>
                                    <input type="text" class="form-control @error('title_ru') is-invalid @enderror" 
                                           id="title_ru" name="title_ru" 
                                           value="{{ old('title_ru') }}" required>
                                    @error('title_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title_en" class="form-label">English</label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" 
                                           id="title_en" name="title_en" 
                                           value="{{ old('title_en') }}">
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title_tm" class="form-label">Türkmen</label>
                                    <input type="text" class="form-control @error('title_tm') is-invalid @enderror" 
                                           id="title_tm" name="title_tm" 
                                           value="{{ old('title_tm') }}">
                                    @error('title_tm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Содержание -->
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Содержание</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="content_ru" class="form-label">Русский</label>
                                    <textarea class="form-control @error('content_ru') is-invalid @enderror" 
                                              id="content_ru" name="content_ru" rows="8">{{ old('content_ru') }}</textarea>
                                    @error('content_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="content_en" class="form-label">English</label>
                                    <textarea class="form-control @error('content_en') is-invalid @enderror" 
                                              id="content_en" name="content_en" rows="8">{{ old('content_en') }}</textarea>
                                    @error('content_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="content_tm" class="form-label">Türkmen</label>
                                    <textarea class="form-control @error('content_tm') is-invalid @enderror" 
                                              id="content_tm" name="content_tm" rows="8">{{ old('content_tm') }}</textarea>
                                    @error('content_tm')
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
                                               value="1" {{ old('status', 1) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">
                                            Активна
                                        </label>
                                    </div>
                                </div>
                                
                                <!-- Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Изображение</label>
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
                                                   {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
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
                            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Назад к списку
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Создать новость
                            </button>
                        </div>
                    </div>
                </div>
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
});
</script>
@endsection