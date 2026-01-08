@extends('admin.layouts.app')

@section('title', 'Должности')
@section('page-title', 'Управление вакансиями')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="mb-0">Управление должностями</h5>
            <small class="text-muted">
                Всего вакансий: {{ $jobPositions->total() }}
                @if($jobPositions->count())
                    · Показано {{ $jobPositions->firstItem() }} — {{ $jobPositions->lastItem() }}
                @endif
            </small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.technical-skills.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-code me-2"></i>
                Управление навыками
            </a>
            <a href="{{ route('admin.work-formats.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-laptop me-2"></i>
                Форматы работы
            </a>
            <a href="{{ route('admin.job-positions.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                Создать должность
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Навыки</th>
                    <th>Сортировка</th>
                    <th>Статус</th>
                    <th>На главной</th>
                    <th>Создан</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobPositions as $jobPosition)
                    <tr class="job-row clickable-row" data-id="{{ $jobPosition->id }}">
                        <td>#{{ $jobPosition->id }}</td>
                        <td>
                            <div class="fw-bold">{{ $jobPosition->name_ru }}</div>
                            @if($jobPosition->name_en)
                                <small class="text-muted">{{ $jobPosition->name_en }}</small>
                            @endif
                        </td>
                        <td>
                            @if($jobPosition->technicalSkills->count() > 0)
                                @foreach($jobPosition->technicalSkills->take(3) as $skill)
                                    <span class="badge bg-primary me-1">{{ $skill->name_ru }}</span>
                                @endforeach
                                @if($jobPosition->technicalSkills->count() > 3)
                                    <span class="badge bg-secondary">+{{ $jobPosition->technicalSkills->count() - 3 }}</span>
                                @endif
                            @else
                                <span class="text-muted">Нет навыков</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $jobPosition->sort_order }}</span>
                        </td>
                        <td>
                            @if($jobPosition->is_active)
                                <span class="badge bg-success">Активна</span>
                            @else
                                <span class="badge bg-secondary">Неактивна</span>
                            @endif
                        </td>
                        <td>
                            @if($jobPosition->status)
                                <span class="badge bg-warning">Да</span>
                            @else
                                <span class="badge bg-light text-dark">Нет</span>
                            @endif
                        </td>
                        <td>{{ $jobPosition->created_at->format('d.m.Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <p class="text-muted mb-0">Нет вакансий</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Пагинация -->
    @if($jobPositions->hasPages())
        <div class="pagination-wrapper mt-4">
            <div class="pagination-container">
                <div class="pagination-info">
                    <span class="text-muted">
                        <i class="fas fa-list me-1"></i>
                        Показано {{ $jobPositions->firstItem() ?? 0 }} - {{ $jobPositions->lastItem() ?? 0 }}
                        из {{ $jobPositions->total() }} вакансий
                    </span>
                </div>

                <nav class="pagination-nav">
                    <ul class="pagination pagination-modern">
                        @if ($jobPositions->onFirstPage())
                            <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $jobPositions->previousPageUrl() }}"><i
                                        class="fas fa-chevron-left"></i></a></li>
                        @endif

                        @foreach ($jobPositions->getUrlRange(1, $jobPositions->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $jobPositions->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($jobPositions->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $jobPositions->nextPageUrl() }}"><i
                                        class="fas fa-chevron-right"></i></a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jobRows = document.querySelectorAll('.job-row');

            jobRows.forEach(row => {
                row.addEventListener('dblclick', function () {
                    const id = this.getAttribute('data-id');
                    window.location.href = `/admin/job-positions/${id}/edit`;
                });

                row.addEventListener('mouseenter', function () {
                    this.style.backgroundColor = '#f8f9fa';
                });

                row.addEventListener('mouseleave', function () {
                    this.style.backgroundColor = '';
                });

                row.style.cursor = 'pointer';
            });
        });
    </script>
@endsection