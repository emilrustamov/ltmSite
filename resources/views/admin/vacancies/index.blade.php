@extends('admin.layouts.app')

@section('title', 'Вакансии')
@section('page-title', 'Вакансии')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.vacancies.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать вакансию
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Локация</th>
                <th>Зарплата</th>
                <th>Статус</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vacancies as $vacancy)
                <tr class="vacancy-row" data-vacancy-slug="{{ $vacancy->slug }}" style="cursor: pointer;">
                    <td>#{{ $vacancy->id }}</td>
                    <td>
                        @if($vacancy->getFirstMediaUrl('vacancy-images'))
                            <img src="{{ $vacancy->getFirstMediaUrl('vacancy-images') }}" 
                                 alt="{{ $vacancy->translation('ru')->title ?? '' }}" 
                                 class="img-thumbnail" 
                                 style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-briefcase text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-bold">{{ $vacancy->translation('ru')?->title ?? 'Без названия' }}</div>
                        <small class="text-muted">{{ $vacancy->translation('en')?->title ?? '' }}</small>
                        @if($vacancy->is_featured)
                            <span class="badge bg-warning ms-1">Рекомендуемая</span>
                        @endif
                    </td>
                    <td>
                        @if($vacancy->location)
                            <i class="fas fa-map-marker-alt text-muted me-1"></i>
                            {{ $vacancy->location }}
                        @else
                            <span class="text-muted">Не указано</span>
                        @endif
                    </td>
                    <td>
                        @if($vacancy->salary_from || $vacancy->salary_to)
                            {{ $vacancy->formatted_salary }}
                        @else
                            <span class="text-muted">По договоренности</span>
                        @endif
                    </td>
                    <td>
                        @if($vacancy->status)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                        @if($vacancy->application_deadline && $vacancy->application_deadline < now())
                            <br><span class="badge bg-danger small">Истекла</span>
                        @endif
                    </td>
                    <td>{{ $vacancy->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <p class="text-muted mb-0">Нет вакансий</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($vacancies->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $vacancies->links() }}
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Двойной клик для перехода на edit страницу
    const vacancyRows = document.querySelectorAll('.vacancy-row');
    
    vacancyRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const vacancySlug = this.getAttribute('data-vacancy-slug');
            window.location.href = `/admin/vacancies/${vacancySlug}/edit`;
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
