@extends('admin.layouts.app')

@section('title', 'Форматы работы')
@section('page-title', 'Управление форматами работы')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.work-formats.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать формат работы
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название (RU)</th>
                <th>Название (EN)</th>
                <th>Название (TM)</th>
                <th>Порядок</th>
                <th>Статус</th>
                <th>Создан</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($workFormats as $workFormat)
                <tr>
                    <td>#{{ $workFormat->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $workFormat->name_ru }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $workFormat->name_en ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $workFormat->name_tm ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $workFormat->sort_order }}</span>
                    </td>
                    <td>
                        @if($workFormat->is_active)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Неактивен</span>
                        @endif
                    </td>
                    <td>{{ $workFormat->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.work-formats.edit', $workFormat) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $workFormat->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <p class="text-muted mb-0">Нет форматов работы</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $workFormats->links() }}

<!-- Скрытые формы для удаления -->
@foreach($workFormats as $workFormat)
    <form id="delete-form-{{ $workFormat->id }}" action="{{ route('admin.work-formats.destroy', $workFormat) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

<script>
function confirmDelete(id) {
    if (confirm('Вы уверены, что хотите удалить этот формат работы? Это действие нельзя отменить.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
