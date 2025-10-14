@extends('admin.layouts.app')

@section('title', 'Информация о пользователе')
@section('page-title', 'Информация о пользователе')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">
                    <i class="fas fa-user me-2"></i>
                    {{ $user->name }}
                </h4>
                <small class="text-muted">{{ $user->email }}</small>
            </div>
            <div>
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary me-2">
                    <i class="fas fa-edit me-2"></i>
                    Редактировать
                </a>
                <a href="{{ route('admin.users.permissions.edit', $user) }}" class="btn btn-warning">
                    <i class="fas fa-key me-2"></i>
                    Управление правами
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Основная информация</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">ID пользователя</label>
                                    <div>#{{ $user->id }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Статус</label>
                                    <div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Дата создания</label>
                                    <div>{{ $user->created_at->format('d.m.Y H:i') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Последнее обновление</label>
                                    <div>{{ $user->updated_at->format('d.m.Y H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">Права доступа ({{ $user->permissions->count() }})</h6>
                    </div>
                    <div class="card-body">
                        @if($user->permissions->count() > 0)
                            <div class="row">
                                @foreach($user->permissions->groupBy(function($permission) {
                                    return explode('.', $permission->name)[0];
                                }) as $group => $groupPermissions)
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-capitalize mb-2">{{ $group }}</h6>
                                        @foreach($groupPermissions as $permission)
                                            <span class="badge bg-info me-1 mb-1">{{ $permission->display_name }}</span>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-ban fa-2x text-muted mb-2"></i>
                                <div class="text-muted">У пользователя нет прав доступа</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Быстрые действия</h6>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-edit me-2"></i>
                            Редактировать пользователя
                        </a>
                        <a href="{{ route('admin.users.permissions.edit', $user) }}" class="btn btn-warning w-100 mb-2">
                            <i class="fas fa-key me-2"></i>
                            Управление правами
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>
                            Назад к списку
                        </a>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h6 class="mb-0">Статистика</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Всего прав:</span>
                            <span class="badge bg-primary">{{ $user->permissions->count() }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Административных:</span>
                            <span class="badge bg-danger">{{ $user->permissions->where('name', 'like', 'admin.%')->count() }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Пользовательских:</span>
                            <span class="badge bg-success">{{ $user->permissions->where('name', 'not like', 'admin.%')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
