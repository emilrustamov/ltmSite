@extends('admin.layouts.app')

@section('title', 'Просмотр заявки')
@section('page-title', 'Просмотр заявки')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">
            <i class="fas fa-envelope me-2"></i>
            Заявка #{{ $contact->id }}
        </h4>
        <small class="text-muted">{{ $contact->created_at->format('d.m.Y H:i') }}</small>
    </div>
    <div>
        <button type="button" class="btn btn-danger me-2" onclick="confirmDelete()">
            <i class="fas fa-trash me-2"></i>
            Удалить
        </button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Назад к списку
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Информация о заявке</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Имя:</strong><br>
                            {{ $contact->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong><br>
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </div>
                        <div class="mb-3">
                            <strong>Телефон:</strong><br>
                            @if($contact->phone)
                                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            @else
                                <span class="text-muted">Не указан</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Тема:</strong><br>
                            {{ $contact->subject ?? 'Без темы' }}
                        </div>
                        <div class="mb-3">
                            <strong>Дата отправки:</strong><br>
                            {{ $contact->created_at->format('d.m.Y H:i') }}
                        </div>
                        <div class="mb-3">
                            <strong>IP адрес:</strong><br>
                            <code>{{ $contact->ip_address ?? 'Не указан' }}</code>
                        </div>
                    </div>
                </div>
                
                @if($contact->message)
                    <div class="mb-3">
                        <strong>Сообщение:</strong><br>
                        <div class="mt-2 p-3 bg-light rounded">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Дополнительная информация</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>ID заявки:</strong><br>
                    <code>#{{ $contact->id }}</code>
                </div>
                <div class="mb-3">
                    <strong>Создана:</strong><br>
                    <small class="text-muted">{{ $contact->created_at->format('d.m.Y H:i') }}</small>
                </div>
                <div class="mb-3">
                    <strong>Обновлена:</strong><br>
                    <small class="text-muted">{{ $contact->updated_at->format('d.m.Y H:i') }}</small>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Действия</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $contact->email }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>
                        Ответить по email
                    </a>
                    @if($contact->phone)
                        <a href="tel:{{ $contact->phone }}" class="btn btn-outline-success">
                            <i class="fas fa-phone me-2"></i>
                            Позвонить
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Скрытая форма для удаления -->
<form id="delete-form" action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
function confirmDelete() {
    if (confirm('Вы уверены, что хотите удалить эту заявку? Это действие нельзя отменить.')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endsection
