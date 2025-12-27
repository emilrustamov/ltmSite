@extends('layouts.base')

@section('title', __('translate.allJobsTitle'))
@section('ogTitle', __('translate.allJobsTitle'))
@section('metaDesc', __('translate.allJobsMetaDesc'))
@section('metaKey', __('translate.allJobsMetaKey'))

@section('content')
    <section class="container jobs-page">
        <!-- Заголовок секции -->
        <div class="jobs-header">
            <h1 class="jobs-main-title">{{ __('translate.allJobsTitle') }}</h1>
            <p class="jobs-subtitle">{{ __('translate.allJobsSubtitle') }}</p>
        </div>

        <!-- Таблица вакансий -->
        <div class="jobs-table-container">
            <table class="jobs-table">
                <tbody>
                    @forelse($jobPositions as $job)
                        <tr class="job-row">
                            <td class="job-cell-main">
                                <a href="{{ route('lang.jobs.show', ['lang' => $lang, 'jobPosition' => $job->id]) }}" class="job-row-link">
                                    <div class="job-content-wrapper">
                                        <!-- Название и мета-информация в одной строке -->
                                        <div class="job-title-row">
                                            <h2 class="job-title">
                        {{ $job->{'name_' . $lang} ?? $job->name_ru }}
                                            </h2>
                                            <div class="job-meta-row">
                                                @if($job->{'employment_type_' . $lang} ?? $job->employment_type_ru)
                                                    <span class="job-meta-badge">{{ $job->{'employment_type_' . $lang} ?? $job->employment_type_ru }}</span>
                                                @endif
                                                @if($job->{'work_format_' . $lang} ?? $job->work_format_ru)
                                                    <span class="job-meta-badge">{{ $job->{'work_format_' . $lang} ?? $job->work_format_ru }}</span>
                                                @endif
                                                @if($job->{'salary_' . $lang} ?? $job->salary_ru)
                                                    <span class="job-meta-badge job-salary-badge">{{ $job->{'salary_' . $lang} ?? $job->salary_ru }}</span>
                                                @endif
                    </div>
                    </div>
                    </div>
                                </a>
                            </td>
                            <td class="job-cell-arrow">
                                <a href="{{ route('lang.jobs.show', ['lang' => $lang, 'jobPosition' => $job->id]) }}" class="job-arrow-link" aria-label="Подробнее">
                                    <i class="fas fa-arrow-right job-arrow-icon" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="jobs-empty-cell">
                                <div class="jobs-empty">
                                    <div class="jobs-empty-icon">
                                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                                    </div>
                                    <h3>{{ __('translate.noJobsAvailable') ?? 'Нет доступных вакансий' }}</h3>
                                    <p>Следите за обновлениями, мы регулярно публикуем новые вакансии</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Пагинация -->
        @include('job-positions.partials.pagination', ['jobPositions' => $jobPositions])
    </section>
@endsection