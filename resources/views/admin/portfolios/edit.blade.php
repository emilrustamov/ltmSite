@extends('admin.layouts.app')

@section('title', 'Редактировать портфолио')
@section('page-title', 'Редактировать портфолио')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-edit me-2"></i>
                Редактирование портфолио
            </h4>
                <form action="{{ route('admin.portfolios.update', $portfolio->slug) }}" method="POST" enctype="multipart/form-data">
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
                                               value="{{ old('title_ru', $portfolio->translation('ru')->title ?? '') }}" required>
                                        @error('title_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="title_en" class="form-label">English</label>
                                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" 
                                               id="title_en" name="title_en" 
                                               value="{{ old('title_en', $portfolio->translation('en')->title ?? '') }}">
                                        @error('title_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="title_tm" class="form-label">Türkmen</label>
                                        <input type="text" class="form-control @error('title_tm') is-invalid @enderror" 
                                               id="title_tm" name="title_tm" 
                                               value="{{ old('title_tm', $portfolio->translation('tm')->title ?? '') }}">
                                        @error('title_tm')
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
                                        <label for="desc_ru" class="form-label">Русский</label>
                                        <textarea class="form-control @error('desc_ru') is-invalid @enderror" 
                                                  id="desc_ru" name="desc_ru" rows="4">{{ old('desc_ru', $portfolio->translation('ru')->description ?? '') }}</textarea>
                                        @error('desc_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="desc_en" class="form-label">English</label>
                                        <textarea class="form-control @error('desc_en') is-invalid @enderror" 
                                                  id="desc_en" name="desc_en" rows="4">{{ old('desc_en', $portfolio->translation('en')->description ?? '') }}</textarea>
                                        @error('desc_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="desc_tm" class="form-label">Türkmen</label>
                                        <textarea class="form-control @error('desc_tm') is-invalid @enderror" 
                                                  id="desc_tm" name="desc_tm" rows="4">{{ old('desc_tm', $portfolio->translation('tm')->description ?? '') }}</textarea>
                                        @error('desc_tm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        
                            <!-- Заказчик -->
                            <div class="mb-4">
                                <h6 class="border-bottom pb-2 mb-3">Заказчик</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="who_ru" class="form-label">Русский</label>
                                        <input type="text" class="form-control @error('who_ru') is-invalid @enderror" 
                                               id="who_ru" name="who_ru" 
                                               value="{{ old('who_ru', $portfolio->translation('ru')->who ?? '') }}">
                                        @error('who_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="who_en" class="form-label">English</label>
                                        <input type="text" class="form-control @error('who_en') is-invalid @enderror" 
                                               id="who_en" name="who_en" 
                                               value="{{ old('who_en', $portfolio->translation('en')->who ?? '') }}">
                                        @error('who_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="who_tm" class="form-label">Türkmen</label>
                                        <input type="text" class="form-control @error('who_tm') is-invalid @enderror" 
                                               id="who_tm" name="who_tm" 
                                               value="{{ old('who_tm', $portfolio->translation('tm')->who ?? '') }}">
                                        @error('who_tm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        
                            <!-- Цель -->
                            <div class="mb-4">
                                <h6 class="border-bottom pb-2 mb-3">Цель проекта</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="target_ru" class="form-label">Русский</label>
                                        <textarea class="form-control @error('target_ru') is-invalid @enderror" 
                                                  id="target_ru" name="target_ru" rows="3">{{ old('target_ru', $portfolio->translation('ru')->target ?? '') }}</textarea>
                                        @error('target_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                                    <div class="col-md-4">
                                        <label for="target_en" class="form-label">English</label>
                                        <textarea class="form-control @error('target_en') is-invalid @enderror" 
                                                  id="target_en" name="target_en" rows="3">{{ old('target_en', $portfolio->translation('en')->target ?? '') }}</textarea>
                                        @error('target_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                                    <div class="col-md-4">
                                        <label for="target_tm" class="form-label">Türkmen</label>
                                        <textarea class="form-control @error('target_tm') is-invalid @enderror" 
                                                  id="target_tm" name="target_tm" rows="3">{{ old('target_tm', $portfolio->translation('tm')->target ?? '') }}</textarea>
                                        @error('target_tm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                    </div>
                </div>
                
                            <!-- Результат -->
                            <div class="mb-4">
                                <h6 class="border-bottom pb-2 mb-3">Результат</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="res_ru" class="form-label">Русский</label>
                                        <textarea class="form-control @error('res_ru') is-invalid @enderror" 
                                                  id="res_ru" name="res_ru" rows="3">{{ old('res_ru', $portfolio->translation('ru')->result ?? '') }}</textarea>
                                        @error('res_ru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="res_en" class="form-label">English</label>
                                        <textarea class="form-control @error('res_en') is-invalid @enderror" 
                                                  id="res_en" name="res_en" rows="3">{{ old('res_en', $portfolio->translation('en')->result ?? '') }}</textarea>
                                        @error('res_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="res_tm" class="form-label">Türkmen</label>
                                        <textarea class="form-control @error('res_tm') is-invalid @enderror" 
                                                  id="res_tm" name="res_tm" rows="3">{{ old('res_tm', $portfolio->translation('tm')->result ?? '') }}</textarea>
                                        @error('res_tm')
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
                                    @if($portfolio->getFirstMediaUrl('portfolio-images'))
                                        <div class="text-center mb-3">
                                            <img src="{{ $portfolio->getFirstMediaUrl('portfolio-images') }}" 
                                                 alt="{{ $portfolio->translation('ru')->title ?? '' }}" 
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
                                        <label for="url_button" class="form-label">URL кнопки</label>
                                        <input type="url" class="form-control @error('url_button') is-invalid @enderror" 
                                               id="url_button" name="url_button" 
                                               value="{{ old('url_button', $portfolio->url_button) }}"
                                               placeholder="https://example.com">
                                        @error('url_button')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                        
                                    <div class="mb-3">
                                        <label for="when" class="form-label">Дата проекта</label>
                                        <input type="date" class="form-control @error('when') is-invalid @enderror" 
                                               id="when" name="when" 
                                               value="{{ old('when', $portfolio->when ? $portfolio->when->format('Y-m-d') : '') }}">
                                        @error('when')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                        
                                    <div class="mb-3">
                                        <label for="ordering" class="form-label">Порядок сортировки</label>
                                        <input type="number" class="form-control @error('ordering') is-invalid @enderror" 
                                               id="ordering" name="ordering" 
                                               value="{{ old('ordering', $portfolio->ordering) }}">
                                        @error('ordering')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                        </div>
                        
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="status" name="status" 
                                                   value="1" {{ old('status', $portfolio->status) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status">
                                                Активен
                            </label>
                                        </div>
                        </div>
                        
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_main_page" name="is_main_page" 
                                                   value="1" {{ old('is_main_page', $portfolio->is_main_page) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_main_page">
                                                Показывать на главной странице
                            </label>
                    </div>
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
                                                       {{ in_array($category->id, old('categories', $portfolio->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
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
                                <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
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
            <form id="delete-form" method="POST" action="{{ route('admin.portfolios.destroy', $portfolio->slug) }}" style="display: none;">
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

// Функция удаления без подтверждения
function confirmDelete() {
    document.getElementById('delete-form').submit();
}
</script>
@endsection