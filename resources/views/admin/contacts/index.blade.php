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
<div class="pagination-wrapper mt-4">
    <div class="pagination-container">
        <!-- Информация о результатах -->
        <div class="pagination-info">
            <span class="text-muted">
                <i class="fas fa-list me-1"></i>
                Показано {{ $contacts->firstItem() ?? 0 }} - {{ $contacts->lastItem() ?? 0 }} 
                из {{ $contacts->total() }} заявок
            </span>
        </div>
        
        <!-- Навигация по страницам -->
        <nav class="pagination-nav">
            <ul class="pagination pagination-modern">
                {{-- Previous Page Link --}}
                @if ($contacts->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $contacts->previousPageUrl() }}" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($contacts->getUrlRange(1, $contacts->lastPage()) as $page => $url)
                    @if ($page == $contacts->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @elseif (($page <= 3) || 
                             ($page >= $contacts->lastPage() - 2) || 
                             (abs($page - $contacts->currentPage()) <= 2))
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif (($page == 4 && $contacts->currentPage() > 6) || 
                             ($page == $contacts->lastPage() - 3 && $contacts->currentPage() < $contacts->lastPage() - 5))
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($contacts->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $contacts->nextPageUrl() }}" rel="next">
                            <span class="me-1">Следующая</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">
                            <span class="me-1">Следующая</span>
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
        
        <!-- Быстрый переход -->
        <div class="pagination-quick-jump">
            <form method="GET" class="d-flex align-items-center">
                <span class="text-muted me-2">Перейти на:</span>
                <input type="number" 
                       name="page" 
                       min="1" 
                       max="{{ $contacts->lastPage() }}" 
                       value="{{ $contacts->currentPage() }}"
                       class="form-control form-control-sm me-2" 
                       style="width: 60px;">
                <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@endif

@endsection
