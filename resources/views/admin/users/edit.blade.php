@extends('admin.layouts.app')

@section('title', 'Редактировать пользователя')
@section('page-title', 'Редактировать пользователя')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-edit me-2"></i>
                Редактирование пользователя
            </h4>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <!-- Основная информация -->
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Основная информация</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Имя *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" 
                                           value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" 
                                           value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="border-bottom pb-2 mb-3">Пароль</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Новый пароль</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Оставьте пустым, если не хотите менять пароль</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                           id="password_confirmation" name="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Боковая панель -->
                    <div class="col-lg-4">
                        
                    </div>
                </div>

                <!-- Кнопки действий -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Назад к списку
                            </a>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-save me-2"></i>
                                    Сохранить изменения
                                </button>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                    <i class="fas fa-trash me-2"></i>
                                    Удалить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Форма удаления (скрытая) -->
            <form id="delete-form" method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

<script>
// Функция удаления без подтверждения
function confirmDelete() {
    document.getElementById('delete-form').submit();
}
</script>
@endsection