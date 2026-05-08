@extends('admin.layouts.app')

@section('title', 'Пользователи')
@section('page-title', 'Управление пользователями')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать пользователя
    </a>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Пользователь</th>
                <th>Разрешения</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="user-row" data-user-id="{{ $user->id }}" style="cursor: pointer;">
                    <td>#{{ $user->id }}</td>
                    <td>
                        <div>
                            <div class="fw-semibold">{{ $user->name }}</div>
                            <small class="text-muted">{{ $user->email }}</small>
                        </div>
                    </td>
                    <td>
                        <div class="permission-badges">
                            @php
                                $permissionCount = $user->permissions->count();
                                $displayedCount = min(2, $permissionCount);
                            @endphp
                            
                            @foreach($user->permissions->take(2) as $permission)
                                <span class="badge bg-info mb-1 me-1">{{ $permission->display_name }}</span>
                            @endforeach
                            
                            @if($permissionCount > 2)
                                <span class="badge bg-secondary">+{{ $permissionCount - 2 }} ещё</span>
                            @endif
                            
                            @if($permissionCount === 0)
                                <span class="text-muted">
                                    <i class="fas fa-ban me-1"></i>
                                    Нет прав
                                </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <small class="text-muted">{{ $user->created_at->format('d.m.Y H:i') }}</small>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        <div class="text-muted">
                            <i class="fas fa-users fa-2x mb-2"></i>
                            <div>Пользователи не найдены</div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($users->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $users->links() }}
    </div>
@endif

@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Двойной клик для перехода на edit страницу
    const userRows = document.querySelectorAll('.user-row');
    
    userRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const userId = this.getAttribute('data-user-id');
            window.location.href = `/admin/users/${userId}/edit`;
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

@section('styles')
<style>
.permission-badges .badge {
    font-size: 0.65em;
    padding: 0.25em 0.5em;
    display: inline-block;
}

.table td {
    vertical-align: middle;
}

.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 14px;
    font-weight: 600;
}

</style>
@endsection