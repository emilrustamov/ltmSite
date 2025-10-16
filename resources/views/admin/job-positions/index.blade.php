@extends('admin.layouts.app')

@section('title', 'Должности')
@section('page-title', 'Управление должностями')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.job-positions.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать должность
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
                <th>Slug</th>
                <th>Порядок</th>
                <th>Статус</th>
                <th>Создан</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobPositions as $jobPosition)
                <tr>
                    <td>#{{ $jobPosition->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $jobPosition->name_ru }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $jobPosition->name_en ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $jobPosition->name_tm ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <code>{{ $jobPosition->slug }}</code>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $jobPosition->sort_order }}</span>
                    </td>
                    <td>
                        @if($jobPosition->is_active)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                    </td>
                    <td>{{ $jobPosition->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.job-positions.edit', $jobPosition) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $jobPosition->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <p class="text-muted mb-0">Нет должностей</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $jobPositions->links() }}

<!-- Скрытые формы для удаления -->
@foreach($jobPositions as $jobPosition)
    <form id="delete-form-{{ $jobPosition->id }}" action="{{ route('admin.job-positions.destroy', $jobPosition) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

<script>
function confirmDelete(id) {
    if (confirm('Вы уверены, что хотите удалить эту должность? Это действие нельзя отменить.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
