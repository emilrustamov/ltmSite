@extends('admin.layouts.app')

@section('title', 'Контакты')
@section('page-title', 'Контакты')

@section('content')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Тема</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr class="contact-row" data-contact-id="{{ $contact->id }}" style="cursor: pointer;">
                    <td>#{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone ?? 'Не указан' }}</td>
                    <td>{{ Str::limit($contact->subject ?? 'Без темы', 30) }}</td>
                    <td>{{ $contact->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $contact->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <p class="text-muted mb-0">Нет заявок</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($contacts->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $contacts->links() }}
    </div>
@endif

<!-- Hidden delete forms -->
@foreach($contacts as $contact)
    <form id="delete-form-{{ $contact->id }}" method="POST" action="{{ route('admin.contacts.destroy', $contact->id) }}" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Двойной клик для перехода на show страницу
    const contactRows = document.querySelectorAll('.contact-row');
    
    contactRows.forEach(row => {
        row.addEventListener('dblclick', function() {
            const contactId = this.getAttribute('data-contact-id');
            window.location.href = `/admin/contacts/${contactId}`;
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

// Функция удаления
function confirmDelete(contactId) {
    if (confirm('Удалить эту заявку? Это действие нельзя отменить.')) {
        document.getElementById('delete-form-' + contactId).submit();
    }
}
</script>
@endsection
