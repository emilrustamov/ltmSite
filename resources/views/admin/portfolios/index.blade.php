@extends('admin.layouts.app')

@section('title', 'Портфолио')
@section('page-title', 'Портфолио')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h5 class="mb-0">Управление портфолио</h5>
        <small class="text-muted">
            Всего проектов: {{ $portfolios->total() }}
            @if($portfolios->count())
                · Показано {{ $portfolios->firstItem() }} — {{ $portfolios->lastItem() }}
            @endif
        </small>
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

<!-- Красивая пагинация -->
@if($portfolios->hasPages())
<div class="pagination-wrapper mt-4">
    <div class="pagination-container">
        <!-- Информация о результатах -->
        <div class="pagination-info">
            <span class="text-muted">
                <i class="fas fa-list me-1"></i>
                Показано {{ $portfolios->firstItem() ?? 0 }} - {{ $portfolios->lastItem() ?? 0 }} 
                из {{ $portfolios->total() }} проектов
            </span>
        </div>
        
        <!-- Навигация по страницам -->
        <nav class="pagination-nav">
            <ul class="pagination pagination-modern">
                {{-- Previous Page Link --}}
                @if ($portfolios->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $portfolios->previousPageUrl() }}" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($portfolios->getUrlRange(1, $portfolios->lastPage()) as $page => $url)
                    @if ($page == $portfolios->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @elseif (($page <= 3) || 
                             ($page >= $portfolios->lastPage() - 2) || 
                             (abs($page - $portfolios->currentPage()) <= 2))
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif (($page == 4 && $portfolios->currentPage() > 6) || 
                             ($page == $portfolios->lastPage() - 3 && $portfolios->currentPage() < $portfolios->lastPage() - 5))
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($portfolios->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $portfolios->nextPageUrl() }}" rel="next">
                            <span class="me-1">Следующая</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">
                            <span class="me-1">Следующая</span>
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
        
        <!-- Быстрый переход -->
        <div class="pagination-quick-jump">
            <form method="GET" class="d-flex align-items-center">
                <span class="text-muted me-2">Перейти на:</span>
                <input type="number" 
                       name="page" 
                       min="1" 
                       max="{{ $portfolios->lastPage() }}" 
                       value="{{ $portfolios->currentPage() }}"
                       class="form-control form-control-sm me-2" 
                       style="width: 60px;">
                <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
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