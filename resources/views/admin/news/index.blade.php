@extends('admin.layouts.app')

@section('title', 'Новости')
@section('page-title', 'Новости')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать новость
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Категории</th>
                <th>Статус</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $article)
                <tr class="news-row" data-news-slug="{{ $article->slug }}" style="cursor: pointer;">
                    <td>#{{ $article->id }}</td>
                    <td>
                        @if($article->getFirstMediaUrl('news-images'))
                            <img src="{{ $article->getFirstMediaUrl('news-images') }}" 
                                 alt="{{ $article->translation('ru')->title ?? '' }}" 
                                 class="img-thumbnail" 
                                 style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold">{{ $article->translation('ru')?->title ?? 'Без названия' }}</div>
                        <small class="text-muted">{{ $article->translation('en')?->title ?? '' }}</small>
                    </td>
                    <td>
                        @if($article->categories->count() > 0)
                            @foreach($article->categories as $category)
                                <span class="badge bg-primary me-1 mb-1">{{ $category->translation('ru')->name ?? 'Категория' }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">Без категорий</span>
                        @endif
                    </td>
                    <td>
                        @if($article->status)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                    </td>
                    <td>{{ $article->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <p class="text-muted mb-0">Нет новостей</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($news->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $news->links() }}
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Двойной клик для перехода на edit страницу
    const newsRows = document.querySelectorAll('.news-row');
    
    newsRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const newsSlug = this.getAttribute('data-news-slug');
            window.location.href = `/admin/news/${newsSlug}/edit`;
        });
        
        // Добавляем hover эффект
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f8f9fa';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
});
</script>
@endsection