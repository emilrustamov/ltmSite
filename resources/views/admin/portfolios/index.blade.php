@extends('admin.layouts.app')

@section('title', 'Портфолио')
@section('page-title', 'Портфолио')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h5 class="mb-0">Управление портфолио</h5>
        <small class="text-muted">Всего проектов: {{ $portfolios->total() }}</small>
    </div>
    @if(Auth::user()->hasPermission('portfolio.create'))
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать портфолио
    </a>
    @endif
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
                <th>На главной</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
            @forelse($portfolios as $portfolio)
                <tr class="portfolio-row clickable-row" data-portfolio-slug="{{ $portfolio->slug }}" data-id="{{ $portfolio->id }}">
                    <td>#{{ $portfolio->id }}</td>
                    <td>
                        @if($portfolio->getFirstMediaUrl('portfolio-images'))
                            <img src="{{ $portfolio->getFirstMediaUrl('portfolio-images') }}" 
                                 alt="{{ $portfolio->translation('ru')->title ?? '' }}" 
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
                        <div class="fw-bold">{{ $portfolio->translation('ru')?->title ?? 'Без названия' }}</div>
                        <small class="text-muted">{{ $portfolio->translation('en')?->title ?? '' }}</small>
                    </td>
                    <td>
                        @if($portfolio->categories->count() > 0)
                            @foreach($portfolio->categories as $category)
                                <span class="badge bg-secondary me-1">
                                    {{ $category->translation('ru')?->name ?? 'Категория' }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-muted">Нет категории</span>
                        @endif
                    </td>
                    <td>
                        @if($portfolio->status)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Неактивен</span>
                        @endif
                    </td>
                    <td>
                        @if($portfolio->is_main_page)
                            <span class="badge bg-warning">Да</span>
                        @else
                            <span class="badge bg-light text-dark">Нет</span>
                        @endif
                    </td>
                    <td>{{ $portfolio->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <p class="text-muted mb-0">Нет проектов</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($portfolios->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $portfolios->links() }}
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Двойной клик для перехода на edit страницу
    const portfolioRows = document.querySelectorAll('.portfolio-row');
    
    portfolioRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const portfolioSlug = this.getAttribute('data-portfolio-slug');
            window.location.href = `/admin/portfolios/${portfolioSlug}/edit`;
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