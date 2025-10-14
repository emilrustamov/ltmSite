@extends('admin.layouts.app')

@section('title', 'Заявка #' . $contact->id)
@section('page-title', 'Заявка #' . $contact->id)

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Детали заявки</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Имя</h6>
                        <p class="mb-3">{{ $contact->name }}</p>
                        
                        <h6 class="text-muted">Email</h6>
                        <p class="mb-3">
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </p>
                        
                        <h6 class="text-muted">Телефон</h6>
                        <p class="mb-3">
                            @if($contact->phone)
                                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            @else
                                <span class="text-muted">Не указан</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Тема</h6>
                        <p class="mb-3">{{ $contact->subject ?? 'Без темы' }}</p>
                        
                        <h6 class="text-muted">Дата отправки</h6>
                        <p class="mb-3">{{ $contact->created_at->format('d.m.Y H:i') }}</p>
                        
                        <h6 class="text-muted">Статус</h6>
                        <p class="mb-3">
                            <span class="badge bg-success">Новая заявка</span>
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <h6 class="text-muted">Сообщение</h6>
                        <div class="border rounded p-3 bg-light">
                            <p class="mb-0">{{ $contact->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>
                        Назад к списку
                    </a>
                    <div>
                        <a href="mailto:{{ $contact->email }}" class="btn btn-primary me-2">
                            <i class="fas fa-envelope me-2"></i>
                            Ответить
                        </a>
                        @if($contact->phone)
                            <a href="tel:{{ $contact->phone }}" class="btn btn-success me-2">
                                <i class="fas fa-phone me-2"></i>
                                Позвонить
                            </a>
                        @endif
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash me-2"></i>
                            Удалить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Форма удаления (скрытая) -->
<form id="delete-form" method="POST" action="{{ route('admin.contacts.destroy', $contact->id) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
// Функция удаления
function confirmDelete() {
    if (confirm('Удалить эту заявку? Это действие нельзя отменить.')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endsection
