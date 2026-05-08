@extends('admin.layouts.app')

@section('title', 'Создать пользователя')
@section('page-title', 'Создать пользователя')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h4 class="mb-4">
                <i class="fas fa-plus me-2"></i>
                Создание пользователя
            </h4>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Имя пользователя *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Пароль *</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Подтверждение пароля *</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation" required>
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
                                    Создать пользователя
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary w-100">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Отмена
                                </a>
                            </div>
                        </div>
                        
                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="mb-0">Информация</h6>
                            </div>
                            <div class="card-body">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    После создания пользователя вы сможете назначить ему права доступа.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection