@extends('admin.layouts.app')

@section('title', 'Пользователи')
@section('page-title', 'Управление пользователями')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="text-muted">
        <small>
            <i class="fas fa-info-circle me-1"></i>
            Двойной клик для управления правами • Правый клик для дополнительных действий
        </small>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
        <i class="fas fa-plus me-2"></i>
        Создать пользователя
    </button>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Пользователь</th>
                <th>Разрешения</th>
                <th>Статус</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="user-row" data-user-id="{{ $user->id }}" style="cursor: pointer;">
                    <td>#{{ $user->id }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-semibold">{{ $user->name }}</div>
                                <small class="text-muted">{{ $user->email }}</small>
                            </div>
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
                        @if($user->isAdmin())
                            <span class="badge bg-danger">
                                <i class="fas fa-shield-alt me-1"></i>
                                Администратор
                            </span>
                        @elseif($user->permissions->count() > 0)
                            <span class="badge bg-success">
                                <i class="fas fa-user-check me-1"></i>
                                Пользователь
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                <i class="fas fa-user me-1"></i>
                                Гость
                            </span>
                        @endif
                    </td>
                    <td>
                        <small class="text-muted">{{ $user->created_at->format('d.m.Y H:i') }}</small>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">
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

<!-- Modal для создания пользователя -->
<div class="modal fade" id="createUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Создать пользователя</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя пользователя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                        <input type="password" class="form-control" 
                               id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Двойной клик для перехода на страницу управления правами
    const userRows = document.querySelectorAll('.user-row');
    
    userRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const userId = this.getAttribute('data-user-id');
            window.location.href = `/admin/users/${userId}/permissions/edit`;
        });
        
        // Добавляем hover эффект
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f8f9fa';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
        
        // Контекстное меню для дополнительных действий
        row.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            
            // Создаем контекстное меню
            const contextMenu = document.createElement('div');
            contextMenu.className = 'context-menu';
            contextMenu.style.cssText = `
                position: fixed;
                top: ${e.clientY}px;
                left: ${e.clientX}px;
                background: white;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 1000;
                min-width: 200px;
                padding: 8px 0;
            `;
            
            const menuItems = [
                { icon: 'fas fa-key', text: 'Управление правами', action: () => window.location.href = `/admin/users/${userId}/permissions/edit` },
                { icon: 'fas fa-edit', text: 'Редактировать', action: () => window.location.href = `/admin/users/${userId}/edit` },
                { icon: 'fas fa-trash', text: 'Удалить', action: () => {
                    if (confirm('Вы уверены, что хотите удалить этого пользователя?')) {
                        // Здесь будет AJAX запрос на удаление
                        console.log('Delete user:', userId);
                    }
                } }
            ];
            
            menuItems.forEach(item => {
                const menuItem = document.createElement('div');
                menuItem.style.cssText = `
                    padding: 12px 16px;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    transition: background-color 0.2s;
                `;
                menuItem.innerHTML = `
                    <i class="${item.icon} me-2" style="width: 16px;"></i>
                    ${item.text}
                `;
                
                menuItem.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#f8f9fa';
                });
                
                menuItem.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '';
                });
                
                menuItem.addEventListener('click', function() {
                    item.action();
                    document.body.removeChild(contextMenu);
                });
                
                contextMenu.appendChild(menuItem);
            });
            
            document.body.appendChild(contextMenu);
            
            // Убираем меню при клике вне его
            setTimeout(() => {
                document.addEventListener('click', function removeMenu() {
                    if (contextMenu.parentNode) {
                        document.body.removeChild(contextMenu);
                    }
                    document.removeEventListener('click', removeMenu);
                });
            }, 100);
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

.table tbody tr:hover {
    background-color: rgba(0,123,255,0.05);
}

.context-menu {
    font-size: 14px;
}

.context-menu i {
    color: #6c757d;
}

.context-menu div:hover i {
    color: #007bff;
}
</style>
@endsection