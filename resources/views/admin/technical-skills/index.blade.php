@extends('admin.layouts.app')

@section('title', 'Технические навыки')
@section('page-title', 'Управление техническими навыками')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.technical-skills.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать навык
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
            @forelse($technicalSkills as $skill)
                <tr>
                    <td>#{{ $skill->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $skill->name_ru }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $skill->name_en ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $skill->name_tm ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $skill->sort_order }}</span>
                    </td>
                    <td>
                        @if($skill->is_active)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Неактивен</span>
                        @endif
                    </td>
                    <td>{{ $skill->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.technical-skills.edit', $skill) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $skill->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <p class="text-muted mb-0">Нет навыков</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $technicalSkills->links() }}

<!-- Скрытые формы для удаления -->
@foreach($technicalSkills as $skill)
    <form id="delete-form-{{ $skill->id }}" action="{{ route('admin.technical-skills.destroy', $skill) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

<script>
function confirmDelete(id) {
    if (confirm('Вы уверены, что хотите удалить этот навык? Это действие нельзя отменить.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
