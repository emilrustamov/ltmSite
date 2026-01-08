@extends('admin.layouts.app')

@section('title', 'Форматы работы')
@section('page-title', 'Управление форматами работы')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('admin.job-positions.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Назад к вакансиям
    </a>
    <a href="{{ route('admin.work-formats.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Создать формат работы
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
            @forelse($workFormats as $workFormat)
                <tr class="work-format-row clickable-row" data-id="{{ $workFormat->id }}">
                    <td>#{{ $workFormat->id }}</td>
                    <td>
                        <div class="fw-bold">{{ $workFormat->name_ru }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $workFormat->name_en ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{ $workFormat->name_tm ?? 'Не указано' }}</div>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $workFormat->sort_order }}</span>
                    </td>
                    <td>
                        @if($workFormat->is_active)
                            <span class="badge bg-success">Активен</span>
                        @else
                            <span class="badge bg-secondary">Неактивен</span>
                        @endif
                    </td>
                    <td>{{ $workFormat->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <p class="text-muted mb-0">Нет форматов работы</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $workFormats->links() }}

@endsection
