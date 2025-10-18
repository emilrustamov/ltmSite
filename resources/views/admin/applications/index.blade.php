@extends('admin.layouts.app')

@section('title', 'Заявки кандидатов')
@section('page-title', 'Заявки кандидатов')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h5 class="mb-0">Управление заявками кандидатов</h5>
        <small class="text-muted">Всего заявок: {{ $applications->total() }}</small>
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
                <th>Действия</th>
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
                            {{ $application->formatted_salary }}
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
                    <td>
                        <div class="btn-group" role="group">
                            @if(Auth::user()->hasPermission('applications.delete'))
                            <button type="button" 
                                    class="btn btn-sm btn-outline-danger delete-btn delete-application" 
                                    data-id="{{ $application->id }}"
                                    data-name="{{ $application->name ?? '' }} {{ $application->surname }}"
                                    title="Удалить">
                                <i class="fas fa-trash"></i>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <p class="text-muted mb-0">Нет заявок</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($applications->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $applications->links() }}
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
