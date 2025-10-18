@extends('admin.layouts.app')

@section('title', 'Языки')
@section('page-title', 'Управление языками')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.languages.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать язык
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
                <th>Код</th>
                <th>Порядок</th>
                <th>Статус</th>
                <th>Создан</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($languages as $language)
                <tr class="language-row clickable-row" data-id="{{ $language->id }}">
                    <td>#{{ $language->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $language->name_ru }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $language->name_en ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $language->name_tm ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <code>{{ $language->code }}</code>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $language->sort_order }}</span>
                    </td>
                    <td>
                        @if($language->is_active)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Неактивен</span>
                        @endif
                    </td>
                    <td>{{ $language->created_at->format('d.m.Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.languages.edit', $language) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger delete-btn delete-language" data-id="{{ $language->id }}" data-name="{{ $language->name_ru }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <p class="text-muted mb-0">Нет языков</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $languages->links() }}

<!-- Скрытые формы для удаления -->
@foreach($languages as $language)
    <form id="delete-form-{{ $language->id }}" action="{{ route('admin.languages.destroy', $language) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

<script>
function confirmDelete(id) {
    if (confirm('Вы уверены, что хотите удалить этот язык? Это действие нельзя отменить.')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
