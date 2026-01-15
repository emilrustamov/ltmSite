@extends('layouts.base')

@section('title', __('translate.allJobsTitle'))
@section('ogTitle', __('translate.allJobsTitle'))
@section('metaDesc', __('translate.allJobsMetaDesc'))
@section('metaKey', __('translate.allJobsMetaKey'))

{{-- Структурированные данные для страницы со списком вакансий --}}
@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "{{ __('translate.allJobsTitle') }}",
    "description": "{{ __('translate.allJobsMetaDesc') }}",
    "url": "{{ url($lang . '/jobs') }}",
    "mainEntity": {
        "@type": "ItemList",
        "numberOfItems": "{{ $jobPositions->total() }}",
        "itemListElement": [
            @foreach($jobPositions as $index => $job)
            {
                "@type": "ListItem",
                "position": {{ ($jobPositions->currentPage() - 1) * $jobPositions->perPage() + $index + 1 }},
                "item": {
                    "@type": "JobPosting",
                    "name": "{{ addslashes($job->{'name_' . $lang} ?? $job->name_ru) }}",
                    "url": "{{ url($lang . '/jobs/' . $job->id) }}"
                }
            }@if(!$loop->last),@endif
            @endforeach
        ]
    }
}
</script>
@endpush

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
                                                @if($job->employment_type)
                                                    <span class="job-meta-badge">
                                                        @if($job->employment_type == 'full-time')
                                                            {{ __('translate.employment_type_full_time') ?? 'Полная занятость' }}
                                                        @elseif($job->employment_type == 'part-time')
                                                            {{ __('translate.employment_type_part_time') ?? 'Частичная занятость' }}
                                                        @elseif($job->employment_type == 'contract')
                                                            {{ __('translate.employment_type_contract') ?? 'Контракт' }}
                                                        @elseif($job->employment_type == 'temporary')
                                                            {{ __('translate.employment_type_temporary') ?? 'Временная работа' }}
                                                        @elseif($job->employment_type == 'internship')
                                                            {{ __('translate.employment_type_internship') ?? 'Стажировка' }}
                                                        @elseif($job->employment_type == 'volunteer')
                                                            {{ __('translate.employment_type_volunteer') ?? 'Волонтерство' }}
                                                        @endif
                                                    </span>
                                                @endif
                                                @if($job->workFormat)
                                                    <span class="job-meta-badge">
                                                        {{ $job->workFormat->{'name_' . $lang} ?? $job->workFormat->name_ru }}
                                                    </span>
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