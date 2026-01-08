@extends('layouts.base')

@section('title')
    {{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }} - {{ __('translate.jobDetails') }}
@endsection

@section('ogTitle')
    {{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }} - {{ __('translate.jobDetails') }}
@endsection

@section('metaDesc')
    {{ Str::limit($jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru ?? '', 150, '...') }}
@endsection

@section('metaKey')
    {{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}, {{ __('translate.jobs') }}, {{ __('translate.career') }}
@endsection

@section('content')
    <section class="container">
        <!-- Хлебные крошки -->
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <ol class="breadcrumbs-list">
                <li class="breadcrumbs-item">
                    <a href="/{{ $lang }}" class="breadcrumbs-link">{{ __('translate.mainPage') ?? 'Главная' }}</a>
                </li>
                <li class="breadcrumbs-separator" aria-hidden="true">/</li>
                <li class="breadcrumbs-item">
                    <a href="{{ route('lang.jobs.index', ['lang' => $lang]) }}" class="breadcrumbs-link">{{ __('translate.jobs') }}</a>
                </li>
                <li class="breadcrumbs-separator" aria-hidden="true">/</li>
                <li class="breadcrumbs-item breadcrumbs-item-active" aria-current="page">
                    <span class="breadcrumbs-current">{{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}</span>
                </li>
            </ol>
        </nav>

        <div class="section">
            <h1>{{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}</h1>
            
            @if($jobPosition->employment_type)
            <p><strong>{{ __('translate.employment_type') }}:</strong> 
                @if($jobPosition->employment_type == 'full-time')
                    {{ __('translate.employment_type_full_time') ?? 'Полная занятость' }}
                @elseif($jobPosition->employment_type == 'part-time')
                    {{ __('translate.employment_type_part_time') ?? 'Частичная занятость' }}
                @elseif($jobPosition->employment_type == 'contract')
                    {{ __('translate.employment_type_contract') ?? 'Контракт' }}
                @elseif($jobPosition->employment_type == 'temporary')
                    {{ __('translate.employment_type_temporary') ?? 'Временная работа' }}
                @elseif($jobPosition->employment_type == 'internship')
                    {{ __('translate.employment_type_internship') ?? 'Стажировка' }}
                @elseif($jobPosition->employment_type == 'volunteer')
                    {{ __('translate.employment_type_volunteer') ?? 'Волонтерство' }}
                @endif
            </p>
            @endif
            
            @if($jobPosition->workFormat)
            <p><strong>{{ __('translate.work_format') }}:</strong> 
                {{ $jobPosition->workFormat->{'name_' . $lang} ?? $jobPosition->workFormat->name_ru }}
            </p>
            @endif
            
            @if($jobPosition->{'salary_' . $lang} ?? $jobPosition->salary_ru)
            <p><strong>{{ __('translate.salary') }}:</strong> {{ $jobPosition->{'salary_' . $lang} ?? $jobPosition->salary_ru }}</p>
            @endif
        </div>

        @if($jobPosition->{'responsibilities_' . $lang} ?? $jobPosition->responsibilities_ru)
        <div class="section job-section-two-columns">
            <div class="job-section-title">
                <h2 class="heading-line">{{ __('translate.responsibilities') }}</h2>
            </div>
            <div class="job-section-content">
                @php
                    $content = $jobPosition->{'responsibilities_' . $lang} ?? $jobPosition->responsibilities_ru;
                    // Преобразуем текст в список, если есть маркеры или переносы строк
                    $lines = explode("\n", $content);
                    $isList = false;
                    foreach ($lines as $line) {
                        $trimmed = trim($line);
                        if (preg_match('/^[\*\-\•]\s+/', $trimmed) || (strlen($trimmed) > 0 && count($lines) > 1)) {
                            $isList = true;
                            break;
                        }
                    }
                @endphp
                @if($isList)
                    <ul class="job-content-list">
                        @foreach($lines as $line)
                            @php
                                $trimmed = trim($line);
                                if (empty($trimmed)) continue;
                                // Убираем маркеры если есть
                                $trimmed = preg_replace('/^[\*\-\•]\s+/', '', $trimmed);
                            @endphp
                            <li>{{ $trimmed }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>{!! nl2br(e($content)) !!}</p>
                @endif
            </div>
        </div>
        @endif

        @if($jobPosition->{'requirements_' . $lang} ?? $jobPosition->requirements_ru)
        <div class="section job-section-two-columns">
            <div class="job-section-title">
                <h2 class="heading-line">{{ __('translate.requirements') ?? 'Требования' }}</h2>
            </div>
            <div class="job-section-content">
                @php
                    $content = $jobPosition->{'requirements_' . $lang} ?? $jobPosition->requirements_ru;
                    $lines = explode("\n", $content);
                    $isList = false;
                    foreach ($lines as $line) {
                        $trimmed = trim($line);
                        if (preg_match('/^[\*\-\•]\s+/', $trimmed) || (strlen($trimmed) > 0 && count($lines) > 1)) {
                            $isList = true;
                            break;
                        }
                    }
                @endphp
                @if($isList)
                    <ul class="job-content-list">
                        @foreach($lines as $line)
                            @php
                                $trimmed = trim($line);
                                if (empty($trimmed)) continue;
                                $trimmed = preg_replace('/^[\*\-\•]\s+/', '', $trimmed);
                            @endphp
                            <li>{{ $trimmed }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>{!! nl2br(e($content)) !!}</p>
                @endif
            </div>
        </div>
        @endif

        @if($jobPosition->{'conditions_' . $lang} ?? $jobPosition->conditions_ru)
        <div class="section job-section-two-columns">
            <div class="job-section-title">
                <h2 class="heading-line">{{ __('translate.conditions') ?? 'Условия' }}</h2>
            </div>
            <div class="job-section-content">
                @php
                    $content = $jobPosition->{'conditions_' . $lang} ?? $jobPosition->conditions_ru;
                    $lines = explode("\n", $content);
                    $isList = false;
                    foreach ($lines as $line) {
                        $trimmed = trim($line);
                        if (preg_match('/^[\*\-\•]\s+/', $trimmed) || (strlen($trimmed) > 0 && count($lines) > 1)) {
                            $isList = true;
                            break;
                        }
                    }
                @endphp
                @if($isList)
                    <ul class="job-content-list">
                        @foreach($lines as $line)
                            @php
                                $trimmed = trim($line);
                                if (empty($trimmed)) continue;
                                $trimmed = preg_replace('/^[\*\-\•]\s+/', '', $trimmed);
                            @endphp
                            <li>{{ $trimmed }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>{!! nl2br(e($content)) !!}</p>
                @endif
            </div>
        </div>
        @endif

        @if($jobPosition->technicalSkills->count() > 0)
        <div class="section job-section-two-columns">
            <div class="job-section-title">
                <h2 class="heading-line">{{ __('translate.skills') }}</h2>
            </div>
            <div class="job-section-content">
                <p>
                    {{ $jobPosition->technicalSkills->pluck('name_' . $lang)->filter()->implode(', ') ?: $jobPosition->technicalSkills->pluck('name_ru')->implode(', ') }}
                </p>
            </div>
        </div>
        @endif

        @if($jobPosition->status)
        <div class="section">
            <a href="{{ route('applications.create', ['position' => $jobPosition->id]) }}" class="custom-button">
                {{ __('translate.applyNow') }}
            </a>
        </div>
        @endif
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const headings = document.querySelectorAll('.heading-line');
            
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.3
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);
            
            headings.forEach(heading => {
                observer.observe(heading);
            });
        });
    </script>

    <style>
        /* Хлебные крошки */
        .breadcrumbs {
            margin-bottom: 30px;
            padding-top: 20px;
        }

        .breadcrumbs-list {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 8px;
        }

        .breadcrumbs-item {
            display: inline-flex;
            align-items: center;
        }

        .breadcrumbs-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s ease;
            padding: 4px 0;
        }

        .breadcrumbs-link:hover {
            color: #e31e24;
        }

        .breadcrumbs-separator {
            color: rgba(255, 255, 255, 0.4);
            font-size: 15px;
            padding: 0 4px;
        }

        .breadcrumbs-item-active .breadcrumbs-current {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .breadcrumbs {
                margin-bottom: 20px;
                padding-top: 15px;
            }

            .breadcrumbs-link,
            .breadcrumbs-current,
            .breadcrumbs-separator {
                font-size: 14px;
            }

            .breadcrumbs-list {
                gap: 6px;
            }
        }
    </style>
@endsection
