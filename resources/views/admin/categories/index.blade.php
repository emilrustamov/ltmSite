@extends('admin.layouts.app')

@section('title', 'Категории')
@section('page-title', 'Категории')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать категорию
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Статус</th>
                <th>Создана</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr class="category-row" data-category-slug="{{ $category->slug }}" style="cursor: pointer;">
                    <td>#{{ $category->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $category->translation('ru')?->name ?? 'Без названия' }}</div>
                        <small class="text-muted">{{ $category->translation('en')?->name ?? '' }}</small>
                    </td>
                    <td>
                        @if($category->status)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                    </td>
                    <td>{{ $category->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-5">
                        <p class="text-muted mb-0">Нет категорий</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($categories->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $categories->links() }}
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Двойной клик для перехода на edit страницу
    const categoryRows = document.querySelectorAll('.category-row');
    
    categoryRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const categorySlug = this.getAttribute('data-category-slug');
            window.location.href = `/admin/categories/${categorySlug}/edit`;
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