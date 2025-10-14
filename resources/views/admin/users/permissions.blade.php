@extends('admin.layouts.app')

@section('title', 'Управление правами пользователя')
@section('page-title', 'Управление правами')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">
            <i class="fas fa-key me-2"></i>
            Права пользователя: {{ $user->name }}
        </h4>
        <small class="text-muted">{{ $user->email }}</small>
    </div>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Назад к списку
    </a>
</div>

<form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row">
        @foreach($permissions->groupBy(function($permission) {
            return explode('.', $permission->name)[0];
        }) as $group => $groupPermissions)
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="card h-100 permission-group-card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-capitalize">
                            <i class="fas fa-{{ getGroupIcon($group) }} me-2"></i>
                            {{ getGroupTitle($group) }}
                        </h6>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input group-select-all" 
                                   data-group="{{ $group }}" id="select_all_{{ $group }}">
                            <label class="form-check-label text-white" for="select_all_{{ $group }}">
                                Все
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($groupPermissions as $permission)
                            <div class="form-check mb-3">
                                <input 
                                    class="form-check-input permission-checkbox" 
                                    type="checkbox" 
                                    name="permissions[]" 
                                    value="{{ $permission->name }}"
                                    id="permission_{{ $permission->id }}"
                                    data-group="{{ $group }}"
                                    {{ in_array($permission->name, $userPermissions) ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                    <div class="fw-semibold">{{ $permission->display_name }}</div>
                                    @if($permission->description)
                                        <small class="text-muted">{{ $permission->description }}</small>
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted">
            <small>
                <i class="fas fa-info-circle me-1"></i>
                Выберите права доступа для пользователя {{ $user->name }}
            </small>
        </div>
        <div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary me-2">
                Отмена
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                Сохранить изменения
            </button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Обработка "выбрать все" для группы
    document.querySelectorAll('.group-select-all').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const group = this.dataset.group;
            const groupCheckboxes = document.querySelectorAll(`input[data-group="${group}"]:not(.group-select-all)`);
            
            groupCheckboxes.forEach(function(cb) {
                cb.checked = this.checked;
            }, this);
        });
    });
    
    // Обновление состояния "выбрать все" при изменении отдельных чекбоксов
    document.querySelectorAll('.permission-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const group = this.dataset.group;
            const groupCheckboxes = document.querySelectorAll(`input[data-group="${group}"]:not(.group-select-all)`);
            const checkedCount = document.querySelectorAll(`input[data-group="${group}"]:not(.group-select-all):checked`).length;
            const selectAllCheckbox = document.querySelector(`input[data-group="${group}"].group-select-all`);
            
            if (selectAllCheckbox) {
                selectAllCheckbox.checked = checkedCount === groupCheckboxes.length;
                selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < groupCheckboxes.length;
            }
        });
    });
    
    // Инициализация состояния "выбрать все" при загрузке страницы
    document.querySelectorAll('.group-select-all').forEach(function(checkbox) {
        const group = checkbox.dataset.group;
        const checkedCount = document.querySelectorAll(`input[data-group="${group}"]:not(.group-select-all):checked`).length;
        const totalCount = document.querySelectorAll(`input[data-group="${group}"]:not(.group-select-all)`).length;
        
        if (checkedCount === totalCount) {
            checkbox.checked = true;
        } else if (checkedCount > 0) {
            checkbox.indeterminate = true;
        }
    });
});
</script>
@endsection

@php
function getGroupIcon($group) {
    $icons = [
        'admin' => 'shield-alt',
        'news' => 'newspaper',
        'portfolio' => 'briefcase',
        'categories' => 'tags',
        'vacancies' => 'user-tie',
        'users' => 'users',
        'contacts' => 'address-book'
    ];
    return $icons[$group] ?? 'cog';
}

function getGroupTitle($group) {
    $titles = [
        'admin' => 'Администратор',
        'news' => 'Новости',
        'portfolio' => 'Портфолио',
        'categories' => 'Категории',
        'vacancies' => 'Вакансии',
        'users' => 'Пользователи',
        'contacts' => 'Контакты'
    ];
    return $titles[$group] ?? ucfirst($group);
}
@endphp
