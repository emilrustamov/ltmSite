@extends('admin.layouts.app')

@section('title', 'Редактировать пользователя')
@section('page-title', 'Редактировать пользователя')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-edit me-2"></i>
                Редактирование пользователя: {{ $user->name }}
            </h4>
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Имя пользователя *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Новый пароль</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password">
                                    <small class="form-text text-muted">Оставьте пустым, если не хотите менять пароль</small>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Подтверждение нового пароля</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Действия</h6>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary w-100 mb-2">
                                    <i class="fas fa-save me-2"></i>
                                    Сохранить изменения
                                </button>
                                <button type="button" class="btn btn-danger w-100 mb-2" onclick="deleteUser()">
                                    <i class="fas fa-trash me-2"></i>
                                    Удалить
                                </button>
                                <a href="{{ route('admin.users.permissions.edit', $user) }}" class="btn btn-warning w-100">
                                    <i class="fas fa-key me-2"></i>
                                    Управление правами
                                </a>
                            </div>
                        </div>
                        
                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="mb-0">Информация о пользователе</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <strong>Создан:</strong><br>
                                    <small class="text-muted">{{ $user->created_at->format('d.m.Y H:i') }}</small>
                                </div>
                                <div class="mb-2">
                                    <strong>Последнее обновление:</strong><br>
                                    <small class="text-muted">{{ $user->updated_at->format('d.m.Y H:i') }}</small>
                                </div>
                                <div>
                                    <strong>Права доступа:</strong><br>
                                    <span class="badge bg-info">{{ $user->permissions->count() }} разрешений</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Скрытая форма для удаления -->
            <form id="delete-form" action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

<script>
function deleteUser() {
    document.getElementById('delete-form').submit();
}
</script>
@endsection