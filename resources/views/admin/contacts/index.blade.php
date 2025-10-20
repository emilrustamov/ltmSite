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
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
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

@endsection
