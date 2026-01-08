@extends('admin.layouts.app')

@section('title', 'Технические навыки')
@section('page-title', 'Управление техническими навыками')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('admin.job-positions.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Назад к вакансиям
    </a>
    <a href="{{ route('admin.technical-skills.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать навык
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название (RU)</th>
                <th>Название (EN)</th>
                <th>Название (TM)</th>
                <th>Порядок</th>
                <th>Статус</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
            @forelse($technicalSkills as $skill)
                <tr class="skill-row clickable-row" data-id="{{ $skill->id }}" data-slug="{{ $skill->slug }}">
                    <td>#{{ $skill->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $skill->name_ru }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $skill->name_en ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $skill->name_tm ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $skill->sort_order }}</span>
                    </td>
                    <td>
                        @if($skill->is_active)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Неактивен</span>
                        @endif
                    </td>
                    <td>{{ $skill->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <p class="text-muted mb-0">Нет навыков</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Красивая пагинация -->
@if($technicalSkills->hasPages())
<div class="pagination-wrapper mt-4">
    <div class="pagination-container">
        <!-- Информация о результатах -->
        <div class="pagination-info">
            <span class="text-muted">
                <i class="fas fa-list me-1"></i>
                Показано {{ $technicalSkills->firstItem() ?? 0 }} - {{ $technicalSkills->lastItem() ?? 0 }} 
                из {{ $technicalSkills->total() }} результатов
            </span>
        </div>
        
        <!-- Навигация по страницам -->
        <nav class="pagination-nav">
            <ul class="pagination pagination-modern">
                {{-- Previous Page Link --}}
                @if ($technicalSkills->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $technicalSkills->previousPageUrl() }}" rel="prev">
                            <i class="fas fa-chevron-left"></i>
                            <span class="ms-1">Предыдущая</span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($technicalSkills->getUrlRange(1, $technicalSkills->lastPage()) as $page => $url)
                    @if ($page == $technicalSkills->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @elseif (($page <= 3) || 
                             ($page >= $technicalSkills->lastPage() - 2) || 
                             (abs($page - $technicalSkills->currentPage()) <= 2))
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @elseif (($page == 4 && $technicalSkills->currentPage() > 6) || 
                             ($page == $technicalSkills->lastPage() - 3 && $technicalSkills->currentPage() < $technicalSkills->lastPage() - 5))
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($technicalSkills->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $technicalSkills->nextPageUrl() }}" rel="next">
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
                       max="{{ $technicalSkills->lastPage() }}" 
                       value="{{ $technicalSkills->currentPage() }}"
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
