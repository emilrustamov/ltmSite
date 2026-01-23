@extends('admin.layouts.app')

@section('title', 'Заявки кандидатов')
@section('page-title', 'Заявки кандидатов')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h5 class="mb-0">Управление заявками кандидатов</h5>
        <small class="text-muted">Всего заявок: {{ $applications->total() }}</small>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.languages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-language me-2"></i>
            Языки
        </a>
        <a href="{{ route('admin.cities.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-map-marker-alt me-2"></i>
            Города
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Кандидат</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Ожидаемая зарплата</th>
                <th>Статус</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $application)
                <tr class="application-row clickable-row" data-application-id="{{ $application->id }}" data-id="{{ $application->id }}">
                    <td>#{{ $application->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $application->name ?? '' }} {{ $application->surname }}</div>
                        <small class="text-muted">{{ $application->city?->name_ru ?? $application->custom_city ?? 'Город не указан' }}</small>
                    </td>
                    <td>
                        <i class="fas fa-envelope text-muted me-1"></i>
                        {{ $application->email }}
                    </td>
                    <td>
                        <i class="fas fa-phone text-muted me-1"></i>
                        {{ $application->phone }}
                    </td>
                    <td>
                        @if($application->expected_salary)
                            {{ $application->expected_salary }}
                        @else
                            <span class="text-muted">Не указана</span>
                        @endif
                    </td>
                    <td>
                        @if($application->status)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                    </td>
                    <td>{{ $application->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <p class="text-muted mb-0">Нет заявок</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Красивая пагинация -->
@if($applications->hasPages())
<div class="pagination-wrapper mt-4">
    <div class="pagination-container">
        <!-- Информация о результатах -->
        <div class="pagination-info">
            <span class="text-muted">
                <i class="fas fa-list me-1"></i>
                Показано {{ $applications->firstItem() ?? 0 }} - {{ $applications->lastItem() ?? 0 }} 
                из {{ $applications->total() }} заявок
            </span>
        </div>
        
        <!-- Навигация по страницам -->
        <nav class="pagination-nav">
            <ul class="pagination pagination-modern">
                {{-- Previous Page Link --}}
                @if ($applications->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $applications->previousPageUrl() }}" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($applications->getUrlRange(1, $applications->lastPage()) as $page => $url)
                    @if ($page == $applications->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @elseif (($page <= 3) || 
                             ($page >= $applications->lastPage() - 2) || 
                             (abs($page - $applications->currentPage()) <= 2))
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif (($page == 4 && $applications->currentPage() > 6) || 
                             ($page == $applications->lastPage() - 3 && $applications->currentPage() < $applications->lastPage() - 5))
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($applications->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $applications->nextPageUrl() }}" rel="next">
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
                       max="{{ $applications->lastPage() }}" 
                       value="{{ $applications->currentPage() }}"
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
    // Двойной клик для перехода на страницу просмотра заявки
    const applicationRows = document.querySelectorAll('.application-row');
    
    applicationRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const applicationId = this.getAttribute('data-application-id');
            window.location.href = `{{ route('admin.applications.show', '') }}/${applicationId}`;
        });
        
        // Добавляем hover эффект
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f8f9fa';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });

    // Подтверждение удаления
    document.querySelectorAll('.delete-application').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation(); // Предотвращаем срабатывание dblclick на строке
            
            const applicationId = this.getAttribute('data-application-id');
            const applicationName = this.getAttribute('data-application-name');
            
            if (confirm(`Вы уверены, что хотите удалить заявку "${applicationName}"?\n\nЭто действие нельзя отменить.`)) {
                // Создаем форму для отправки DELETE запроса
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route('admin.applications.destroy', '') }}/${applicationId}`;
                
                // Добавляем CSRF токен
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                form.appendChild(csrfToken);
                
                // Добавляем метод DELETE
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);
                
                // Отправляем форму
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
});
</script>
@endsection
