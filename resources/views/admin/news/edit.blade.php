@extends('admin.layouts.app')

@section('title', 'Редактировать новость')
@section('page-title', 'Редактировать новость')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-edit me-2"></i>
                Редактирование новости
            </h4>
            <form action="{{ route('admin.news.update', $news->slug) }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="title_ru" class="form-label">Русский *</label>
                                    <input type="text" class="form-control @error('title_ru') is-invalid @enderror" 
                                           id="title_ru" name="title_ru" 
                                           value="{{ old('title_ru', $news->translation('ru')->title ?? '') }}" required>
                                    @error('title_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title_en" class="form-label">English</label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror" 
                                           id="title_en" name="title_en" 
                                           value="{{ old('title_en', $news->translation('en')->title ?? '') }}">
                                    @error('title_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="title_tm" class="form-label">Türkmen</label>
                                    <input type="text" class="form-control @error('title_tm') is-invalid @enderror" 
                                           id="title_tm" name="title_tm" 
                                           value="{{ old('title_tm', $news->translation('tm')->title ?? '') }}">
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
                                              id="content_ru" name="content_ru" rows="8">{{ old('content_ru', $news->translation('ru')->content ?? '') }}</textarea>
                                    @error('content_ru')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="content_en" class="form-label">English</label>
                                    <textarea class="form-control @error('content_en') is-invalid @enderror" 
                                              id="content_en" name="content_en" rows="8">{{ old('content_en', $news->translation('en')->content ?? '') }}</textarea>
                                    @error('content_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="content_tm" class="form-label">Türkmen</label>
                                    <textarea class="form-control @error('content_tm') is-invalid @enderror" 
                                              id="content_tm" name="content_tm" rows="8">{{ old('content_tm', $news->translation('tm')->content ?? '') }}</textarea>
                                    @error('content_tm')
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
                                @if($news->getFirstMediaUrl('news-images'))
                                    <div class="text-center mb-3">
                                        <img src="{{ $news->getFirstMediaUrl('news-images') }}" 
                                             alt="{{ $news->translation('ru')->title ?? '' }}" 
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" 
                                               value="1" {{ old('status', $news->status) ? 'checked' : '' }}>
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
                            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
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
            <form id="delete-form" method="POST" action="{{ route('admin.news.destroy', $news->slug) }}" style="display: none;">
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
});

// Мгновенное удаление без подтверждения
function confirmDelete() {
    document.getElementById('delete-form').submit();
}
</script>
@endsection