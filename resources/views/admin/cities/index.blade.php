@extends('admin.layouts.app')

@section('title', 'Города')
@section('page-title', 'Управление городами')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать город
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
            @forelse($cities as $city)
                <tr>
                    <td>#{{ $city->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $city->name_ru }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $city->name_en ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $city->name_tm ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $city->sort_order }}</span>
                    </td>
                    <td>
                        @if($city->is_active)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Неактивен</span>
                        @endif
                    </td>
                    <td>{{ $city->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.cities.edit', $city) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $city->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <p class="text-muted mb-0">Нет городов</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $cities->links() }}

<!-- Скрытые формы для удаления -->
@foreach($cities as $city)
    <form id="delete-form-{{ $city->id }}" action="{{ route('admin.cities.destroy', $city) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

<script>
function confirmDelete(id) {
    if (confirm('Вы уверены, что хотите удалить этот город? Это действие нельзя отменить.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
